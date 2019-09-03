<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsRepository")
 * @ORM\HasLifecycleCallbacks
 */
class News
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titreNewAr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titreNewEn;

    /**
     * @Gedmo\Slug(fields={"titreNewAr"})
     * @ORM\Column(name="slug_ar", type="string", length=180, unique=true)
     */

    private $slugAr;
    /**
     * @Gedmo\Slug(fields={"titreNewEn"})
     * @ORM\Column(name="slug_en", type="string", length=180, unique=true)
     */
    private $slugEn;



    /**
     * @ORM\Column(type="text")
     */
    private $contenuAr;

    /**
     * @ORM\Column(type="text")
     */
    private $contenuEn;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lienFbAr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lienFbEn;

    /**
     * @ORM\Column(type="boolean")
     */
    private $publier;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateNew;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Image", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $image;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->dateNew    = new \Datetime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreNewAr(): ?string
    {
        return $this->titreNewAr;
    }

    public function setTitreNewAr(string $titreNewAr): self
    {
        $this->titreNewAr = $titreNewAr;

        return $this;
    }

    public function getTitreNewEn(): ?string
    {
        return $this->titreNewEn;
    }

    public function setTitreNewEn(string $titreNewEn): self
    {
        $this->titreNewEn = $titreNewEn;

        return $this;
    }

    public function getSlugAr(): ?string
    {
        return $this->slugAr;
    }

    public function setSlugAr(string $slugAr): self
    {
        $this->slugAr = $slugAr;

        return $this;
    }

    public function getSlugEn(): ?string
    {
        return $this->slugEn;
    }

    public function setSlugEn(string $slugEn): self
    {
        $this->slugEn = $slugEn;

        return $this;
    }

    public function getContenuAr(): ?string
    {
        return $this->contenuAr;
    }

    public function setContenuAr(string $contenuAr): self
    {
        $this->contenuAr = $contenuAr;

        return $this;
    }

    public function getContenuEn(): ?string
    {
        return $this->contenuEn;
    }

    public function setContenuEn(string $contenuEn): self
    {
        $this->contenuEn = $contenuEn;

        return $this;
    }

    public function getLienFbAr(): ?string
    {
        return $this->lienFbAr;
    }

    public function setLienFbAr(string $lienFbAr): self
    {
        $this->lienFbAr = $lienFbAr;

        return $this;
    }

    public function getLienFbEn(): ?string
    {
        return $this->lienFbEn;
    }

    public function setLienFbEn(string $lienFbEn): self
    {
        $this->lienFbEn = $lienFbEn;

        return $this;
    }

    public function getPublier(): ?bool
    {
        return $this->publier;
    }

    public function setPublier(bool $publier): self
    {
        $this->publier = $publier;

        return $this;
    }

    public function getDateNew(): ?\DateTimeInterface
    {
        return $this->dateNew;
    }

    public function setDateNew(\DateTimeInterface $dateNew): self
    {
        $this->dateNew = $dateNew;

        return $this;
    }

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(?Image $image): self
    {
        $this->image = $image;

        return $this;
    }

}
