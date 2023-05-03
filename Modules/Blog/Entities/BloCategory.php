<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BloCategory extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'icon'];

    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\BloCategoryFactory::new();
    }
}
