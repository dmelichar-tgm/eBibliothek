<?php
/**
 * Created by PhpStorm.
 * User: Daniel kocsi
 */

use Bican\Roles\Models\Role;
use App\User;

public class berVer(){

    $rolea = Role::create([
        'name' => 'Admin',
        'slug' => 'admin',
        'description' => '' // optional
    ]);

    $rolem = Role::create([
        'name' => 'Moderator',
        'slug' => 'mod',
        'description' => '' // optional
    ]);

    $roles = Role::create([
        'name' => 'Standart',
        'slug' => 'stand',
        'description' => '' // optional
    ]);

    $user = User::find($id)->attachRole($role);

    public function check()
    {
        if ($user->is('admin')) // you can pass an id or slug
        {
            return 'admin';
        } else
        if ($user->is('mod')) // you can pass an id or slug
        {
            return 'moderator';
        } else
        if ($user->is('stand')) // you can pass an id or slug
        {
            return 'standart';
        }
    }
    }