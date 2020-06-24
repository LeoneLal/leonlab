<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fiche extends Model
{
    public $timestamps = false;

    protected $name = 'fiches';
	protected $fillable = [
		'id',
		'prix_total',
		'facture',
		'user_id',
		'created_at',
    ];
	
	public function Line()
    {
        return $this->hasMany(Ligne::class);
    }
    
}
