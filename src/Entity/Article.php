<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article", indexes={@ORM\Index(name="art_boost", columns={"boost"}), @ORM\Index(name="id_Gouvernorat", columns={"id_Gouvernorat"}), @ORM\Index(name="art_user", columns={"id_proprietaire"}), @ORM\Index(name="art_cat", columns={"id_categorie"})})
 * @ORM\Entity
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="echange_cross_cat", type="integer", nullable=false)
     */
    private $echangeCrossCat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_publication", type="date", nullable=false)
     */
    private $datePublication;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255, nullable=false)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var \CategorieArticle
     *
     * @ORM\ManyToOne(targetEntity="CategorieArticle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_categorie", referencedColumnName="id")
     * })
     */
    private $idCategorie;

    /**
     * @var \Gouvernorat
     *
     * @ORM\ManyToOne(targetEntity="Gouvernorat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Gouvernorat", referencedColumnName="id_Gouvernorat")
     * })
     */
    private $idGouvernorat;

    /**
     * @var \Boost
     *
     * @ORM\ManyToOne(targetEntity="Boost")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="boost", referencedColumnName="id_boost")
     * })
     */
    private $boost;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_proprietaire", referencedColumnName="id_user")
     * })
     */
    private $idProprietaire;


}
