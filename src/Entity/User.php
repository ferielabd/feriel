<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="Ce champs ne doit pas être vide")
     * @Assert\Length(min=3,minMessage="Votre Nom doit être supèrieur à 3 caractéres")
     */
    private $nom;

    /**
     * @var string
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="Ce champs ne doit pas être vide")
     * @Assert\Length(min=3,minMessage="Votre Nom doit être supèrieur à 3 caractéres")
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="Ce champs ne doit pas être vide")
     * @Assert\Email(
     *     message = "l'Email :  '{{ value }}' n'est pas valid."
     * )
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=255, nullable=false)
     *  * @Assert\NotBlank(message="Ce champs ne doit pas être vide")
     * @Assert\Length(min=3,minMessage="Votre Nom doit être supèrieur à 3 caractéres")
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=255, nullable=false)
     *  * @Assert\NotBlank(message="Ce champs ne doit pas être vide")
     * @Assert\Length(min=3,minMessage="Votre Nom doit être supèrieur à 3 caractéres")
     */
    private $mdp;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=false)
     *  * @Assert\NotBlank(message="Ce champs ne doit pas être vide")
     * @Assert\Length(min=3,minMessage="Votre Nom doit être supèrieur à 3 caractéres")
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=false)
     *  @Assert\NotBlank(message="Ce champs ne doit pas être vide")
     * @Assert\Length(min=8,max=8,minMessage="CIN doit être égale à 8 chiffres numériques")
     */
    private $phone;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_naiss", type="date", nullable=true)
     */
    private $dateNaiss;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=255, nullable=false)
     *  @Assert\NotBlank(message="Ce champs ne doit pas être vide")
     * @Assert\Length(min=3,minMessage="Votre Nom doit être supèrieur à 3 caractéres")
     */
    private $sexe;

    /**
     * @var float
     *
     * @ORM\Column(name="rating", type="float", precision=10, scale=0, nullable=false)
     */
    private $rating = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="nb_art_ech", type="integer", nullable=false)
     */
    private $nbArtEch = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="nb_art_pos", type="integer", nullable=false)
     */
    private $nbArtPos = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255, nullable=false)
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @return int
     */
    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    /**
     * @param int $idUser
     */
    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @return string
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getLogin(): ?string
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    /**
     * @param string $mdp
     */
    public function setMdp(string $mdp): void
    {
        $this->mdp = $mdp;
    }

    /**
     * @return string
     */
    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse(string $adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateNaiss(): ?\DateTime
    {
        return $this->dateNaiss;
    }

    /**
     * @param \DateTime|null $dateNaiss
     */
    public function setDateNaiss(?\DateTime $dateNaiss): void
    {
        $this->dateNaiss = new \DateTime('@'.strtotime('now'));
    }

    /**
     * @return string
     */
    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    /**
     * @param string $sexe
     */
    public function setSexe(string $sexe): void
    {
        $this->sexe = $sexe;
    }

    /**
     * @return float
     */
    public function getRating(): ?float
    {
        return $this->rating;
    }

    /**
     * @param float $rating
     */
    public function setRating(float $rating): void
    {
        $this->rating = $rating;
    }

    /**
     * @return int
     */
    public function getNbArtEch(): ?int
    {
        return $this->nbArtEch;
    }

    /**
     * @param int $nbArtEch
     */
    public function setNbArtEch(int $nbArtEch): void
    {
        $this->nbArtEch = $nbArtEch;
    }

    /**
     * @return int
     */
    public function getNbArtPos(): ?int
    {
        return $this->nbArtPos;
    }

    /**
     * @param int $nbArtPos
     */
    public function setNbArtPos(int $nbArtPos): void
    {
        $this->nbArtPos = $nbArtPos;
    }

    /**
     * @return string
     */
    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }


}
