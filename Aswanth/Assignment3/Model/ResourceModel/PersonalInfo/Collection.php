<?php

namespace Aswanth\Assignment3\Model\ResourceModel\PersonalInfo;

use Aswanth\Assignment3\Model\PersonalInfo as Model;
use Aswanth\Assignment3\Model\ResourceModel\PersonalInfo as ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
