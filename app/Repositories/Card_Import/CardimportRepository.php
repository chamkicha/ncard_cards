<?php

namespace App\Repositories\Card_Import;

use App\Models\Card_Import\Cardimport;
use InfyOm\Generator\Common\BaseRepository;

class CardimportRepository extends BaseRepository
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
        return Cardimport::class;
    }
}
