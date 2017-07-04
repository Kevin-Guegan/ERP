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
 * @ORM\Table(name="quote")
 */
class Quote
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
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="quote")
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
     * @ORM\ManyToOne(targetEntity="Vat", inversedBy="quote")
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
     *
     *
     * @ORM\OneToMany(targetEntity="Quoteline", mappedBy="quoteId", cascade={"persist", "remove", "merge"}, orphanRemoval=true)
     */
    private $quoteline;

    /**
     * @return mixed
     */
    public function getQuoteline()
    {
        return $this->quoteline;
    }

    /**
     * @param mixed $quoteline
     */
    public function setQuoteline($quoteline)
    {
        $this->quoteline = $quoteline;
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
     * @return Quote
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
     * @return Quote
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
     * @return Quote
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
     * @return Quote
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
     * @return Quote
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
}
