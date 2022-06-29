<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Training2\SuccessPagePreference\Controller\Onepage;

use \Magento\Framework\Controller\ResultFactory;

class Success extends \Magento\Checkout\Controller\Onepage\Success
{
    public function execute()
    {
        $rawResult = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $rawResult->setContents('order successful custom message');
        return $rawResult;
    }
}
