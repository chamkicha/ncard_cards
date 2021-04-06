<?php

namespace App\Models\Card_Import;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Cardimport extends Model
{
    use SoftDeletes;

    public $table = 'cardimports';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'card_number',
        'card_u_i_d',
        'order_number',
        'batch_no',
        'status',
        'receive_date',
        'import_comment',
        'assigned_refNo',
        'received_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'card_number' => 'string',
        'card_u_i_d' => 'string',
        'order_number' => 'string',
        'batch_no' => 'string',
        'status' => 'string',
        'assigned_refNo' => 'string',
        'received_by' => 'string',
        'import_comment' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        //'card_number' => 'required',
        //'card_u_i_d' => 'required',
        //'order_number' => 'required',
        //'batch_no' => 'required',
        //'status' => 'required',
        //'receive_date' => 'date',
        //'import_comment' => 'required'
    ];
}
