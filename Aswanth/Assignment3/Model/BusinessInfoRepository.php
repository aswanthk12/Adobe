<?php

namespace Aswanth\Assignment3\Model;

use Aswanth\Assignment3\Api\BusinessInfoRepositoryInterface;
use Aswanth\Assignment3\Api\Data\BusinessInfoInterfaceFactory;

class BusinessInfoRepository implements BusinessInfoRepositoryInterface
{
    public BusinessInfoInterfaceFactory $businessInfoInterfaceFactory;
    public BusinessInfoFactory $businessInfoFactory;

    /**
     * @param BusinessInfoFactory $businessInfoFactory
     * @param BusinessInfoInterfaceFactory $businessInfo
     */
    public function __construct(
        BusinessInfoFactory $businessInfoFactory,
        BusinessInfoInterfaceFactory $businessInfoInterfaceFactory
    ) {
        $this->businessInfoFactory = $businessInfoFactory;
        $this->businessInfoInterfaceFactory = $businessInfoInterfaceFactory;
    }

    /**
     * GetById
     *
     * @param int $id
     * @return \Aswanth\Assignment3\Api\Data\BusinessInfoInterface
     */
    public function getById($id)
    {
        $businessInfo = $this->businessInfoFactory->create()->load($id);
        $businessInfoInterface = $this->businessInfoInterfaceFactory->create();
        $businessInfoInterface->setId($businessInfo->getId());
        $businessInfoInterface->setCompanyName($businessInfo->getCompanyName());
        $businessInfoInterface->setEmployeeName($businessInfo->getEmployeeName());
        $businessInfoInterface->setPersonalId($businessInfo->getPersonalId());
        return $businessInfoInterface;

    }

}
