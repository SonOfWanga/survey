<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'Category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'title','description','organization_id','user_id' ];

}
