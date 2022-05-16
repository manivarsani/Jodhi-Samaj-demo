<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MarraigeAnnounce
 * @package App\Models
 * @version May 12, 2022, 11:25 am UTC
 *
 * @property string $name
 * @property string $startingdate
 * @property string $endingdate
 * @property string $timing
 */
class MarraigeAnnounce extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'marraige_announces';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'girlsname',
        'boysname',
        'startingdate',
        'endingdate',
        'timing'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'girlsname' => 'string',
        'boysname' => 'string',
        'startingdate' => 'string',
        'endingdate' => 'string',
        'timing' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'girlsname' => 'required',
        'boysname' => 'required'

    ];

    
}
