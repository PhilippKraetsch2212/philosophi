<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bookings")
 */
class Booking
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Account", inversedBy="bookings")
     * @ORM\JoinColumn(name="id_account", referencedColumnName="id")
     */
    private $account;

    /**
     * @ORM\Column(type="date")
     */
    private $bookingDate;

    /**
     * @ORM\Column(type="date")
     */
    private $valueDate;

    /**
     * @ORM\Column(type="string")
     */
    private $bookingType;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $beneficiary;

    /**
     * @ORM\Column(type="string")
     */
    private $usage;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $iban;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $bic;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $customerReference;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $seatReference;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $creditorsId;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $foreignersFees;

    /**
     * @ORM\Column(type="decimal", scale=2, options={"default" = 0})
     */
    private $amount = 0;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $deviatingReceiver;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $numberOfJobs;

    /**
     * @ORM\Column(type="decimal", scale=2, options={"default" = 0})
     */
    private $debit = 0;

    /**
     * @ORM\Column(type="decimal", scale=2, options={"default" = 0})
     */
    private $credit = 0;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $currency;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set bookingDate
     *
     * @param \DateTime $bookingDate
     *
     * @return Booking
     */
    public function setBookingDate($bookingDate)
    {
        $this->bookingDate = $bookingDate;

        return $this;
    }

    /**
     * Get bookingDate
     *
     * @return \DateTime
     */
    public function getBookingDate()
    {
        return $this->bookingDate;
    }

    /**
     * Set valueDate
     *
     * @param \DateTime $valueDate
     *
     * @return Booking
     */
    public function setValueDate($valueDate)
    {
        $this->valueDate = $valueDate;

        return $this;
    }

    /**
     * Get valueDate
     *
     * @return \DateTime
     */
    public function getValueDate()
    {
        return $this->valueDate;
    }

    /**
     * Set bookingType
     *
     * @param string $bookingType
     *
     * @return Booking
     */
    public function setBookingType($bookingType)
    {
        $this->bookingType = $bookingType;

        return $this;
    }

    /**
     * Get bookingType
     *
     * @return string
     */
    public function getBookingType()
    {
        return $this->bookingType;
    }

    /**
     * Set beneficiary
     *
     * @param string $beneficiary
     *
     * @return Booking
     */
    public function setBeneficiary($beneficiary)
    {
        $this->beneficiary = $beneficiary;

        return $this;
    }

    /**
     * Get beneficiary
     *
     * @return string
     */
    public function getBeneficiary()
    {
        return $this->beneficiary;
    }

    /**
     * Set usage
     *
     * @param string $usage
     *
     * @return Booking
     */
    public function setUsage($usage)
    {
        $this->usage = $usage;

        return $this;
    }

    /**
     * Get usage
     *
     * @return string
     */
    public function getUsage()
    {
        return $this->usage;
    }

    /**
     * Set iban
     *
     * @param string $iban
     *
     * @return Booking
     */
    public function setIban($iban)
    {
        $this->iban = $iban;

        return $this;
    }

    /**
     * Get iban
     *
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * Set bic
     *
     * @param string $bic
     *
     * @return Booking
     */
    public function setBic($bic)
    {
        $this->bic = $bic;

        return $this;
    }

    /**
     * Get bic
     *
     * @return string
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * Set customerReference
     *
     * @param string $customerReference
     *
     * @return Booking
     */
    public function setCustomerReference($customerReference)
    {
        $this->customerReference = $customerReference;

        return $this;
    }

    /**
     * Get customerReference
     *
     * @return string
     */
    public function getCustomerReference()
    {
        return $this->customerReference;
    }

    /**
     * Set seatReference
     *
     * @param string $seatReference
     *
     * @return Booking
     */
    public function setSeatReference($seatReference)
    {
        $this->seatReference = $seatReference;

        return $this;
    }

    /**
     * Get seatReference
     *
     * @return string
     */
    public function getSeatReference()
    {
        return $this->seatReference;
    }

    /**
     * Set creditorsId
     *
     * @param string $creditorsId
     *
     * @return Booking
     */
    public function setCreditorsId($creditorsId)
    {
        $this->creditorsId = $creditorsId;

        return $this;
    }

    /**
     * Get creditorsId
     *
     * @return string
     */
    public function getCreditorsId()
    {
        return $this->creditorsId;
    }

    /**
     * Set foreignersFees
     *
     * @param string $foreignersFees
     *
     * @return Booking
     */
    public function setForeignersFees($foreignersFees)
    {
        $this->foreignersFees = $foreignersFees;

        return $this;
    }

    /**
     * Get foreignersFees
     *
     * @return string
     */
    public function getForeignersFees()
    {
        return $this->foreignersFees;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return Booking
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set deviatingReceiver
     *
     * @param string $deviatingReceiver
     *
     * @return Booking
     */
    public function setDeviatingReceiver($deviatingReceiver)
    {
        $this->deviatingReceiver = $deviatingReceiver;

        return $this;
    }

    /**
     * Get deviatingReceiver
     *
     * @return string
     */
    public function getDeviatingReceiver()
    {
        return $this->deviatingReceiver;
    }

    /**
     * Set numberOfJobs
     *
     * @param string $numberOfJobs
     *
     * @return Booking
     */
    public function setNumberOfJobs($numberOfJobs)
    {
        $this->numberOfJobs = $numberOfJobs;

        return $this;
    }

    /**
     * Get numberOfJobs
     *
     * @return string
     */
    public function getNumberOfJobs()
    {
        return $this->numberOfJobs;
    }

    /**
     * Set debit
     *
     * @param string $debit
     *
     * @return Booking
     */
    public function setDebit($debit)
    {
        $this->debit = $debit;

        return $this;
    }

    /**
     * Get debit
     *
     * @return string
     */
    public function getDebit()
    {
        return $this->debit;
    }

    /**
     * Set credit
     *
     * @param string $credit
     *
     * @return Booking
     */
    public function setCredit($credit)
    {
        $this->credit = $credit;

        return $this;
    }

    /**
     * Get credit
     *
     * @return string
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return Booking
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set account
     *
     * @param \AppBundle\Entity\Account $account
     *
     * @return Booking
     */
    public function setAccount(\AppBundle\Entity\Account $account = null)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return \AppBundle\Entity\Account
     */
    public function getAccount()
    {
        return $this->account;
    }
}
