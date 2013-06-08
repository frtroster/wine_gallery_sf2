<?php
namespace Acme\WineBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/** 
 * @ORM\Entity
 */
class Wine
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
     * @ORM\Column(type="integer", nullable=false)
     */
    private $year;

    /** 
     * @ORM\ManyToOne(targetEntity="Acme\WineBundle\Entity\Winemaker", inversedBy="Wines")
     * @ORM\JoinColumn(name="winemaker_id", referencedColumnName="id", nullable=false)
     */
    private $Winemaker;

    /** 
     * @ORM\ManyToMany(targetEntity="Acme\WineBundle\Entity\GrapeVariety", inversedBy="Wines")
     * @ORM\JoinTable(
     *     name="WineWithGrapeVariety", 
     *     joinColumns={@ORM\JoinColumn(name="wine_id", referencedColumnName="id", nullable=false)}, 
     *     inverseJoinColumns={@ORM\JoinColumn(name="grape_variety_id", referencedColumnName="id", nullable=false)}
     * )
     */
    private $GrapeVarieties;

    /** 
     * @ORM\ManyToMany(targetEntity="Acme\WineBundle\Entity\Restaurant", mappedBy="Wines")
     */
    private $Restaurants;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->GrapeVarieties = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Restaurants = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Wine
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
     * Set year
     *
     * @param integer $year
     * @return Wine
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set Winemaker
     *
     * @param \Acme\WineBundle\Entity\Winemaker $winemaker
     * @return Wine
     */
    public function setWinemaker(\Acme\WineBundle\Entity\Winemaker $winemaker)
    {
        $this->Winemaker = $winemaker;

        return $this;
    }

    /**
     * Get Winemaker
     *
     * @return \Acme\WineBundle\Entity\Winemaker 
     */
    public function getWinemaker()
    {
        return $this->Winemaker;
    }

    /**
     * Add GrapeVarieties
     *
     * @param \Acme\WineBundle\Entity\GrapeVariety $grapeVarieties
     * @return Wine
     */
    public function addGrapeVariety(\Acme\WineBundle\Entity\GrapeVariety $grapeVarieties)
    {
        $this->GrapeVarieties[] = $grapeVarieties;

        return $this;
    }

    /**
     * Remove GrapeVarieties
     *
     * @param \Acme\WineBundle\Entity\GrapeVariety $grapeVarieties
     */
    public function removeGrapeVariety(\Acme\WineBundle\Entity\GrapeVariety $grapeVarieties)
    {
        $this->GrapeVarieties->removeElement($grapeVarieties);
    }

    /**
     * Get GrapeVarieties
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGrapeVarieties()
    {
        return $this->GrapeVarieties;
    }

    /**
     * Add Restaurants
     *
     * @param \Acme\WineBundle\Entity\Restaurant $restaurants
     * @return Wine
     */
    public function addRestaurant(\Acme\WineBundle\Entity\Restaurant $restaurants)
    {
        $this->Restaurants[] = $restaurants;

        return $this;
    }

    /**
     * Remove Restaurants
     *
     * @param \Acme\WineBundle\Entity\Restaurant $restaurants
     */
    public function removeRestaurant(\Acme\WineBundle\Entity\Restaurant $restaurants)
    {
        $this->Restaurants->removeElement($restaurants);
    }

    /**
     * Get Restaurants
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRestaurants()
    {
        return $this->Restaurants;
    }
}
