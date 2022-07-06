<?php

namespace Aswanth\Assignment3\Controller\Index;

use Aswanth\Assignment3\Api\PersonalInfoRepositoryInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;

class Personal extends Action
{
    private PersonalInfoRepositoryInterface $personalInfoRepository;
    private JsonFactory $jsonFactory;

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
     * @return Json
     */
    public function execute()
    {
        $result = $this->jsonFactory->create();
        $id = $this->getRequest()->getParam('id');
        $person = $this->personalInfoRepository->getById($id);
        return $result->setData($person);
    }
}
