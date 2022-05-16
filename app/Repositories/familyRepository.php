<?php

namespace App\Repositories;

use App\Models\family;
use App\Repositories\BaseRepository;

/**
 * Class familyRepository
 * @package App\Repositories
 * @version May 9, 2022, 11:27 am UTC
*/

class familyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sarname'
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
        return family::class;
    }
}
