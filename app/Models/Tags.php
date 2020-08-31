<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use eloquentFilter\QueryFilter\ModelFilters\Filterable;

class Tags extends Model
{

    use Filterable;

    private static $whiteListFilter = ['*'];

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
    protected $hidden = ['tags'];
    
    public function tags()
    {
        return $this->hasMany('App\Models\Tags', 'post_id', 'id');
    }

}