<?php declare(strict_types=1);

namespace Caldera\SimpleAuditBundle\Traits;

trait DateTimeAuditTrait
{
    use CreatedAtAuditTrait, UpdatedAtAuditTrait;
}
