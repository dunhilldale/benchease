<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class ShiftDays extends Model
{
    use UUID, HasFactory;

    protected $table = "shift_days";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id', 'user_id', 
        'days', 
        'created_by', 'updated_by'
    ];
}
