<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pays extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    use \Venturecraft\Revisionable\RevisionableTrait;
    public function identifiableName()
        {
            return $this->name;
        }
    
        public static function boot()
        {
            parent::boot();
        }
    protected $table = 'pays';
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
