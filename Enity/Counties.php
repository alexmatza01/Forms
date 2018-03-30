<?php

namespace Interactions\ValidationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="Interactions\Repository\CountiesRepository")
 */
class Counties
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", length=11)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $name;

//    public function __construct()
//    {
//        $this->id = new ArrayCollection();
//    }


    public function getId()
    {
        return $this->id;
    }


    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
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

    // ...

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cities", mappedBy="counties")
     * @ORM\OrderBy({"name"="ASC"})
     */
    private $cities;

    public function __construct()
    {
        $this->cities = new ArrayCollection();
        $this->counties = new ArrayCollection();
    }

    /**
     * @return Collection|Cities[]
     */
    public function getCities()
    {
        return $this->cities;
    }


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Domo", mappedBy="counties")
     */
    private $domo;

    /**
     * @return Collection|Domo[]
     */
    public function getDomo()
    {
        return $this->domo;
    }
}