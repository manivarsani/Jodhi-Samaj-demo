<?php

namespace App\Repositories;

use App\Models\AnnanceProgram;
use App\Repositories\BaseRepository;

/**
 * Class AnnanceProgramRepository
 * @package App\Repositories
 * @version May 12, 2022, 10:29 am UTC
*/

class AnnanceProgramRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'timing',
        'date'
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
        return AnnanceProgram::class;
    }
}
