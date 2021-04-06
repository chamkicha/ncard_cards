<?php

namespace App\Repositories\Cardrequisition_Status;

use App\Models\Cardrequisition_Status\CardrequisitionStatus;
use InfyOm\Generator\Common\BaseRepository;

class CardrequisitionStatusRepository extends BaseRepository
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
        return CardrequisitionStatus::class;
    }
}
