<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quote extends Model
{
    use HasFactory;

    protected $table = 'quotes';

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'service_id',
        'status',
    ];

    public function services (){
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
