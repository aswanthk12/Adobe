<?php

namespace Aswanth\Assignment3\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class PersonalInfo extends AbstractDb
{
    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('personal_info', 'id');
    }
}
