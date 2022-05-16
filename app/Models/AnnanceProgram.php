<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class AnnanceProgram
 * @package App\Models
 * @version May 12, 2022, 10:29 am UTC
 *
 * @property string $name
 * @property string $timing
 * @property string $date
 */
class AnnanceProgram extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'annance_programs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'timing',
        'date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'timing' => 'string',
        'date' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
