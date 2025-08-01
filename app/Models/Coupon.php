<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Coupon extends Model
{
    use HasFactory, Notifiable, HasUlids;

    protected $fillable = [
        'company_id',
        'branch_id',
        'name',
        'code',
        'discount',
        'start_date',
        'end_date',
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
}
