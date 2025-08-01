<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory, Notifiable, HasUlids;
    protected $fillable = [
        'company_id',
        'branch_id',
        'category_id',
        'product_group_id',
        'unit_id',
        'name',
        'no',
        'common_name',
        'price',
        'description',
        'logo',
        'by_company',
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productGroup()
    {
        return $this->belongsTo(ProductGroup::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function byCompany()
    {
        return $this->belongsTo(Company::class, 'by_company', 'id');
    }
}
