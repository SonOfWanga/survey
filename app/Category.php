<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'title','description','organization_id','user_id', 'published_state', 'category_type', 'category_code' ];

}
