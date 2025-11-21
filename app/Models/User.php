<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Lembaga;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject; // this sould be imported


class User extends Authenticatable implements JWTSubject
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'email',
    'username',
    'password',
    'role',
    'lembaga_id',
    'lembaga_induk_id',
    'lembaga_unit_id',
    'bidang_id',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
  ];

  public static function boot(): void
  {
    parent::boot();

    static::creating(static function ($model) {
      if (Auth::user()) {
        $model->created_by = Auth::user()->id;
      }
    });
  }

  public function lembaga(): BelongsTo
  {
    return $this->belongsTo(Lembaga::class, 'lembaga_id');
  }

  public function lembaga_unit(): BelongsTo
  {
    return $this->belongsTo(Lembaga::class, 'lembaga_unit_id');
  }

  public function lembaga_induk_unit(): BelongsTo
  {
    return $this->belongsTo(Lembaga::class, 'lembaga_induk_id');
  }

  public function bidang(): BelongsTo
  {
    return $this->belongsTo(Bidang::class, 'bidang_id');
  }

  public function user_inputs(): HasMany
  {
    return $this->HasMany(UsersInput::class, 'user_id');
  }

  public function rencanaAksis(): HasMany
  {
    return $this->hasMany(RencanaAksi::class, 'created_by');
  }

  public function news()
  {
    return $this->belongsTo(News::class);
  }

  public static function isOperator(): bool
  {
    return \auth()->user()->role === 'operator';
  }
  public static function isPic(): bool
  {
    return \auth()->user()->role === 'pic_direktorat';
  }
  public static function isSuperAdmin(): bool
  {
    return \auth()->user()->role === 'superadmin';
  }

  public function hasAccess(array $roles)
  {
    return in_array($this->role, $roles);
  }

  public function getJWTIdentifier()
  {
    return $this->getKey();
  }

  public function getJWTCustomClaims()
  {
    return [
      'email' => $this->email,
      'name' => $this->name
    ];
  }
}
