<?php declare(strict_types=1);

namespace Caldera\SimpleAuditBundle\Traits;

trait SimpleAuditTrait
{
    use DateTimeAuditTrait;
    use UserAuditTrait {
        UserAuditTrait::__construct as userConstruct;
    }

    public function __construct()
    {
        $this->userConstruct();
    }
}
