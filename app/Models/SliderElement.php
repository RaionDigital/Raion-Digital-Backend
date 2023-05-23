<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderElement extends Model
{
    use HasFactory;

    protected $table = 'slider_elements';

    protected $fillable = [
        'top_title',
        'main_title',
        'button_text',
        'button_url',
        'image'
    ];
}
