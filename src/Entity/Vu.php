<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vu
 *
 * @ORM\Table(name="vu", indexes={@ORM\Index(name="vu_article", columns={"id_article"}), @ORM\Index(name="vu_user", columns={"id_utilisateur"})})
 * @ORM\Entity
 */
class Vu
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_vu", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVu;

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
