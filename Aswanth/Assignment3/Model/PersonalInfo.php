<?php

namespace Aswanth\Assignment3\Model;

use Aswanth\Assignment3\Model\ResourceModel\PersonalInfo as ResourceModel;
use Magento\Framework\Model\AbstractModel;

class PersonalInfo extends AbstractModel
{
    /**
     * Initialize magento model.
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}
