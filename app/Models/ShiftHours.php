<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class ShiftHours extends Model
{
    use UUID, HasFactory;

    protected $table = "shift_hours";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id', 'user_id', 
        'shift_start', 'shift_end',
        'created_by', 'updated_by'
    ];
}
