<?php
namespace Acme\WineBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/** 
 * @ORM\Entity
 */
class GrapeVariety
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $name;

    /** 
     * @ORM\Column(type="string", length=9999, nullable=false)
     */
    private $description;

    /** 
     * @ORM\ManyToMany(targetEntity="Acme\WineBundle\Entity\Wine", mappedBy="GrapeVarieties")
     */
    private $Wines;
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
     * @return GrapeVariety
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
     * Set description
     *
     * @param string $description
     * @return GrapeVariety
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add Wines
     *
     * @param \Acme\WineBundle\Entity\Wine $wines
     * @return GrapeVariety
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
}
