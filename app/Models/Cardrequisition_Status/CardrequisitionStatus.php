<?php

namespace App\Models\Cardrequisition_Status;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class CardrequisitionStatus extends Model
{
    use SoftDeletes;

    public $table = 'cardrequisitionStatuss';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'cardrequisition__status__name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cardrequisition__status__name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
