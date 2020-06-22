<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;

    protected $table = 'avis';
	protected $fillable = [
		'id',
		'user_id',
		'jeu_id',
        'created_at',
        'note',
        'avis'
    ];

    public function User()
	{
		return $this->belongsTo(User::class, 'user_id');
	}
}
