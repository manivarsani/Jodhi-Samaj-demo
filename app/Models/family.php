<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class family
 * @package App\Models
 * @version May 9, 2022, 11:27 am UTC
 *
 * @property string $sarname
 */
class family extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'families';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'sarname'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'sarname' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sarname' => 'required'
    ];

    
}
