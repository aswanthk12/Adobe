<?php

namespace Aswanth\Assignment1\Plugin\Model;

use Magento\Framework\Stdlib\DateTime\DateTime;

class Customer
{
    /**
     * Date
     *
     * @var DateTime
     */
    private DateTime $dateTime;

    /**
     * Construct
     *
     * @param DateTime $dateTime
     */
    public function __construct(DateTime $dateTime)
    {
        $this->dateTime=$dateTime;
    }

    /**
     * Fetching Dob
     *
     * @param \Magento\Customer\Model\Data\Customer $subject
     * @param mixed $result
     * @return float
     */
    public function afterGetMiddlename(
        \Magento\Customer\Model\Data\Customer $subject,
        $result
    ) {
        $dob=$subject->getDob();
        $result=$this->calculateAge($dob);
        return $result;
    }

    /**
     * Calculate age
     *
     * @param string $dob
     * @return floatS
     */
    public function calculateAge($dob)
    {
        $bday =$this->dateTime->gmtTimestamp($dob);
        $today = time();
        $diff =$today - $bday;
        $diffDays=round($diff / (60 * 60 * 24));
        $calculatedAge= round($diffDays/365);
        return $calculatedAge;
    }
}
