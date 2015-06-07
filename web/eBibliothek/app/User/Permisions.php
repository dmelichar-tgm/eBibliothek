<?php
/**
 * Created by PhpStorm.
 * User: Daniel kocsi
 */
use Bican\Roles\Models\Permission;
use Bican\Roles\Models\Role;
public class Permissions{
    /**
     * creating the permissions for the admin user here
     * and also adding the permission to a user role
     * @return msg
     */
    public function admin(){
$permissionA = Permission::create([
    'name' => 'god mod',
    'slug' => 'edit.everything',
    'description' => '' // optional
]);

Role::find('admin')->attachPermission($permissionA);

//$user->attachPermission($anotherPermission);
//testing
if ($user->can('edit.everything') // you can pass an id or slug
{
    return 'he has permission!';
}
}
    /**
     * creating the permissions for the moderator user here
     * and also adding the permission to a user role
     * @return msg
     */
    public function moderator(){
    $permissiondel = Permission::create([
        'name' => 'Delete book',
        'slug' => 'delete.book',
        'description' => '' // optional
    ]);
        $permissioneditMet = Permission::create([
            'name' => 'edit metadata',
            'slug' => 'edit.metadata',
            'description' => '' // optional
        ]);
        $permissioneditCont = Permission::create([
            'name' => 'edit content',
            'slug' => 'edit.content',
            'description' => '' // optional
        ]);
        $permissioneditdelComm = Permission::create([
            'name' => 'delete comment',
            'slug' => 'delete.comment',
            'description' => '' // optional
        ]);

Role::find('mod')->attachPermission($permissiondel,$permissioneditMet, $permissioneditCont,$permissioneditdelComm);

//$user->attachPermission($anotherPermission);
//testing
if ($user->can('delete.book') // you can pass an id or slug
{
    return 'he has permission!';
}
    }

    /**
     * creating the permissions for the standart user here
     * and also adding the permission to a user role
     * @return msg
     */
    public function standart(){
$permissionS = Permission::create([
    'name' => 'standart functions',
    'slug' => 'standart.functions',
    'description' => '' // optional
]);

Role::find('stand')->attachPermission($permissionS);

//$user->attachPermission($anotherPermission);
//testing
if ($user->can('standart.function') // you can pass an id or slug
{
    return 'he has permission!';
}
    }

}

/**
 * Checking if user is allowed to for example edit a book
 * if he is, he can do so and save the edited book.
 */
public function entityCheck(){
    $user->attachPermission([
        'slug' => 'edit',
        'name' => 'Edit book',
        'model' => 'App\Books'
    ]);

    $book = \App\Book::find(1);

    if ($user->allowed('edit', $book)) // $user->allowedEdit($article)
    {
        $book->save();
    }
}