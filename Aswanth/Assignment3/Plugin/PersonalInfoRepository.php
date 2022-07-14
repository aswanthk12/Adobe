<?php
namespace Aswanth\Assignment3\Plugin;

use Aswanth\Assignment3\Api\Data\PersonalInfoExtension;
use Aswanth\Assignment3\Api\Data\PersonalInfoExtensionFactory;
use Aswanth\Assignment3\Api\PersonalInfoRepositoryInterface as Subject;
use Aswanth\Assignment3\Api\Data\PersonalInfoInterface;
use Aswanth\Assignment3\Api\BusinessInfoRepositoryInterface;

class PersonalInfoRepository
{
    /**
     * @var PersonalInfoExtension
     */
    private PersonalInfoExtension $PersonalInfoExtension;
    /**
     * @var PersonalInfoExtensionFactory
     */
    private PersonalInfoExtensionFactory $PersonalInfoExtensionFactory;
    /**
     * @var BusinessInfoRepositoryInterface
     */
    private BusinessInfoRepositoryInterface $BusinessInfoRepositoryInterface;

    /**
     * AddressLoad constructor.
     * @param PersonalInfoExtension $PersonalInfoExtension
     * @param PersonalInfoExtensionFactory $PersonalInfoExtensionFactory
     * @param BusinessInfoRepositoryInterface $BusinessInfoRepositoryInterface
     */
    public function __construct(
        PersonalInfoExtension $PersonalInfoExtension,
        PersonalInfoExtensionFactory $PersonalInfoExtensionFactory,
        BusinessInfoRepositoryInterface $BusinessInfoRepositoryInterface
    ) {
        $this->PersonalInfoExtension = $PersonalInfoExtension;
        $this->PersonalInfoExtensionFactory = $PersonalInfoExtensionFactory;
        $this->BusinessInfoRepositoryInterface = $BusinessInfoRepositoryInterface;
    }

    /**
     * Get by id
     *
     * @param Subject $subject
     * @param PersonalInfoInterface $result
     */
    public function afterGetById(Subject $subject, PersonalInfoInterface $result)
    {
        $extensionAttributes = $result->getExtensionAttributes();
        $personelExtension = $extensionAttributes ? $extensionAttributes : $this->PersonalInfoExtensionFactory->create();
        $businessdtl = $this->BusinessInfoRepositoryInterface->getById($result->getId());
        $personelExtension->setBusinessDetails($businessdtl);
        return $result->setExtensionAttributes($personelExtension);
    }
}
