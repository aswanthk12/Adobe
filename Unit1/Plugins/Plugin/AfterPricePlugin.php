<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit1\Plugins\Plugin;

class AfterPricePlugin
{
    /**
     * Product
     *
     * @param \Magento\Catalog\Model\Product $subject
     * @param array $result
     * @return mixed
     */
    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        return $result + 0.5;
    }
}
