<?php

namespace App\Models\JobOffer;

use App\Enums\JobLevels;
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
        'requirements',
        'responsibilities',
        'benefits',
    ];

    protected $casts = [
        'required_level' => JobLevels::class,
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
}
