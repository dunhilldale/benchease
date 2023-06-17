<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;
use App\Traits\UUID;

class User extends Authenticatable
{
    use UUID, HasApiTokens, HasFactory, Notifiable;

    public final const TYPE_ADMIN = "admin";
    public final const TYPE_HR = "hr";
    public final const TYPE_EMPLOYEE = "employee";
    protected $keyType = 'string';

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
        'is_new' => 'boolean',
    ];

    // ================================= Relation =====================================

    /**
     * Not a relationship instance
     * @return object
     */
    public function skills(): object
    {
        return DB::table('skills')
            ->join('user_skills', 'user_skills.skill_id', '=', 'skills.id')
            ->join('users', 'users.id', '=', 'user_skills.user_id')
            ->select('skills.title', 'user_skills.category')
            ->where('users.id', $this->id)
            ->get();
    }

    public function userSkills()
    {
        return $this->hasMany(UserSkills::class, 'user_id');
    }

    // ======================== Accessors and Mutators ================================

    protected function firstName(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => strtolower($value),
        );
    }
    protected function middleName(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => ucfirst($value),
            set: fn (?string $value) => strtolower($value),
        );
    }
    protected function lastName(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => strtolower($value),
        );
    }

    // ================================= Methods =====================================

    public static function get(?string $id): ?User
    {
        $user = User::where('id', $id)->firstOrFail();
        return $id ? $user : null;
    }

    public function get_users(?string $type = null, ?bool $status = null)
    {
        return $this->orderBy('last_name', 'asc')
            ->where('type', $type)
            ->where('status', $status)
            ->get();
    }

    public function is_admin(): bool
    {
        return $this->type === self::TYPE_ADMIN;
    }
    public function is_hr(): bool
    {
        return $this->type === self::TYPE_HR;
    }
    public function is_employee(): bool
    {
        return $this->type === self::TYPE_EMPLOYEE;
    }

    public function set_skills(array $skills = [])
    {
    }

    // ================= Befor / After - Active Record Actions ========================

    public static function booted() // or booted()
    {
        parent::boot();

        self::creating(function ($model) {
        });

        self::created(function ($model) {
        });

        self::updating(function ($model) {
        });

        self::updated(function ($model) {
        });

        self::deleting(function ($model) {
        });

        self::deleted(function ($model) {
        });
    }
}
