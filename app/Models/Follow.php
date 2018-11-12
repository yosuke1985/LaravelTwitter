<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model {

    protected $table = 'follows';


    protected $fillable = [];

//    protected $hidden = ['created_at'];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships

}