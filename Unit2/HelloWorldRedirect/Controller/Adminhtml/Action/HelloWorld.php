<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit2\HelloWorldRedirect\Controller\Adminhtml\Action;

class Helloworld extends \Magento\Backend\App\Action
{
    /**
     * Execute
     *
     * Execute method
     */
    public function execute()
    {
        $this->_redirect('catalog/category/edit/id/38');
    }

    /**
     * Link must be generated by server side
     *
     * It's only for education purpose!
     *
     * @return bool
     */
    public function _processUrlKeys()
    {
        return true;
    }
}
