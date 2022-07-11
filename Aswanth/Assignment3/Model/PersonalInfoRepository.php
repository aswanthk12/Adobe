<?php

namespace Aswanth\Assignment3\Model;

use Aswanth\Assignment3\Api\PersonalInfoRepositoryInterface;
use Magento\Framework\App\ResourceConnection;


class PersonalInfoRepository implements PersonalInfoRepositoryInterface
{
    /**
     * @var PersonalInfoFactory
     */
    private PersonalInfoFactory $personalInfoFactory;

    /**
     * PersonalInfoFactory
     *
     * @param PersonalInfoFactory $personalInfoFactory
     */
    public function __construct(PersonalInfoFactory $personalInfoFactory, ResourceConnection $resourceConnection)
    {
        $this->personalInfoFactory = $personalInfoFactory;
        $this->resourceConnection = $resourceConnection;
    }

    /**
     * GetById
     *
     * @param int $id
     * @return PersonalInfo|mixed
     */
    public function getById($id)
    {
        $personalInfo = $this->personalInfoFactory->create();
        return $personalInfo->load($id);
    }
    public function getPersonalDetails(int $id)
    {
    $connection = $this->resourceConnection->getConnection();
    $select = $connection->select()
        ->from(
            ['main_table' => 'personal_info'],
        )
        ->join(
            ['sub_table' => 'business_info'],
            'main_table.id = sub_table.personal_id'
        )->where('main_table.id = ?', $id);

    return $connection->fetchAll($select);
}
}
