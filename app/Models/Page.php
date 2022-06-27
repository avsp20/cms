<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $parentColumn = 'parent_id';

    protected $fillable = [
        'parent_id', 'slug', 'title', 'content',
    ];

    public function children()
    {
        return $this->belongsTo(Page::class, $this->parentColumn);
    }

}
