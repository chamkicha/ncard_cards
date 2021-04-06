<?php

namespace App\Repositories\Comments;

use App\Models\Comments\Comments;
use InfyOm\Generator\Common\BaseRepository;

class CommentsRepository extends BaseRepository
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
        return Comments::class;
    }
}
