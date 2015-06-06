	<?php

	use Bican\Roles\Models\Role;
	use App\User;
	/**
	* Class edit
	* @Author Daniel Hammerschmidt
	* Erstellt Rollen für User
	*/
	public class Edit(){
		//Creates a role for an administrator
		$admin = Role::create([
			'name' => 'Admin',
			'slug' => 'admin',
			'description' => 'This indicates that the user is an admin' 
		]);
		//Creates a role for a moderator
		$mod = Role::create([
			'name' => 'Mod',
			'slug' => 'mod',
			'description' => 'This indicates that the user is a moderator' 
			]);
		//Creates a role for a normal user	
		$normal = Role::create([
			'name' => 'Normal',
			'slug' => 'normal',
			'description' => 'This indicates that the user has no special rights' 
			]);
		//Creates a role for a blocked user
		$blocked = Role::create([
			'name' => 'Blocked',
			'slug' => 'blocked',
			'description' => 'This indicates that the user is blocked' 
			]);
		//Creates a role for a deleted user
		$deleted = Role::create([
			'name' => 'Deleted',
			'slug' => 'deleted',
			'description' => 'This indicates that the user is deleted'
			]);
			
		
		$user1 = User::find($id)->attachRole($admin);
		$user2 = User::find($id)->attachRole($mod);
		$user3 = User::find($id)->attachRole($normal);
		
		
		public function change($admin,$mod,$normal,$blocked,$deleted,$user1,$user2)
		{
			if($user1->is('admin')) { //der Name und der Slug können übergeben werden
				//Hier gehört noch ein weg hin den User abzufragen welche Rolle er vergeben will. Testzweck Normal erstmal.
				$user2 = User::find($id)->attachRole($normal);
				//Hier könnte man den User auch sperren, jedoch muss die Rolle beim Login überprüft werden.
			} else {
				die("Sie haben keine Berechtigung, den User zu ändern!\n");
			}
			// weitere Überprüfungen werden nicht gebraucht weil sobald man kein Admin ist, keinen Zugriff haben sollte.
		}
		public function check($user1){
			if($user->is('blocked')){ //Prüft ob ein User gesperrt ist
				die("Sie sind gesperrt!\n");
			}else {
				if($user->is('deleted')){ //Prüft ob ein User gelöscht gehört.
					$user->delete();
				}
			}
		}
	}
				
			
				
				