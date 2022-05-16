<?php

namespace App\Repositories;

use App\Models\Dashbord;
use App\Repositories\BaseRepository;

/**
 * Class DashbordRepository
 * @package App\Repositories
 * @version May 13, 2022, 11:01 am UTC
*/

class DashbordRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return Dashbord::class;
    }
}
