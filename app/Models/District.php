<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class District extends Model
{
    use HasFactory, Notifiable, HasUlids;

    protected $fillable = [
        'province_id',
        'name',
        'en',
        'code',
        'description',
        'is_active',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function tombons()
    {
        return $this->hasMany(Tombon::class);
    }
}
