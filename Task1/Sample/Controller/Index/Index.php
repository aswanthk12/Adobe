<?php
namespace Task1\Sample\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Magento\Sales\Model\OrderFactory;

class Index extends Action
{
    /**
     * @var PageFactory
     */
    private PageFactory $_pageFactory;
    /**
     * @var OrderFactory
     */
    private OrderFactory $_orderFactory;

    /**
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param OrderFactory $_objectFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        OrderFactory $_orderFactory
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_orderFactory = $_orderFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $price=$this->_orderFactory->create()->loadByIncrementId('000000002');
        $result=$price->getShippingAddress()->getCountryId()    ;
        var_dump($result);
        die();
        return $result;
    }
}
