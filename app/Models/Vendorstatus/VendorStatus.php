<?php

namespace App\Models\Vendorstatus;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class VendorStatus extends Model
{
    use SoftDeletes;

    public $table = 'vendorStatuss';
    

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
        
    ];
}
