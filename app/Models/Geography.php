<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Geography extends Model
{
    use HasFactory, Notifiable, HasUlids;

    protected $fillable = [
        'name',
        'code',
        'description',
        'is_active',
    ];

    public function provinces()
    {
        return $this->hasMany(Province::class);
    }
}
