<?php

namespace Aswanth\Assignment3\Api\Data;

interface BusinessInfoInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return int
     */
    public function setId(int $id);

    /**
     * @return string
     */
    public function getEmployeeName();

    /**
     * @param string $employee_name
     * @return string
     */
    public function setEmployeeName($employee_name);

    /**
     * @return string
     */
    public function getCompanyName();

    /**
     * @param string $company_name
     * @return string
     */
    public function setCompanyName($company_name);

    /**
     * @return mixed
     */
    public function getPersonalId();

    /**
     * @param $personalId
     * @return mixed
     */
    public function setPersonalId($personalId);
}
