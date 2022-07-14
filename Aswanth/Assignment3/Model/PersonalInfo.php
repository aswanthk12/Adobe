<?php

namespace Aswanth\Assignment3\Model;

use Aswanth\Assignment3\Api\Data\PersonalInfoInterface;
use Aswanth\Assignment3\Model\ResourceModel\PersonalInfo as ResourceModel;
use Magento\Framework\Model\AbstractExtensibleModel;

class PersonalInfo extends AbstractExtensibleModel implements PersonalInfoInterface
{
    const ID = 'id';
    const NAME = 'name';
    const DOB = 'dob';
    const ADDRESS = 'address';
    const BLOODGROUP = 'blood_group';
    const EMAIL = 'email';
    const PHONENO = 'phone_no';
    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }
    /**
     * @inheritDoc
     */
    public function setId($id)
    {
        $this->setData(self::ID, $id);
    }
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }
    /**
     * @inheritDoc
     */
    public function setName($name)
    {
        $this->setData(self::NAME, $name);
    }
    /**
     * @inheritDoc
     */
    public function getDob()
    {
        return $this->getData(self::DOB);
    }
    /**
     * @inheritDoc
     */
    public function setDob($dob)
    {
        $this->setData(self::DOB, $dob);
    }
    /**
     * @inheritDoc
     */
    public function getAddress()
    {
        return $this->getData(self::ADDRESS);
    }
    /**
     * @inheritDoc
     */
    public function setAddress($address)
    {
        $this->setData(self::ADDRESS, $address);
    }
    /**
     * @inheritDoc
     */
    public function getBloodGroup()
    {
        return $this->getData(self::BLOODGROUP);
    }
    /**
     * @inheritDoc
     */
    public function setBloodGroup($blood_group)
    {
        $this->setData(self::BLOODGROUP, $blood_group);
    }
    /**
     * @inheritDoc
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }
    /**
     * @inheritDoc
     */
    public function setEmail($email)
    {
        $this->setData(self::EMAIL, $email);
    }
    /**
     * @inheritDoc
     */
    public function getPhone()
    {
        return $this->getData(self::PHONENO);
    }
    /**
     * @inheritDoc
     */
    public function setPhone($phone_no)
    {
        $this->setData(self::PHONENO, $phone_no);
    }
    /**
     * @inheritDoc
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * @inheritDoc
     */
    public function setExtensionAttributes(\Aswanth\Assignment3\Api\Data\PersonalInfoExtensionInterface  $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }


    /**
     * Initialize magento model.
     */

}
