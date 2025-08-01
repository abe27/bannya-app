<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use HasFactory, Notifiable, HasUlids;

    protected $fillable = [
        'name',
        'license_no',
        'feature_data_id',
        'professional_license',
        'business_license',
        'operating_license',
        'commercial_registration',
        'national_id_card',
        'other_documents',
        'storefront_photo',
        'address',
        'geography_id',
        'province_id',
        'district_id',
        'tombon_id',
        'zipcode',
        'date_of_received',
        'contact_person',
        'contact_nation_no',
        'contact_email',
        'contact_phone',
        'user_id',
        'is_active',
    ];

    public function featureData()
    {
        return $this->belongsTo(FeatureData::class);
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function receive()
    {
        return $this->hasMany(Receive::class);
    }
}
