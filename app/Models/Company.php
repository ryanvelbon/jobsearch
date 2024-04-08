<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'website',
        'email',
        'phone',
        'logo',
        'industry',
        'hq_address',
        'size',
        'founded_year',
        'revenue',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
