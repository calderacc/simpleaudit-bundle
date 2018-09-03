<?php declare(strict_types=1);

namespace Caldera\SimpleAuditBundle\Traits;

trait UpdatedAtAuditTrait
{
    /**
     * @var \DateTime $updatedAt
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updatedAt;

    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt = null)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
