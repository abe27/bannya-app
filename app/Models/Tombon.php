<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Tombon extends Model
{
    use HasFactory, Notifiable, HasUlids;

    protected $fillable = [
        'district_id',
        'name',
        'en',
        'code',
        'zipcode',
        'description',
        'is_active',
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
