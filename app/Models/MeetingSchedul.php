<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MeetingSchedul
 * @package App\Models
 * @version May 12, 2022, 11:00 am UTC
 *
 * @property string $meetingagenda
 * @property string $date
 * @property string $timing
 */
class MeetingSchedul extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'meeting_scheduls';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'meetingagenda',
        'date',
        'timing'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'meetingagenda' => 'string',
        'date' => 'string',
        'timing' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
