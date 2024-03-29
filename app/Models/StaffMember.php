<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffMember extends Model
{
    use HasFactory;

    protected $table = 'staff_members';

    protected $fillable = [
        'title',
        'position',
        'graphic'
    ];
}
