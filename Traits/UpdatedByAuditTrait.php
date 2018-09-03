<?php declare(strict_types=1);

namespace Caldera\SimpleAuditBundle\Traits;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use \Symfony\Component\Security\Core\User\UserInterface;

trait UpdatedByAuditTrait
{
    /**
     * @var UserInterface $updatedBy
     * @ORM\ManyToOne(targetEntity="User", inversedBy="updatedUsers")
     * @ORM\JoinColumn(name="updated_by", referencedColumnName="id")
     */
    protected $updatedBy;

    /**
     * @var ArrayCollection $updatedUsers
     * @ORM\OneToMany(targetEntity="User", mappedBy="updatedBy", fetch="LAZY")
     */
    protected $updatedUsers;

    public function __construct()
    {
        $this->updatedUsers = new ArrayCollection();
    }

    public function getUpdatedBy(): ?UserInterface
    {
        return $this->updatedBy;
    }

    public function setUpdatedBy(UserInterface $user = null)
    {
        $this->updatedBy = $user;

        return $this;
    }

    public function addUpdatedUser(UserInterface $user)
    {
        $this->updatedUsers->add($user);

        return $this;
    }

    public function getUpdatedUsers(): Collection
    {
        return $this->updatedUsers;
    }

    public function setUpdatedUsers(Collection $users)
    {
        $this->updatedUsers = $users;

        return $this;
    }

    public function removeUpdatedUser(UserInterface $user)
    {
        $this->updatedUsers->removeElement($user);

        return $this;
    }
}
