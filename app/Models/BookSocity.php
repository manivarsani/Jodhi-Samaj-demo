<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class BookSocity
 * @package App\Models
 * @version May 10, 2022, 6:49 am UTC
 *
 * @property string $familyname
 * @property string $startingdate
 * @property string $endingdate
 * @property string $totaldaybook
 */
class BookSocity extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'book_socities';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'familyname',
        'startingdate',
        'function',
        'endingdate',
        'totaldaybook',
        'dish',
        'boull',
        'glass',
        'spun'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'familyname' => 'string',
        'startingdate' => 'string',
        'endingdate' => 'string',
        'totaldaybook' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'familyname' => 'required',
        'startingdate' => 'required',
        'endingdate' => 'required',
    ];

    
}
