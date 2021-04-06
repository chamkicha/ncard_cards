<?php

namespace App\Models\Comments;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Comments extends Model
{
    use SoftDeletes;

    public $table = 'commentss';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'comment',
        'user_id',
        'username',
        'cardrequisition_no'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'comment' => 'string',
        'user_id' => 'string',
        'username' => 'string',
        'cardrequisition_no' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
