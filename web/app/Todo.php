<?php namespace eBibliothek;

use Illuminate\Database\Eloquent\Model;
use eBibliothek\User;


class Todo extends Model {

    protected $fillable = ['title','isDone','user_id'];

    public function user(){

        return $this->belongsTo('eBibliothek\User');

    }

}
