<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageMetadata extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::saved(function ($metadata) {
            cache()->forget("page_metadata_{$metadata->page_name}");
        });

        static::deleted(function ($metadata) {
            cache()->forget("page_metadata_{$metadata->page_name}");
        });
    }
    protected $table = 'page_metadata';

    protected $fillable = [
        'page_name', 'title', 'meta_title', 'meta_description', 'meta_keywords',
        'og_locale', 'og_type', 'og_title', 'og_description', 'og_keywords', 
        'og_url', 'og_site_name'
    ];
    
}
