<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class FunctionPublish
 * @package App\Models
 * @version May 12, 2022, 11:46 am UTC
 *
 * @property string $name
 * @property string $address
 * @property string $startingdate
 * @property string $endingdate
 */
class FunctionPublish extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'function_publishes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'address',
        'description',
        'startingdate',
        'endingdate'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'address' => 'string',
        'description' => 'string',
        'startingdate' => 'string',
        'endingdate' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
