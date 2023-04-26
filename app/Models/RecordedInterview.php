<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class RecordedInterview extends Model
{
    use UUID, HasFactory;

    protected $table = "recorded_interview";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id', 'user_id', 
        'client', 'job_post', 'link',
        'created_by', 'updated_by'
    ];
}
