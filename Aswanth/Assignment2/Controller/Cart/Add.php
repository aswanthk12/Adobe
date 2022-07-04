<?php

namespace Aswanth\Assignment2\Controller\Cart;

use Exception;
use Magento\Framework\Escaper;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Locale\ResolverInterface;
use Magento\Store\Model\ScopeInterface;
use Psr\Log\LoggerInterface;
use Zend_Filter_LocalizedToNormalized;
use Zend_Log_Exception;

class Add extends \Magento\Checkout\Controller\Cart\Add
{
    /**
     * @throws NoSuchEntityException|Zend_Log_Exception
     */
    public function execute()
    {
        if (!$this->_formKeyValidator->validate($this->getRequest())) {
            $this->messageManager->addErrorMessage(
                __('Your session has expired')
            );
            return $this->resultRedirectFactory->create()->setPath('*/*/');
        }
        $params = $this->getRequest()->getParams();
        $productId = $params['product'];
        $val = $this->productRepository->getById($productId);
        $type = $val->getTypeId();
        if ($type != 'simple') {
            try {
                if (isset($params['qty'])) {
                    $filter = new Zend_Filter_LocalizedToNormalized(
                        ['locale' => $this->_objectManager->get(
                            ResolverInterface::class
                        )->getLocale()]
                    );
                    $params['qty'] = $this->quantityProcessor->prepareQuantity($params['qty']);
                    $params['qty'] = $filter->filter($params['qty']);
                }

                $product = $this->_initProduct();
                $related = $this->getRequest()->getParam('related_product');

                /** Check product availability */
                if (!$product) {
                    return $this->goBack();
                }


                $this->cart->addProduct($product, $params);
                if (!empty($related)) {
                    $this->cart->addProductsByIds(explode(',', $related));
                }
                $this->cart->save();
                $this->_eventManager->dispatch(
                    'checkout_cart_add_product_complete',
                    ['product' => $product, 'request' => $this->getRequest(), 'response' => $this->getResponse()]
                );

                if (!$this->_checkoutSession->getNoCartRedirect(true)) {
                    if ($this->shouldRedirectToCart()) {
                        $message = __(
                            'You added %1 to your shopping cart.',
                            $product->getName()
                        );
                        $this->messageManager->addSuccessMessage($message);
                    } else {
                        $this->messageManager->addComplexSuccessMessage(
                            'addCartSuccessMessage',
                            [
                                'product_name' => $product->getName(),
                                'cart_url' => $this->getCartUrl(),
                            ]
                        );
                    }
                    if ($this->cart->getQuote()->getHasError()) {
                        $errors = $this->cart->getQuote()->getErrors();
                        foreach ($errors as $error) {
                            $this->messageManager->addErrorMessage($error->getText());
                        }
                    }
                    return $this->goBack(null, $product);
                }
            } catch (LocalizedException $e) {
                if ($this->_checkoutSession->getUseNotice(true)) {
                    $this->messageManager->addNoticeMessage(
                        $this->_objectManager->get(Escaper::class)->escapeHtml($e->getMessage())
                    );
                } else {
                    $messages = array_unique(explode("\n", $e->getMessage()));
                    foreach ($messages as $message) {
                        $this->messageManager->addErrorMessage(
                            $this->_objectManager->get(Escaper::class)->escapeHtml($message)
                        );
                    }
                }

                $url = $this->_checkoutSession->getRedirectUrl(true);
                if (!$url) {
                    $url = $this->_redirect->getRedirectUrl($this->getCartUrl());
                }

                return $this->goBack($url);
            } catch (Exception $e) {
                $this->messageManager->addExceptionMessage(
                    $e,
                    __('We can\'t add this item to your shopping cart right now.')
                );
                $this->_objectManager->get(LoggerInterface::class)->critical($e);
                return $this->goBack();
            }

            return $this->getResponse();
        } else {
            $this->messageManager->addErrorMessage(
                __("Currently you can't add this product to the cart")
            );
            return $this->resultRedirectFactory->create()->setPath('*/*/');
        }
    }

    /**
     * Is redirect should be performed after the product was added to cart.
     *
     * @return bool
     */
    private function shouldRedirectToCart()
    {
        return $this->_scopeConfig->isSetFlag(
            'checkout/cart/redirect_to_cart',
            ScopeInterface::SCOPE_STORE
        );
    }

    private function getCartUrl()
    {
        return $this->_url->getUrl('checkout/cart', ['_secure' => true]);
    }
}
