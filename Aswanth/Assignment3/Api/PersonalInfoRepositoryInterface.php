<?php

namespace Aswanth\Assignment3\Api;

interface PersonalInfoRepositoryInterface
{
    /**
     * GetById
     *
     * @param int $id
     * @return mixed
     */
    public function getById(int $id);
    public function getPersonalDetails(int $id);
    
}
