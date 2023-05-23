<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $table = 'about_us';

    protected $fillable = [
        'main_title',
        'main_description',
        'image',
        'service_icon1',
        'service_description1',
        'service_icon2',
        'service_description2',
        'video_title',
        'video_url',
        'video'
    ];
}
