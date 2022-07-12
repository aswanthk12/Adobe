<?php

namespace Aswanth\Assignment3\Model;

use Aswanth\Assignment3\Model\ResourceModel\PersonalInfo as ResourceModel;
use Magento\Framework\Model\AbstractModel;

class PersonalInfo extends AbstractModel
{
    const ID = 'id';
    const NAME = 'name';
    const DOB = 'dob';
    const ADDRESS = 'address';
    const BLOODGROUP = 'blood_group';
    const EMAIL = 'email';
    const PHONENO = 'phone_no';

    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function setId($id)
    {
        $this->setData(self::ID, $id);
    }

    public function getName()
    {
        return $this->getData(self::NAME);
    }

    public function setName($name)
    {
        $this->setData(self::NAME, $name);
    }

    public function getDob()
    {
        return $this->getData(self::DOB);
    }

    public function setDob($dob)
    {
        $this->setData(self::DOB, $dob);
    }

    public function getAddress()
    {
        return $this->getData(self::ADDRESS);
    }

    public function setAddress($address)
    {
        $this->setData(self::ADDRESS, $address);
    }

    public function getBloodGroup()
    {
        return $this->getData(self::BLOODGROUP);
    }

    public function setBloodGroup($blood_group)
    {
        $this->setData(self::BLOODGROUP, $blood_group);
    }

    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    public function setEmail($email)
    {
        $this->setData(self::EMAIL, $email);
    }

    public function getPhoneNo()
    {
        return $this->getData(self::PHONENO);
    }

    public function setPhoneNo($phone_no)
    {
        $this->setData(self::PHONENO, $phone_no);
    }

    /**
     * Initialize magento model.
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}
