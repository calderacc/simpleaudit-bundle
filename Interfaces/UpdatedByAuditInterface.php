<?php declare(strict_types=1);

namespace Caldera\SimpleAuditBundle\Interfaces;

use Symfony\Component\Security\Core\User\UserInterface;

interface UpdatedByAuditInterface
{
    public function getUpdatedBy(): ?UserInterface;
    public function setUpdatedBy(UserInterface $user = null);
}
