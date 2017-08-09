<?php
/**
 * Created by PhpStorm.
 * User: kguegan
 * Date: 27/10/2016
 * Time: 13:42
 */

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="invoice")
 */
class Invoice
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Customer $customerId
     *
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="invoice")
     * @ORM\JoinColumn(name="customerId", referencedColumnName="id", nullable=true)
     */
    private $customerId;


    /**
     * @ORM\Column(name="number", type="string", length=255)
     */
    private $number;

    /**
     * @var Vat $vatId
     *
     * @ORM\ManyToOne(targetEntity="Vat", inversedBy="invoice")
     * @ORM\JoinColumn(name="vatId", referencedColumnName="id", nullable=true)
     */
    private $vatId;

    /**
     * @ORM\Column(name="totalpriceHT", type="string", length=255)
     */
    private $totalpriceHT;

    /**
     * @ORM\Column(name="totalpriceTTC", type="string", length=255)
     */
    private $totalpriceTTC;


    /**
     * @ORM\Column(name="createDate", type="date", length=255)
     */
    private $createDate;

    /**
     *
     *
     * @ORM\OneToMany(targetEntity="Invoiceline", mappedBy="invoiceId", cascade={"persist", "remove", "merge"}, orphanRemoval=true)
     */
    private $invoiceline;

    /**
     * @return mixed
     */
    public function getInvoiceline()
    {
        return $this->invoiceline;
    }

    /**
     * @param mixed $invoiceline
     */
    public function setInvoiceline($invoiceline)
    {
        $this->invoiceline = $invoiceline;
    }

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
     * Set number
     *
     * @param string $number
     *
     * @return Invoice
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set totalpriceHT
     *
     * @param string $totalpriceHT
     *
     * @return Invoice
     */
    public function setTotalpriceHT($totalpriceHT)
    {
        $this->totalpriceHT = $totalpriceHT;

        return $this;
    }

    /**
     * Get totalpriceHT
     *
     * @return string
     */
    public function getTotalpriceHT()
    {
        return $this->totalpriceHT;
    }

    /**
     * Set totalpriceTTC
     *
     * @param string $totalpriceTTC
     *
     * @return Invoice
     */
    public function setTotalpriceTTC($totalpriceTTC)
    {
        $this->totalpriceTTC = $totalpriceTTC;

        return $this;
    }

    /**
     * Get totalpriceTTC
     *
     * @return string
     */
    public function getTotalpriceTTC()
    {
        return $this->totalpriceTTC;
    }

    /**
     * Set customerId
     *
     * @param \AppBundle\Entity\Customer $customerId
     *
     * @return Invoice
     */
    public function setCustomerId(\AppBundle\Entity\Customer $customerId = null)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Get customerId
     *
     * @return \AppBundle\Entity\Customer
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Set vatId
     *
     * @param \AppBundle\Entity\Vat $vatId
     *
     * @return Invoice
     */
    public function setVatId(\AppBundle\Entity\Vat $vatId = null)
    {
        $this->vatId = $vatId;

        return $this;
    }

    /**
     * Get vatId
     *
     * @return \AppBundle\Entity\Vat
     */
    public function getVatId()
    {
        return $this->vatId;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->invoiceline = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set createDate
     *
     * @param \DateTime $createDate
     *
     * @return Invoice
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
     * Get createDate
     *
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Add invoiceline
     *
     * @param \AppBundle\Entity\Invoiceline $invoiceline
     *
     * @return Invoice
     */
    public function addInvoiceline(\AppBundle\Entity\Invoiceline $invoiceline)
    {
        $this->invoiceline[] = $invoiceline;

        return $this;
    }

    /**
     * Remove invoiceline
     *
     * @param \AppBundle\Entity\Invoiceline $invoiceline
     */
    public function removeInvoiceline(\AppBundle\Entity\Invoiceline $invoiceline)
    {
        $this->invoiceline->removeElement($invoiceline);
    }
}
