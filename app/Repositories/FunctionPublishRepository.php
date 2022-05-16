<?php

namespace App\Repositories;

use App\Models\FunctionPublish;
use App\Repositories\BaseRepository;

/**
 * Class FunctionPublishRepository
 * @package App\Repositories
 * @version May 12, 2022, 11:46 am UTC
*/

class FunctionPublishRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address',
        'startingdate',
        'endingdate'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FunctionPublish::class;
    }
}
