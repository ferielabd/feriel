<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation", indexes={@ORM\Index(name="ech_rec", columns={"id_echange"}), @ORM\Index(name="id_membre", columns={"id_membre"}), @ORM\Index(name="id_membre_2", columns={"id_membre"})})
 * @ORM\Entity
 */
class Reclamation
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
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_rec", type="date", nullable=false)
     */
    private $dateRec;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="etat", type="integer", nullable=false)
     */
    private $etat = '0';

    /**
     * @var \Echange
     *
     * @ORM\ManyToOne(targetEntity="Echange")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_echange", referencedColumnName="id_echange")
     * })
     */
    private $idEchange;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_membre", referencedColumnName="id_user")
     * })
     */
    private $idMembre;


}
