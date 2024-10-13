<?php

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

trait CreatedAtTrait
{
    #[ORM\Column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable  $CreatedAt;

    public function getCreatedAt(): \DateTimeImmutable 
    {
        return $this->CreatedAt;
    }

    #[ORM\PrePersist]
    public function setCreatedAt(): void
    {
        $this->CreatedAt = new \DateTimeImmutable();
    }
}
