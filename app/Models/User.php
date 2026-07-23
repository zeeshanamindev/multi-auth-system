<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Check permission
    public function hasPermission(string $permissionSlug): bool
    {
        $rolePermissions = RolePermission::where('role', $this->role)
            ->with('permission')
            ->get();
            
        return $rolePermissions->contains('permission.slug', $permissionSlug);
    }

    // Check role
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    // Check admin
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // Check active
    public function isActive(): bool
    {
        return $this->is_active;
    }
}