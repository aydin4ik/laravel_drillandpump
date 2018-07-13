<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Slide extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['title', 'content'];
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
