<?php

namespace Aswanth\Assignment2\Plugin;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Checkout\Controller\Cart\Add;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Message\ManagerInterface;

class Cart
{
    /**
     * @var ProductRepositoryInterface
     */
    private ProductRepositoryInterface $productRepository;
    /**
     * @var ManagerInterface
     */
    private ManagerInterface $messageManager;
    /**
     * @var RedirectFactory
     */
    private RedirectFactory $resultRedirectFactory;

    /**
     * @param ProductRepositoryInterface $productRepository
     * @param ManagerInterface $messageManager
     * @param RedirectFactory $resultRedirectFactory
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        ManagerInterface $messageManager,
        RedirectFactory $resultRedirectFactory
    ) {
        $this->productRepository = $productRepository;
        $this->messageManager = $messageManager;
        $this->resultRedirectFactory = $resultRedirectFactory;
    }

    /**
     * Execution method
     *
     * @param Add $subject
     * @param callable $proceed
     * @return Redirect
     * @throws NoSuchEntityException
     */
    public function aroundExecute(Add $subject, callable $proceed): Redirect
    {
        $params = $subject->getRequest()->getParams();
        $productId = $params['product'];
        $val = $this->productRepository->getById($productId);
        $type = $val->getTypeId();
        if ($type!='simple') {
            return $proceed();
        } else {
            $this->messageManager->addErrorMessage(
                __("Currently you can't add this product to the cart")
            );
            return $this->resultRedirectFactory->create()->setPath('*/*/');
        }
    }
}
