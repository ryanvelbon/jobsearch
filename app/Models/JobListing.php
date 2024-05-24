<?php

namespace App\Models;

use App\Enums\ListingStatus;
use App\Enums\WorkType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;

class JobListing extends Model
{
    use HasFactory, HasTags, SoftDeletes;

    protected $fillable = [
        'company_id',
        'title',
        'description',
        'work_type',
        'salary',
        'min_salary',
        'max_salary',
        'closing_date',
        'status',
        'published_at',
        'expired_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'expired_at' => 'datetime',
        'work_type' => WorkType::class,
        'status' => ListingStatus::class,
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function scopePublished($query)
    {
        return $query->where('status', ListingStatus::Published);
    }

    public static function search($keyword)
    {
        return static::query()->where(function ($query) use ($keyword) {
            $query->where('title', 'LIKE', '%' . $keyword . '%');
        });
    }
}
