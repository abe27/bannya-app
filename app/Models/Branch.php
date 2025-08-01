<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Branch extends Model
{
    use HasFactory, Notifiable, HasUlids;

    protected $fillable = [
        'company_id',
        'name',
        'license_no',
        'address',
        'geography_id',
        'province_id',
        'district_id',
        'tombon_id',
        'zipcode',
        'description',
        'logo',
        'is_active',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function geography()
    {
        return $this->belongsTo(Geography::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function tombon()
    {
        return $this->belongsTo(Tombon::class);
    }
}
