<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class businessAdvotise
 * @package App\Models
 * @version May 13, 2022, 4:49 am UTC
 *
 * @property string $image
 * @property string $video
 */
class businessAdvotise extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'business_advotises';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'image',
        'video'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'image' => 'string',
        'video' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'image' => 'required',
        'video' => 'required|file'
    ];

    
}
