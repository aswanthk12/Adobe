<?php

namespace Aswanth\Assignment3\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class BusinessInfo extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'business_info_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('business_info', 'id');
        $this->_useIsObjectNew = true;
    }
}
