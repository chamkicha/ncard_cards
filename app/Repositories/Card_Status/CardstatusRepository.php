<?php

namespace App\Repositories\Card_Status;

use App\Models\Card_Status\Cardstatus;
use InfyOm\Generator\Common\BaseRepository;

class CardstatusRepository extends BaseRepository
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
        return Cardstatus::class;
    }
}
