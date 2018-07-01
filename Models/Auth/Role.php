<?php

namespace Modules\Nintei\Models\Auth;

use Modules\Nintei\Models\Auth\Traits\Attribute\RoleAttribute;
use Modules\Nintei\Models\Auth\Traits\Method\RoleMethod;

/**
 * Class Role.
 */
class Role extends \Spatie\Permission\Models\Role
{
    use RoleAttribute, RoleMethod;
}
