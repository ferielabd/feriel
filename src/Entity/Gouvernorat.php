<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gouvernorat
 *
 * @ORM\Table(name="gouvernorat")
 * @ORM\Entity
 */
class Gouvernorat
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_Gouvernorat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idGouvernorat;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;


}
