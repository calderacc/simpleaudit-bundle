<?php declare(strict_types=1);

namespace Caldera\SimpleAuditBundle\Traits;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use \Symfony\Component\Security\Core\User\UserInterface;

trait CreatedByAuditTrait
{
    /**
     * @var UserInterface $createdBy
     * @ORM\ManyToOne(targetEntity="User", inversedBy="createdUsers")
     * @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     */
    protected $createdBy;

    /**
     * @var ArrayCollection $createdUsers
     * @ORM\OneToMany(targetEntity="User", mappedBy="createdBy", fetch="LAZY")
     */
    protected $createdUsers;

    public function __construct()
    {
        $this->createdUsers = new ArrayCollection();
    }

    public function getCreatedBy(): ?UserInterface
    {
        return $this->createdBy;
    }

    public function setCreatedBy(UserInterface $user = null)
    {
        $this->createdBy = $user;

        return $this;
    }

    public function addCreatedUser(UserInterface $user)
    {
        $this->createdUsers->add($user);

        return $this;
    }

    public function getCreatedUsers(): Collection
    {
        return $this->createdUsers;
    }

    public function setCreatedUsers(Collection $users)
    {
        $this->createdUsers = $users;

        return $this;
    }

    public function removeCreatedUser(UserInterface $user)
    {
        $this->createdUsers->removeElement($user);

        return $this;
    }
}
