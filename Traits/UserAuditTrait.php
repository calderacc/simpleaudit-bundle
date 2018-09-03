<?php declare(strict_types=1);

namespace Caldera\SimpleAuditBundle\Traits;

trait UserAuditTrait
{
    use CreatedByAuditTrait {
        CreatedByAuditTrait::__construct as createdByConstruct;
    }

    use UpdatedByAuditTrait {
        UpdatedByAuditTrait::__construct as updatedByConstruct;
    }

    public function __construct()
    {
        $this->createdByConstruct();
        $this->updatedByConstruct();
    }
}
