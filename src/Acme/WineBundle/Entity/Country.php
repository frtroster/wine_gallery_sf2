<?php
namespace Acme\WineBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/** 
 * @ORM\Entity
 */
class Country
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
     * @ORM\OneToMany(targetEntity="Acme\WineBundle\Entity\Winemaker", mappedBy="Country")
     */
    private $Winemakers;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Winemakers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Country
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
     * Add Winemakers
     *
     * @param \Acme\WineBundle\Entity\Winemaker $winemakers
     * @return Country
     */
    public function addWinemaker(\Acme\WineBundle\Entity\Winemaker $winemakers)
    {
        $this->Winemakers[] = $winemakers;

        return $this;
    }

    /**
     * Remove Winemakers
     *
     * @param \Acme\WineBundle\Entity\Winemaker $winemakers
     */
    public function removeWinemaker(\Acme\WineBundle\Entity\Winemaker $winemakers)
    {
        $this->Winemakers->removeElement($winemakers);
    }

    /**
     * Get Winemakers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWinemakers()
    {
        return $this->Winemakers;
    }
}
