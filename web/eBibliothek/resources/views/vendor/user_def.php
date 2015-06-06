<?php

use Bican\Roles\Contracts\HasRoleAndPermissionContract;
use Bican\Roles\Traits\HasRoleAndPermission;

/**
 * Class User
 * Erstellt namespaces für den User
 */
class User extends Model implements AuthenticatableContract, CanResetPasswordContract, HasRoleAndPermissionContract
{

    use Authenticatable, CanResetPassword, HasRoleAndPermission;
}
?>