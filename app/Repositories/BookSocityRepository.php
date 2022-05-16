<?php

namespace App\Repositories;

use App\Models\BookSocity;
use App\Repositories\BaseRepository;

/**
 * Class BookSocityRepository
 * @package App\Repositories
 * @version May 10, 2022, 6:49 am UTC
*/

class BookSocityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'familyname',
        'startingdate',
        'endingdate',
        'totaldaybook'
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
        return BookSocity::class;
    }
}
