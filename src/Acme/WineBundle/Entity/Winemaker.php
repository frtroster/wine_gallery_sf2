<?php
namespace Acme\WineBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/** 
 * @ORM\Entity
 */
class Winemaker
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="string", nullable=false)
     */
    private $name;

    /** 
     * @ORM\OneToMany(targetEntity="Acme\WineBundle\Entity\Wine", mappedBy="Winemaker")
     */
    private $Wines;

    /** 
     * @ORM\ManyToOne(targetEntity="Acme\WineBundle\Entity\Country", inversedBy="Winemakers")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id", nullable=false)
     */
    private $Country;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Wines = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Winemaker
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
     * Add Wines
     *
     * @param \Acme\WineBundle\Entity\Wine $wines
     * @return Winemaker
     */
    public function addWine(\Acme\WineBundle\Entity\Wine $wines)
    {
        $this->Wines[] = $wines;

        return $this;
    }

    /**
     * Remove Wines
     *
     * @param \Acme\WineBundle\Entity\Wine $wines
     */
    public function removeWine(\Acme\WineBundle\Entity\Wine $wines)
    {
        $this->Wines->removeElement($wines);
    }

    /**
     * Get Wines
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWines()
    {
        return $this->Wines;
    }

    /**
     * Set Country
     *
     * @param \Acme\WineBundle\Entity\Country $country
     * @return Winemaker
     */
    public function setCountry(\Acme\WineBundle\Entity\Country $country)
    {
        $this->Country = $country;

        return $this;
    }

    /**
     * Get Country
     *
     * @return \Acme\WineBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->Country;
    }
}
