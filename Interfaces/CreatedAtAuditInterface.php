<?php declare(strict_types=1);

namespace Caldera\SimpleAuditBundle\Interfaces;

interface CreatedAtAuditInterface
{
    public function getCreatedAt(): ?\DateTimeInterface;
    public function setCreatedAt(\DateTimeInterface $dateTime);

}
