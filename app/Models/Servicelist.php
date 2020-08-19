<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Servicelist extends Model
{
    protected $table = 'servicelists';
    protected $fillable = ['serv_cate_id', 'title', 'description', 'price', 'duration'];

    public function categories()
    {
        return $this->belongsTo(Servicecategory::class,'serv_cate_id', 'id');
    }
}
