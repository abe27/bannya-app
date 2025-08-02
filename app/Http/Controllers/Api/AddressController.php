<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use App\Models\Tombon;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function provinces()
    {
        return Province::orderBy('name')->get();
    }

    public function districts(Province $province)
    {
        return $province->districts()->orderBy('name')->get();
    }

    public function tombons(District $district)
    {
        return $district->tombons()->orderBy('name')->get();
    }

    public function tombon(Tombon $tombon)
    {
        return $tombon;
    }
}