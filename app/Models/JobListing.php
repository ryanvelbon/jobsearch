<?php

namespace App\Models;

use App\Enums\ListingStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobListing extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        // 'company_id',
        'title',
        'description',
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
}
