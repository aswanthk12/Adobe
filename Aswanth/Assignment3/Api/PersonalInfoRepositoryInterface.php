<?php

namespace Aswanth\Assignment3\Api;


interface PersonalInfoRepositoryInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id);
}
