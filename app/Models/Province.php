<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Province extends Model
{
    use HasFactory, Notifiable, HasUlids;

    protected $fillable = [
        'geography_id',
        'name',
        'en',
        'code',
        'description',
        'is_active',
    ];

    public function geography()
    {
        return $this->belongsTo(Geography::class);
    }

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
