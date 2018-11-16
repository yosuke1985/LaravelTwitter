<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Follow extends Model {

    use SoftDeletes;

    protected $table = 'follows';
    protected $dates = ['deleted_at'];
    protected $fillable = [];

//    protected $hidden = ['created_at'];


    public static $rules = [
        // Validation rules
    ];

    // Relationships


}