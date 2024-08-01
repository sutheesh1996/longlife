<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile_number',
        'date_of_birth',
        'gender',
        'height',
        'weight',
        'device_id',
        'payment_status',
        'subscription_period',
        'amount',
        'payment_date',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isSubscriptionExpired()
{
    if ($this->payment_status == 1) {
        // Calculate the subscription end date with the grace period
        $subscriptionEndDate = Carbon::parse($this->payment_date)->addMonths($this->subscription_period)->addMonth(1); // 1 month grace period

        if (Carbon::now()->greaterThanOrEqualTo($subscriptionEndDate)) {
            // If current date is past the grace period, set the user as inactive
            $this->payment_status = 0;
            $this->save();

            return true;
        }
    }
    return false;
}

}
