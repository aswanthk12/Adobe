<?php

namespace Aswanth\Assignment3\Model\ResourceModel\BusinessInfo;

use Aswanth\Assignment3\Model\BusinessInfo as Model;
use Aswanth\Assignment3\Model\ResourceModel\BusinessInfo as ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'business_info_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
