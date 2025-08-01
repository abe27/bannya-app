<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ReceiveLine extends Model
{
    use HasFactory, Notifiable, HasUlids;

    protected $fillable = [
        'receive_id',
        'product_id',
        'unit_id',
        'qty',
        'price',
        'is_active',
    ];

    public function receive()
    {
        return $this->belongsTo(Receive::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
