<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Villes extends Model
{
    use CrudTrait;
    use \Venturecraft\Revisionable\RevisionableTrait;
    public function identifiableName()
        {
            return $this->name;
        }
    
        public static function boot()
        {
            parent::boot();
        }
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'villes';
    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $keyType = "string";
    public $timestamps = false;
    protected $guarded = ['code'];
    protected $fillable = ["code", "nom"];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
