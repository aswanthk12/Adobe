<?php
/**
 *
 * Copyright © 2019 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit1\Plugins\Plugin;

class AroundBreadcrumbsPlugin
{
    /**
     * Theme
     *
     * @param \Magento\Theme\Block\Html\Breadcrumbs $subject
     * @param callable $proceed
     * @param array $crumbName
     * @param array $crumbInfo
     */
    public function aroundAddCrumb(
        \Magento\Theme\Block\Html\Breadcrumbs $subject,
        callable $proceed,
        array $crumbName,
        array $crumbInfo
    ): void {
        $crumbInfo['label'] = $crumbInfo['label'].'(!a)';
        $proceed($crumbName, $crumbInfo);
    }
}
