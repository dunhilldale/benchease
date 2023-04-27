<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class RecordedInterview extends Model
{
    use UUID, HasFactory;
    protected $keyType = 'string';
    protected $table = "recorded_interview";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id', 
        'client', 'job_post', 'link',
        'created_by', 'updated_by'
    ];

	// ================================= Relation =====================================

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id', 'id', );
    }

    public function createdBy()
    {
    	return $this->belongsTo(User::class, 'created_by', 'id', );
    }

    public function updatedBy()
    {
    	return $this->belongsTo(User::class, 'updated_by', 'id');
    }

}
