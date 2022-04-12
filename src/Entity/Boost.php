<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Boost
 *
 * @ORM\Table(name="boost")
 * @ORM\Entity
 */
class Boost
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_boost", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBoost;

    /**
     * @var string
     *
     * @ORM\Column(name="type_boost", type="string", length=255, nullable=false)
     */
    private $typeBoost;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_boost", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixBoost;


}
