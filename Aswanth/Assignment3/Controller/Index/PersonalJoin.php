<?php

namespace Aswanth\Assignment3\Controller\Index;

use Aswanth\Assignment3\Api\PersonalInfoRepositoryInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;

class PersonalJoin extends Action
{
    /**
     * @var PersonalInfoRepositoryInterface
     */
    public PersonalInfoRepositoryInterface $personalInfoRepository;
    /**
     * @var JsonFactory
     */
    private JsonFactory $jsonFactory;

    /**
     * Constructor
     *
     * @param Context $context
     * @param JsonFactory $jsonFactory
     * @param PersonalInfoRepositoryInterface $personalInfoRepository
     */
    public function __construct(
        Context                         $context,
        JsonFactory                     $jsonFactory,
        PersonalInfoRepositoryInterface $personalInfoRepository
    ) {
        parent::__construct($context);
        $this->personalInfoRepository = $personalInfoRepository;
        $this->jsonFactory = $jsonFactory;
    }

    /**
     * Execute method
     *
     * @return Json
     */
    public function execute()
    {
        $data = $this->personalInfoRepository->getPersonalDetails(1);
        $result = $this->jsonFactory->create();
        return $result->setData($data);
    }
}
