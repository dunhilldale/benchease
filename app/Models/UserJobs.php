<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class UserJobs extends Model
{
    use UUID, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id', 'user_id', 
        'company', 'title', 'description', 
        'start_date', 'end_date', 
        'created_by', 'updated_by'
    ];
}
