<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function prices()
    {
    	return $this->hasMany('App\Price');
    }

    public function likes()
    {
    	return $this->hasMany('App\Like');
    }

    public function delete()
    {
        // delete all related photos 
        $this->prices()->delete();
        $this->likes()->delete();
        // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()
        // delete the user
        return parent::delete();
    }
}
