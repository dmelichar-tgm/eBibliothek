<?php namespace eBibliothek;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {

	protected $fillable = [
		'user_id',
		'name'
	];

}
