<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class member
 * @package App\Models
 * @version May 10, 2022, 4:56 am UTC
 *
 * @property string $firstname
 * @property string $lastname
 * @property string $village
 * @property string $mobileno
 * @property string $image
 */
class member extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'members';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'firstname',
        'lastname',
        'village',
        'mobileno',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'firstname' => 'string',
        'lastname' => 'string',
        'village' => 'string',
        'mobileno' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'firstname' => 'required',
        'lastname' => 'required',
        'village' => 'required',
        'mobileno' => 'required',
        'image' => 'required|file'
    ];

    
}
