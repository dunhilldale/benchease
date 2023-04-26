<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class WorkEnvironment extends Model
{
    use UUID, HasFactory;

    protected $table = "work_environment";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id', 'user_id', 
        'name', 
        'created_by', 'updated_by',
    ];
}
