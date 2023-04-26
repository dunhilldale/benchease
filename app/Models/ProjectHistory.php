<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class ProjectHistory extends Model
{
    use UUID, HasFactory;

    protected $table = "project_history";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id', 'user_id', 
        'project_name', 'client_name', 'description', 
        'start_date', 'end_date', 
        'created_by', 'updated_by'
    ];
}
