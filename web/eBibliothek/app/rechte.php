<?php

	use Bican\Roles\Models\Permission;
	use Bican\Roles\Models\Role;
	/**
	* Class Permissions
	* @Author Daniel Hammerschmidt
	* Erstellt Permissions(Erlaubnisse?) für User-Rollen
	*/
	public class Permissions{
    /**
     * creating the permissions for the admin user here
     * @return msg
     */
    public function admin(){
		$permissionA = Permission::create([
		'name' => 'administrate',
		'slug' => 'everything',
		'description' => 'can administrate everything' // optional
		]);
		//Nimmt sich die Rolle Admin und sagt ihm dass er die vorher definierten Berechtigungen hat.
		Role::find('admin')->attachPermission($permissionA);

		if ($user->can('everything') {// you can pass an id or slug
			return 'he has permission to do everything!';
		}
	}
    /**
     * creating the permissions for the admin
     * @return msg
     */
    public function administrator(){
		//Creates permissions so a user can be deleted
		$permissiondel = Permission::create([
        'name' => 'Delete user',
        'slug' => 'delete.user',
        'description' => 'Indicates a user can be deleted'    
		]);
		//Creates permissions so a user can be edited
        $permissionedit = Permission::create([
            'name' => 'edit user',
            'slug' => 'edit.user',
            'description' => 'Indicates a user can be edited' 
        ]);
		//Creates permmision so a user can be blocked
        $permissionblock = Permission::create([
            'name' => 'block user',
            'slug' => 'block.user',
            'description' => 'Indicates a user can be blocked'
        ]);
        //Gives the admin role the created permissions.
		Role::find('admin')->attachPermission($permissiondel,$permissionedit, $permissionblock);

		//Test
		if ($user->can('delete.user') 
		{
			return 'He can delete people';
		}
	}

		/**
		 * Checking if an admin is allowed to edit a user
		 */
		public function entityCheck(){
			$user1->attachPermission([
				'slug' => 'edit',
				'name' => 'Edit user',
				'model' => 'App\User'
			]);

			$user2 = \App\User::find(1);
			//Checking if the user is allowed to edit another user
			if ($user1->allowed('edit', $user2))
			{
				//Saving the changed user.
				$user2->save();
			}
}