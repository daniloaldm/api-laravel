<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    public $timestamps = false;
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tag', 'post_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['id', 'post_id'];
    
}