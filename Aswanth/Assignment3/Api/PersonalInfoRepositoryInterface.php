<?php

namespace Aswanth\Assignment3\Api;

use Aswanth\Assignment3\Api\Data\PersonalInfoInterface;

interface PersonalInfoRepositoryInterface
{
    /**
     * GetById
     *
     * @param int $id
     * @return PersonalInfoInterface
     */
    public function getById(int $id);
//    public function getPersonalDetails(int $id);

}
