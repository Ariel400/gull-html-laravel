<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use CrudTrait;
    use \Venturecraft\Revisionable\RevisionableTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'contrat';
    protected $primaryKey = 'code';
    // public $timestamps = false;
    protected $guarded = ['code'];
    protected $fillable = ['code', 'code_materiel', 'actif', 'id_client','date_debut', 'date_fin'];
    // protected $hidden = [];
    // protected $dates = [];
    protected $keyType = 'string';
    public $incrementing = false;

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
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
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function client()
    {
        return $this->belongsTo('App\Models\Clients','id_client','id');
    }
    public function agent()
    {
        return $this->belongsTo('App\User','id_agent','id');
    }

    public function materiel()
    {
        return $this->belongsTo('App\Models\Produits','code_materiel','code');
    }

    public function partenaire()
    {
        return $this->belongsTo('App\Models\Partenaires','id_fournisseur','id');
    }


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
