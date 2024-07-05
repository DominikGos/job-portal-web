<?php

namespace App\Models\JobOffer;

use App\Enums\JobOffer\JobLevels;
use App\Enums\JobOffer\WorkSchedules;
use App\Enums\JobOffer\WorkTypes;
use App\Models\Skill;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'valid_until',
        'required_level',
        'work_type',
        'work_schedule',
    ];

    protected $casts = [
        'required_level' => JobLevels::class,
        'work_type' => WorkTypes::class,
        'work_schedule' => WorkSchedules::class,
    ];

    public function salaries(): HasMany {
        return $this->hasMany(Salary::class);
    }

    public function skills(): BelongsToMany {
        return $this->belongsToMany(Skill::class, 'job_offer_skills');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function benefits(): HasMany {
        return $this->hasMany(Benefit::class);
    }
    
    public function requirements(): HasMany {
        return $this->hasMany(Requirement::class);
    }

    public function responsibilities(): HasMany {
        return $this->hasMany(Responsibility::class);
    }
}
