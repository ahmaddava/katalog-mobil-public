<?php

namespace App\Models;

// 1. TAMBAHKAN DUA 'USE' STATEMENT INI
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// 2. TAMBAHKAN 'implements FilamentUser'
class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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

    /**
     * 3. TAMBAHKAN METHOD INI (WAJIB DARI FILAMENT)
     * Method ini menentukan apakah seorang user boleh mengakses panel admin.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        // Untuk saat ini, kita izinkan semua user bisa mengakses halaman login.
        // Anda bisa menambahkan logika di sini nanti, misalnya:
        // return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();
        return true;
    }
}
