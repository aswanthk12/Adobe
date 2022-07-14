<?php

namespace Aswanth\Assignment3\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface PersonalInfoInterface extends ExtensibleDataInterface
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
    public function getName();

    /**
     * @param string $name
     * @return string
     */
    public function setName(string $name);

    /**
     * @return mixed
     */
    public function getDob();

    /**
     * @param string $dob
     * @return string
     */
    public function setDob(string $dob);

    /**
     * @return string
     */
    public function getAddress();

    /**
     * @param string $address
     * @return string
     */
    public function setAddress(string $address);

    /**
     * @return string
     */
    public function getBloodGroup();

    /**
     * @param string $bloodGroup
     * @return string
     */
    public function setBloodGroup(string $bloodGroup);

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @param string $email
     * @return string
     */

    public function setEmail(string $email);

    /**
     * @return int
     */

    public function getPhone();

    /**
     * @param string $phoneNo
     * @return int
     */
    public function setPhone(string $phoneNo);

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Aswanth\Assignment3\Api\Data\PersonalInfoExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param \Aswanth\Assignment3\Api\Data\PersonalInfoExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Aswanth\Assignment3\Api\Data\PersonalInfoExtensionInterface $extensionAttributes);

}
