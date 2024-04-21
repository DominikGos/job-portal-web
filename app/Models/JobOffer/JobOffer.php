<?php

namespace App\Models\JobOffer;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'valid_until',
        'required_level',
        'work_type',
        'work_schedule',
        'requirements',
        'responsibilities',
        'benefits',
    ];

    public function salaries(): HasMany {
        return $this->hasMany(Salary::class);
    }

    public function skills(): BelongsToMany {
        return $this->belongsToMany(Skill::class, 'job_offer_skills');
    }
}
