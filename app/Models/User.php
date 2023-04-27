<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Traits\UUID;

class User extends Authenticatable
{
    use UUID, HasApiTokens, HasFactory, Notifiable;

    public final const TYPE_ADMIN = "admin";
    public final const TYPE_HR = "hr";
    public final const TYPE_EMPLOYEE = "employee";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'employee_id', 'first_name', 'middle_name',
        'last_name', 'type', 'email', 'password',
        'phone_1', 'phone_2', 'address', 'website',
        'is_new', 'created_by', 'updated_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'string',
        'employee_id' => 'string',
        'email_verified_at' => 'datetime',
    ];

    public function get_users(?string $type = null, ?bool $status = null)
    {
        return $this->orderBy('last_name', 'asc')
                    ->where('type', $type)
                    ->where('status', $status)
                    ->get();
    }
}
