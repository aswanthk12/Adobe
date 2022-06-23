<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit2\RouterDash\Controller;

use Magento\Framework\App\ActionFactory;
use Psr\Log\LoggerInterface;

class Router implements \Magento\Framework\App\RouterInterface
{
    /**
     * @var ActionFactory
     */
    protected $actionPath;
    /**
     * @var LoggerInterface
     */
    private $_logger;

    /**
     * @param LoggerInterface $logger
     * @param ActionFactory $actionFactory
     */
    public function __construct(LoggerInterface $logger, ActionFactory $actionFactory)
    {
        $this->_logger = $logger;
        $this->actionPath = $actionFactory;
    }

    /**
     * Controller action forwarded.
     *
     * @param \Magento\Framework\App\RequestInterface $request
     * @return \Magento\Framework\App\ActionInterface|null
     */
    public function match(\Magento\Framework\App\RequestInterface $request)
    {
        $testCategory = '';
        $info = $request->getPathInfo();
        $this->_logger->info(
            'pathinfo: ' . $info
        );
        if (preg_match("%^/(.*?)-(.*?)-(.*?)$%", $info, $m)) {
            $request->setPathInfo(sprintf("/%s/%s/%s/%s", $m[1], $m[2], $m[3], $testCategory));
            return $this->actionPath->create(Magento\Framework\App\Action\Forward::class, ['request' => $request]);
        }
        return null;
    }
}
