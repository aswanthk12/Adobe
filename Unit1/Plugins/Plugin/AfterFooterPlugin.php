<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit1\Plugins\Plugin;

class AfterFooterPlugin
{
    /**
     * Footer
     *
     * @param \Magento\Theme\Block\Html\Footer $subject
     * @param array $result
     * @return string
     */
    public function afterGetCopyright(\Magento\Theme\Block\Html\Footer $subject, $result)
    {
        return 'Customized copyright!';
    }
}
