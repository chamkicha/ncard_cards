<?php

namespace App\Repositories\Vendorstatus;

use App\Models\Vendorstatus\VendorStatus;
use InfyOm\Generator\Common\BaseRepository;

class VendorStatusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return VendorStatus::class;
    }
}
