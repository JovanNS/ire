<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RealEstateEntityType;

class RealEstateEntity extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->belongsTo(RealEstateEntityType::class);
    }
}
