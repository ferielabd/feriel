<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Echange
 *
 * @ORM\Table(name="echange", indexes={@ORM\Index(name="ech_art1", columns={"id_article1"}), @ORM\Index(name="ech_art2", columns={"id_article2"}), @ORM\Index(name="ech_usr2", columns={"id_membre2"}), @ORM\Index(name="ech_user1", columns={"id_membre1"})})
 * @ORM\Entity
 */
class Echange
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_echange", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEchange;

    /**
     * @var int
     *
     * @ORM\Column(name="etat", type="integer", nullable=false)
     */
    private $etat;

    /**
     * @var \Article
     *
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_article2", referencedColumnName="id")
     * })
     */
    private $idArticle2;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_membre2", referencedColumnName="id_user")
     * })
     */
    private $idMembre2;

    /**
     * @var \Article
     *
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_article1", referencedColumnName="id")
     * })
     */
    private $idArticle1;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_membre1", referencedColumnName="id_user")
     * })
     */
    private $idMembre1;


}
