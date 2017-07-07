<?php
/**
 * Created by PhpStorm.
 * User: kguegan
 * Date: 27/10/2016
 * Time: 13:43
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="quoteline")
 */
class Quoteline
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Quote $quoteId
     *
     * @ORM\ManyToOne(targetEntity="Quote", inversedBy="quoteline", cascade={"persist"})
     * @ORM\JoinColumn(name="quoteId", referencedColumnName="id", nullable=true)
     */
    private $quoteId;

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
     * @return Quoteline
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
     * @return Quoteline
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
     * @return Quoteline
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
     * Set quoteId
     *
     * @param \AppBundle\Entity\Quote $quoteId
     *
     * @return Quoteline
     */
    public function setQuoteId(\AppBundle\Entity\Quote $quoteId = null)
    {
        $this->quoteId = $quoteId;

        return $this;
    }

    /**
     * Get quoteId
     *
     * @return \AppBundle\Entity\Quote
     */
    public function getQuoteId()
    {
        return $this->quoteId;
    }
}
