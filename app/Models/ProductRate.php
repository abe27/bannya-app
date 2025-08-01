<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ProductRate extends Model
{
    use HasFactory, Notifiable, HasUlids;

    protected $fillable = [
        'user_id',
        'product_id',
        'rate_option_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function rateOption()
    {
        return $this->belongsTo(RateOption::class);
    }
}
