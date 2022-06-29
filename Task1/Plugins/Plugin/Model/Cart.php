<?php
namespace Task1\Plugins\Plugin\Model;

class Cart
{
    public function afterGetItems(
        \Magento\Checkout\Model\Cart $subject,
        $result
    ) {
        return $result."j";
    }

}
