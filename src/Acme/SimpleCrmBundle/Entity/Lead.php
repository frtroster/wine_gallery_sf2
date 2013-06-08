<?php
namespace Acme\SimpleCrmBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/** 
 * @ORM\Entity
 */
class Lead
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
     * @ORM\Column(type="float", nullable=false)
     */
    private $commision;

    /** 
     * @ORM\ManyToMany(targetEntity="Acme\WineBundle\Entity\Restaurant", cascade={"all"})
     * @ORM\JoinTable(
     *     name="RestaurantHasLead", 
     *     joinColumns={@ORM\JoinColumn(name="lead_id", referencedColumnName="id", nullable=false)}, 
     *     inverseJoinColumns={@ORM\JoinColumn(name="restaurant_id", referencedColumnName="id", nullable=false)}
     * )
     */
    private $Restaurants;
    /**
     * Constructor
     */
    public function __construct()
    {
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
     * @return Lead
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
     * Set commision
     *
     * @param float $commision
     * @return Lead
     */
    public function setCommision($commision)
    {
        $this->commision = $commision;

        return $this;
    }

    /**
     * Get commision
     *
     * @return float 
     */
    public function getCommision()
    {
        return $this->commision;
    }

    /**
     * Add Restaurants
     *
     * @param \Acme\WineBundle\Entity\Restaurant $restaurants
     * @return Lead
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
