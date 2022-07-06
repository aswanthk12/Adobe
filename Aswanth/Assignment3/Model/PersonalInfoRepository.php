<?php

namespace Aswanth\Assignment3\Model;

use Aswanth\Assignment3\Api\PersonalInfoRepositoryInterface;
use Aswanth\Assignment3\Model\PersonalInfoFactory;

class PersonalInfoRepository implements PersonalInfoRepositoryInterface
{
    private PersonalInfoFactory $personalInfoFactory;

    public function __construct(PersonalInfoFactory $personalInfoFactory)
    {
        $this->personalInfoFactory = $personalInfoFactory;
    }

    public function getById($id)
    {
        $personalInfo = $this->personalInfoFactory->create();
        return $personalInfo->load($id);
    }

}
