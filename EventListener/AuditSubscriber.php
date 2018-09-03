<?php declare(strict_types=1);

namespace Caldera\SimpleAuditBundle\EventListener;

use Caldera\SimpleAuditBundle\Interfaces\CreatedAtAuditInterface;
use Caldera\SimpleAuditBundle\Interfaces\CreatedByAuditInterface;
use Caldera\SimpleAuditBundle\Interfaces\UpdatedAtAuditInterface;
use Caldera\SimpleAuditBundle\Interfaces\UpdatedByAuditInterface;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class AuditSubscriber implements EventSubscriber
{
    /** @var TokenStorageInterface */
    protected $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function getSubscribedEvents(): array
    {
        return [
            'prePersist',
            'preUpdate',
        ];
    }

    public function preUpdate(LifecycleEventArgs $args): void
    {
        $this->audit($args);
    }

    public function prePersist(LifecycleEventArgs $args): void
    {
        $this->audit($args);
    }

    public function audit(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();

        if ($entity instanceof CreatedAtAuditInterface && !$entity->getCreatedAt()) {
            $entity->setCreatedAt(new \DateTime());
        }

        if ($entity instanceof UpdatedAtAuditInterface) {
            $entity->setUpdatedAt(new \DateTime());
        }

        if ($entity instanceof CreatedByAuditInterface && !$entity->getCreatedBy() && $this->getUser()) {
            $entity->setCreatedBy($this->getUser());
        }

        if ($entity instanceof UpdatedByAuditInterface && $this->getUser()) {
            $entity->setUpdatedBy($this->getUser());
        }
    }

    protected function getUser(): ?UserInterface
    {
        $user = $this->tokenStorage->getToken()->getUser();

        if (is_object($user) && $user instanceof UserInterface) {
            return $user;
        }

        return null;
    }
}
