<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commande extends Model
{
    use SoftDeletes;

    protected $table = 'client';
    protected $guarded = ['id'];
    protected $fillable = ['id', 'id_client', 'id_detail_com', 'id_adr', 'quantite', 'status'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function client()
    {
        return $this->belongsTo('App\Models\Clients','id_client','id');
    }

    public function detail()
    {
        return $this->hasMany('App\Models\CommandeDetail','id_commande','id');
    }


}