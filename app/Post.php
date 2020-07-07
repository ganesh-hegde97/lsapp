<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    //Table name
    protected $title = 'posts';
    // Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
