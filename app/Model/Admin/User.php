<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
   
    

     
    protected $table = 'user';

    protected $primarykey = 'id';

    
    public $timestamps = false;

	protected $guarded = [];


    
    public function infos()
    {
        return $this->hasOne('App\Model\Admin\Userinfo','uid','id');
    }


    public function article(){
        return $this->hasMany('App\Model\Article','uid','id');
    }


}
