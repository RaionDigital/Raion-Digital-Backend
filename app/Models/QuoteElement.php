<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteElement extends Model
{
    use HasFactory;

    protected $table = 'quote_elements';

    protected $fillable = [
        'title',
        'small_description1',
        'small_description2',
        'phone_number'
    ];
}
