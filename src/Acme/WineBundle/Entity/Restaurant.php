<?php
namespace Acme\WineBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/** 
 * @ORM\Entity
 * @ORM\Table(indexes={@ORM\Index(name="owner_index", columns={"owner"})})
 */
class Restaurant
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $number_of_seats;

    /** 
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $owner;

    /** 
     * @ORM\ManyToMany(targetEntity="Acme\WineBundle\Entity\Wine", inversedBy="Restaurants")
     * @ORM\JoinTable(
     *     name="Wine4Restaurant", 
     *     joinColumns={@ORM\JoinColumn(name="restaurant_id", referencedColumnName="id", nullable=false)}, 
     *     inverseJoinColumns={@ORM\JoinColumn(name="wine_id", referencedColumnName="id", nullable=false)}
     * )
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
     * @return Restaurant
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
     * Set number_of_seats
     *
     * @param integer $numberOfSeats
     * @return Restaurant
     */
    public function setNumberOfSeats($numberOfSeats)
    {
        $this->number_of_seats = $numberOfSeats;

        return $this;
    }

    /**
     * Get number_of_seats
     *
     * @return integer 
     */
    public function getNumberOfSeats()
    {
        return $this->number_of_seats;
    }

    /**
     * Set owner
     *
     * @param string $owner
     * @return Restaurant
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return string 
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Add Wines
     *
     * @param \Acme\WineBundle\Entity\Wine $wines
     * @return Restaurant
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
