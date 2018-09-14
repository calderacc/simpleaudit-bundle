<?php declare(strict_types=1);

namespace Caldera\SimpleAuditBundle\Traits;

trait CreatedAtAuditTrait
{
    /**
     * @var \DateTime $createdAt
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected $createdAt;

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
