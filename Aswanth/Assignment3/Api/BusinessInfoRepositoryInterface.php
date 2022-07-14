<?php

namespace Aswanth\Assignment3\Api;

use Aswanth\Assignment3\Api\Data\BusinessInfoInterface;
use Aswanth\Assignment3\Api\Data\BusinessInfoInterfaceFactory;

interface BusinessInfoRepositoryInterface
{
    /**
     * GetById
     *
     * @param int $id
     * @return BusinessInfoInterface
     */
    public function getById($id);

//    public function getBusinessDetails(int $id);

}
