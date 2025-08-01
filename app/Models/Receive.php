<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Receive extends Model
{
    use HasFactory, Notifiable, HasUlids;

    protected $fillable = [
        'company_id',
        'branch_id',
        'user_id',
        'receive_no',
        'receive_date',
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

    public function receiveLine()
    {
        return $this->hasMany(ReceiveLine::class);
    }
}
