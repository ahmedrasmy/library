<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Book extends Model
{
    use HasFactory;
    protected $fillable=[
        'title_en','title_ar','desc_en','desc_ar','img'
    ];
    //book belongsToMany categories
    public function categories()
    {
        return $this-> belongsToMany('App\Models\Category');
    }
}
