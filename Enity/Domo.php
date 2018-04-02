<?php

namespace Interactions\FormBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Interactions\FormBundle\ValidationBundle\Validator\Constraints as InteractionAssert;
/**
 * @ORM\Entity(repositoryClass="Interactions\Repository\DomoRepository")
 * @UniqueEntity("Email")
 */
class Domo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $Nume;

    /**
     * @ORM\Column(type="string", length=64)
     * @Assert\NotBlank()
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    private $Parola;


    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $Telefon;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $Adresa;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @InteractionAssert\ContainsSpecialCharacter
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $Prenume;
    /**
     * @ORM\Column(type="string", length=16)
     * @Assert\NotBlank()
     */
    private $Adresare;


    public function getId()
    {
        return $this->id;
    }

    public function getNume(): ?string
    {
        return $this->Nume;
    }

    public function setNume(string $Nume): self
    {
        $this->Nume = $Nume;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getParola(): ?string
    {
        return $this->Parola;
    }

    public function setParola(string $Parola): self
    {
        $this->Parola = $Parola;
        $salt = "fgv932g2e9dshdfkdjgf927gf8hlz082";
        $this->Parola = sha1($salt . $Parola);

        return $this;
    }

    public function getSalt()
    {
        // The bcrypt and argon2i algorithms don't require a separate salt.
        // You *may* need a real salt if you choose a different encoder.
        return null;
    }


    public function getTelefon(): ?string
    {
        return $this->Telefon;
    }

    public function setTelefon(string $Telefon): self
    {
        $this->Telefon = $Telefon;

        return $this;
    }

    public function getAdresa(): ?string
    {
        return $this->Adresa;
    }

    public function setAdresa(string $Adresa): self
    {
        $this->Adresa = $Adresa;

        return $this;
    }

    public function getPrenume(): ?string
    {
        return $this->Prenume;
    }

    public function setPrenume(string $Prenume): self
    {
        $this->Prenume = $Prenume;

        return $this;
    }

    public function getAdresare(): ?string
    {
        return $this->Adresare;
    }

    public function setAdresare(string $Adresare): self
    {
        $this->Adresare = $Adresare;

        return $this;
    }



    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Counties", inversedBy="domo")
     * @ORM\JoinColumn(nullable=true)
     */
    private $counties;

    public function getCounties():?Counties
    {
        return $this->counties;
    }

    public function setCounties(Counties $counties = null )
    {
        $this->counties = $counties;
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cities", inversedBy="domo")
     * @ORM\JoinColumn(nullable=true)
     */
    private $cities;

    public function getCities():?Cities
    {
        return $this->cities;
    }

    public function setCities(Cities $cities = null )
    {
        $this->cities = $cities;
    }
}

