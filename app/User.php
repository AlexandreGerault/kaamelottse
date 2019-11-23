<?php

namespace App;

use App\Models\Message;
use App\Models\Order;
use App\Models\Permission;
use App\Models\Role;
use Eloquent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $role
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereRole($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Collection|Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection|Role[] $roles
 * @property-read int|null $roles_count
 * @method static Builder|User noPendingOrder()
 * @property-read Collection|Order[] $orders
 * @property-read int|null $orders_count
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id', 'id');
    }

    /**
     * @param String $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        return $this->permissions()->named($permission)->exists()
            || $this->roles()
                ->with('permissions')
                ->get()
                ->reject(function ($role) use ($permission) {
                    return ! $role->permissions()->named($permission)->exists();
                })->count() > 0;
    }

    public function hasRole($rolename)
    {
        return $this->roles()->get()->reject(function ($role) use ($rolename) {
            return $role->name != $rolename;
        })->count() > 0;
    }

    public function scopeNoPendingOrder(Builder $query)
    {
        return $query->whereDoesntHave('orders', function (Builder $query) {
            return $query->whereIn('status', [config('ordering.status.NOT_COMPLETED'), config('ordering.status.PENDING'), config('ordering.status.IN_DELIVERY')]);
        });
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'author_id');
    }

    public function totalPoints()
    {
        $points = 0;

        $this->orders()->each(function (Order $order) use (&$points) {
            if ($order->status == config('ordering.status.DELIVERED')) {
                $points += $order->total_points;
            }
        });

        return $points;
    }
}
