<?php

namespace Interactions\ValidationBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Interactions\Repository\CitiesRepository")
 */
class Cities
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer",  length=11)
     */
    private $id;




    /**
     * @ORM\Column(type="string", length=64)
     */
    private $name;

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Counties", inversedBy="cities")
     * @ORM\JoinColumn(nullable=true)
     */
    private $counties;

    public function getCounties():?Counties
    {
        return $this->counties;
    }

    public function setCounties(Counties $counties = null)
    {
        $this->counties = $counties;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Domo", mappedBy="cities")
     */
    private $domo;

    /**
     * @return Collection|Domo[]
     */
    public function __construct()
    {
        $this->domo = new ArrayCollection();
    }

    public function getDomo()
    {
        return $this->domo;
    }
}
