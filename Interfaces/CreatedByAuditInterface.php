<?php declare(strict_types=1);

namespace Caldera\SimpleAuditBundle\Interfaces;

use Symfony\Component\Security\Core\User\UserInterface;

interface CreatedByAuditInterface
{
    public function getCreatedBy(): ?UserInterface;
    public function setCreatedBy(UserInterface $user = null): SimpleAuditInterface;
}
