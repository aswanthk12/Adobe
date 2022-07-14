<?php

namespace Aswanth\Assignment3\Model;

use Aswanth\Assignment3\Api\Data\PersonalInfoInterface;
use Aswanth\Assignment3\Api\Data\PersonalInfoInterfaceFactory;
use Aswanth\Assignment3\Api\PersonalInfoRepositoryInterface;

class PersonalInfoRepository implements PersonalInfoRepositoryInterface
{
    public PersonalInfoInterfaceFactory $personalInfoInterfaceFactory;
    public PersonalInfoFactory $personalInfoFactory;

    /**
     * @param PersonalInfoFactory $personalInfoFactory
     * @param PersonalInfoInterfaceFactory $personalInfoInterfaceFactory
     */
    public function __construct(
        PersonalInfoFactory          $personalInfoFactory,
        PersonalInfoInterfaceFactory $personalInfoInterfaceFactory
    ) {
        $this->personalInfoFactory = $personalInfoFactory;
        $this->personalInfoInterfaceFactory = $personalInfoInterfaceFactory;
    }

    /**
     * GetById
     *
     * @param $id
     * @return PersonalInfoInterface
     */
    public function getById($id)
    {
        return $this->personalInfoInterfaceFactory->create()->load($id);
    }
}
