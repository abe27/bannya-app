<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory, Notifiable, HasUlids;

    protected $fillable = [
        'company_id',
        'branch_id',
        'user_id',
        'coupon_id',
        'order_status_id',
        'order_no',
        'order_date',
        'delivery_date',
        'description',
        'is_active',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }
    public function orderLine()
    {
        return $this->hasMany(OrderLine::class);
    }
}
