<?php

namespace App\Repositories\Vendor;

use App\Models\Vendor\Vendor;
use InfyOm\Generator\Common\BaseRepository;

class VendorRepository extends BaseRepository
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
        return Vendor::class;
    }
}
