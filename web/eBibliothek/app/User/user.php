<?php

use Bican\Roles\Contracts\HasRoleAndPermissionContract;
use Bican\Roles\Traits\HasRoleAndPermission;

/**
 * Class User
 * @Author Daniel Hammerschmidt
 * Erstellt namespaces für den User
 */
class User extends Model implements AuthenticatableContract, CanResetPasswordContract, HasRoleAndPermissionContract
{

    use Authenticatable, CanResetPassword, HasRoleAndPermission;
}
?>