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
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'passport_number',
        'passport_file',
        'passport_expiry',
        'department_id',
        'induction_program_sheet',
        'introduction_status',
        'introduction_to_director',
        'introduction_to_supervisors',
        'introduction_to_pantry_area',
        'introduction_to_toy_room_work_area',
        'introduction_to_resource_room',
        'introduction_to_training_area',
        "basic_salary",
        "hra",
        "other_allowances",
        "transportation",
        'permanent_telephone_india',
        'permanent_address_india',
        'relative_name_dubai',
        'relative_contact_dubai',
        'relative_address_dubai',
        'friend_name_dubai',
        'friend_contact_dubai',
        'friend_address_dubai',
        'medical_concern',
        'medications',
        'doctor_or_clinic',
        'joining_date',
        'insurance_status',
        'status',
        'visa_status',
        'license_status',
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

    public function emirates(): HasMany
    {
        return $this->hasMany(Emirate::class, "user_id", "id");
    }

    public function degrees(): HasMany
    {
        return $this->hasMany(Degree::class, "user_id", "id");
    }

    public function banks(): HasMany
    {
        return $this->hasMany(Bank::class, "user_id", "id");
    }

    public function references(): HasMany
    {
        return $this->hasMany(Reference::class, "user_id", "id");
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

    public function warningletters(): HasMany
    {
        return $this->hasMany(WarningLetter::class, "user_id", "id");
    }

    public function kpis(): HasMany
    {
        return $this->hasMany(KeyPerformanceIndicator::class, "user_id", "id");
    }

    public function disputes(): HasMany
    {
        return $this->hasMany(DisputeManagement::class, "user_id", "id");
    }

    public function handbooks(): HasMany
    {
        return $this->hasMany(Handbook::class, "user_id", "id");
    }

    public function inductionprograms(): HasOne
    {
        return $this->hasOne(InductionProgram::class, "user_id", "id");
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
