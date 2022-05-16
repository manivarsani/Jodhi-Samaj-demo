<?php

namespace App\Repositories;

use App\Models\MarraigeAnnounce;
use App\Repositories\BaseRepository;

/**
 * Class MarraigeAnnounceRepository
 * @package App\Repositories
 * @version May 12, 2022, 11:25 am UTC
*/

class MarraigeAnnounceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'startingdate',
        'endingdate',
        'timing'
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
        return MarraigeAnnounce::class;
    }
}
