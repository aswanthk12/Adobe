<?php

namespace Aswanth\Assignment3\Model;

use Aswanth\Assignment3\Api\Data\BusinessInfoInterface;
use Aswanth\Assignment3\Model\ResourceModel\BusinessInfo as ResourceModel;
use Magento\Framework\Model\AbstractModel;

class BusinessInfo extends AbstractModel implements BusinessInfoInterface
{
    const PERSONALID = 'personal_id';

    const EMPNAME = 'employee_name';

    const COMPANYNAME = 'company_name';

    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * @inheritDoc
     */
    public function getEmployeeName()
    {
        return $this->getData(self::EMPNAME);
    }

    /**
     * @inheritDoc
     */
    public function setEmployeeName($employee_name)
    {
        return $this->setData(self::EMPNAME, $employee_name);
    }

    /**
     * @inheritDoc
     */
    public function getCompanyName()
    {
        return $this->getData(self::COMPANYNAME);
    }

    /**
     * @inheritDoc
     */
    public function setCompanyName($company_name)
    {
        return $this->setData(self::COMPANYNAME, $company_name);
    }

    /**
     * @inheritDoc
     */
    public function getPersonalId()
    {
        return $this->getData(self::PERSONALID);
    }

    /**
     * @inheritDoc
     */
    public function setPersonalId($personalId)
    {
        return $this->setData(self::PERSONALID, $personalId);
    }
}
