<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model {

    protected $table = 'tweets';


    protected $fillable = [];

//    protected $hidden = ['created_at'];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships

}