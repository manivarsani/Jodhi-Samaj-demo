<?php

namespace App\Repositories;

use App\Models\MeetingSchedul;
use App\Repositories\BaseRepository;

/**
 * Class MeetingSchedulRepository
 * @package App\Repositories
 * @version May 12, 2022, 11:00 am UTC
*/

class MeetingSchedulRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'meetingagenda',
        'date',
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
        return MeetingSchedul::class;
    }
}
