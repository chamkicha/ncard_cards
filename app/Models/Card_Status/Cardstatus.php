<?php

namespace App\Models\Card_Status;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Cardstatus extends Model
{
    use SoftDeletes;

    public $table = 'cardstatuss';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'status_name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'status_name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'status_name' => 'required',
        'description' => 'required'
    ];
}
