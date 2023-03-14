<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RealEstateEntityType;
use Illuminate\Database\Eloquent\Casts\Attribute;

class RealEstateEntity extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->belongsTo(RealEstateEntityType::class);
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => number_format($value / 100, 2),
            set: fn (string $value) => $value * 100,
        );
    }
}
