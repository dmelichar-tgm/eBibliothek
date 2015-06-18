<?php namespace eBibliothek;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	protected $fillable = [
		'user_id',
		'product_id',
		'text'
	];

}
