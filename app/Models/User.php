<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable implements HasName
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'role_id',
        'staff_id',
        'date_of_birth',
        'password',
        'passport_file',
        'passport_expiry',
        'department_id',
    ];

    public function phonenos(): HasMany
    {
        return $this->hasMany(PhoneNo::class, "user_id", "id");
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, "user_id", "id");
    }

    public function visas(): HasMany
    {
        return $this->hasMany(Visa::class, "user_id", "id");
    }

    public function experienceletters(): HasMany
    {
        return $this->hasMany(ExperienceLetter::class, "user_id", "id");
    }

    public function licences(): HasMany
    {
        return $this->hasMany(Licence::class, "user_id", "id");
    }

    public function medicalRecords(): HasMany
    {
        return $this->hasMany(MedicalRecord::class, "user_id", "id");
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function endservices(): HasMany
    {
        return $this->hasMany(EndService::class, "user_id", "id");
    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => $attributes["first_name"] . ' ' . $attributes["last_name"],
        );
    }

    public function getFilamentName(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
