<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('CommentTableSender');
	}

}

/*class CommentTableSender extends Seeder {

    public function run()
    {
        DB::insert('insert into `comments` (user_id, product_id, text) values (?,?,?)', array(5, 12, 'test'));
    }

}
*/