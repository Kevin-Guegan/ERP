<?php
/**
 * Created by PhpStorm.
 * User: kguegan
 * Date: 27/10/2016
 * Time: 13:42
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="invoiceline")
 */
class Invoiceline
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Invoice $invoiceId
     *
     * @ORM\ManyToOne(targetEntity="Invoice", inversedBy="invoiceline")
     * @ORM\JoinColumn(name="invoiceId", referencedColumnName="id", nullable=true)
     */
    private $invoiceId;

    /**
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @ORM\Column(name="unitprice", type="integer")
     */
    private $unitprice;

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
     * Set name
     *
     * @param string $name
     *
     * @return Invoiceline
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Invoiceline
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set unitprice
     *
     * @param integer $unitprice
     *
     * @return Invoiceline
     */
    public function setUnitprice($unitprice)
    {
        $this->unitprice = $unitprice;

        return $this;
    }

    /**
     * Get unitprice
     *
     * @return integer
     */
    public function getUnitprice()
    {
        return $this->unitprice;
    }

    /**
     * Set invoiceId
     *
     * @param \AppBundle\Entity\Invoice $invoiceId
     *
     * @return Invoiceline
     */
    public function setInvoiceId(\AppBundle\Entity\Invoice $invoiceId = null)
    {
        $this->invoiceId = $invoiceId;

        return $this;
    }

    /**
     * Get invoiceId
     *
     * @return \AppBundle\Entity\Invoice
     */
    public function getInvoiceId()
    {
        return $this->invoiceId;
    }
}
