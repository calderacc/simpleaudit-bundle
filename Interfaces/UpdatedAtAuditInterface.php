<?php declare(strict_types=1);

namespace Caldera\SimpleAuditBundle\Interfaces;

interface UpdatedAtAuditInterface
{
    public function getUpdatedAt(): ?\DateTimeInterface;
    public function setUpdatedAt(\DateTimeInterface $dateTime = null): SimpleAuditInterface;
}
