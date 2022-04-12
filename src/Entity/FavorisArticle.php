<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FavorisArticle
 *
 * @ORM\Table(name="favoris_article", indexes={@ORM\Index(name="fav_art", columns={"id_article"}), @ORM\Index(name="fav_user", columns={"id_utilisateur"})})
 * @ORM\Entity
 */
class FavorisArticle
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_favoris", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFavoris;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id_user")
     * })
     */
    private $idUtilisateur;

    /**
     * @var \Article
     *
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_article", referencedColumnName="id")
     * })
     */
    private $idArticle;


}
