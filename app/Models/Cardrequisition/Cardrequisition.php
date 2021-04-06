<?php

namespace App\Models\Cardrequisition;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Cardrequisition extends Model
{
    use SoftDeletes;

    public $table = 'cardrequisitions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'cardrequisition_no',
        'cardrequisition_date',
        'vendor_no',
        'card_quantity',
        'next_handler',
        'cardrequisition_status',
        'cardrequisition_description',
        'assigned_refNo',
        'created_by',
        'next_handler_role_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cardrequisition_no' => 'string',
        'cardrequisition_date' => 'string',
        'vendor_no' => 'string',
        'card_quantity' => 'string',
        'cardrequisition_description' => 'string',
        'next_handler' => 'string',
        'assigned_refNo' => 'string',
        'created_by' => 'string',
        'next_handler_role_id' => 'string',
        'cardrequisition_status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
