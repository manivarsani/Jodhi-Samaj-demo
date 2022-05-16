<?php

namespace App\Repositories;

use App\Models\functionAdd;
use App\Repositories\BaseRepository;

/**
 * Class functionAddRepository
 * @package App\Repositories
 * @version May 12, 2022, 6:19 am UTC
*/

class functionAddRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return functionAdd::class;
    }
}
