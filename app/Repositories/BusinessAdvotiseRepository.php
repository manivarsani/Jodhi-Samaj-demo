<?php

namespace App\Repositories;

use App\Models\businessAdvotise;
use App\Repositories\BaseRepository;

/**
 * Class businessAdvotiseRepository
 * @package App\Repositories
 * @version May 13, 2022, 4:49 am UTC
*/

class businessAdvotiseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'image',
        'video'
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
        return businessAdvotise::class;
    }
}
