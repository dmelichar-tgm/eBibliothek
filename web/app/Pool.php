<?php namespace eBibliothek;

use Illuminate\Database\Eloquent\Model;

class Pool extends Model {

    protected $fillable = ['title'];

    public function poolOptions()
    {
        return $this->hasMany('eBibliothek\PoolOptions');
    }

}
