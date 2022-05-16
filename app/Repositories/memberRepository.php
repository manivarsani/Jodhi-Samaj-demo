<?php

namespace App\Repositories;

use App\Models\member;
use App\Repositories\BaseRepository;

/**
 * Class memberRepository
 * @package App\Repositories
 * @version May 10, 2022, 4:56 am UTC
*/

class memberRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'firstname',
        'lastname',
        'village',
        'mobileno',
        'image'
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
        return member::class;
    }
}
