<?php
/**
 * Created by PhpStorm.
 * User: Daniel kocsi
 */
use Bican\Roles\Contracts\HasRoleAndPermissionContract;
use Bican\Roles\Traits\HasRoleAndPermission;

/**
 * Class User
 * creates namespaces, instead of "requiering" in every file
 */
class User extends Model implements AuthenticatableContract, CanResetPasswordContract, HasRoleAndPermissionContract
{

    use Authenticatable, CanResetPassword, HasRoleAndPermission;
}
?>
