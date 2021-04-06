<?php

namespace App\Repositories\Cardrequisition;

use App\Models\Cardrequisition\Cardrequisition;
use InfyOm\Generator\Common\BaseRepository;

class CardrequisitionRepository extends BaseRepository
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
        return Cardrequisition::class;
    }
}
