<?php

namespace App\Models;

use App\Enums\AccountType;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Filament\Panel;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements FilamentUser, HasName
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'account_type',
        'username',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'account_type' => AccountType::class,
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return true;

        // return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();
    }

    public function getFilamentName(): string
    {
        return $this->username;
    }
}
