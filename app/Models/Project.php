<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [] ;

    use HasFactory;
    function category(){
      return $this->belongsTo(Category::class);
    }
}
