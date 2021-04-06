<?php

namespace App\Models\Vendor;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Vendor extends Model
{
    use SoftDeletes;

    public $table = 'vendors';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'vendor_name',
        'vendor_id',
        'cards_assigned',
        'vendor_status',
        'vendor_description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'vendor_name' => 'string',
        'vendor_id' => 'string',
        'cards_assigned' => 'string',
        'vendor_description' => 'string',
        'vendor_status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
