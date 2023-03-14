<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RealEstateEntityType;
use Illuminate\Database\Eloquent\Casts\Attribute;

class RealEstateEntity extends Model
{
    use HasFactory;

    public function scopePriceBetween($query, $start, $end)
    {
        return $query->whereBetween('price', [$start * 100, $end * 100]);
    }

    public function scopeRadiusSeachHaversine($query, $userLatitude, $userLongitude, $radius)
    {
        $earthRadius = 6371; // Earth's radius in kilometers

        $maxLatitude = $userLatitude + rad2deg($radius / $earthRadius);
        $minLatitude = $userLatitude - rad2deg($radius / $earthRadius);
        $maxLongitude = $userLongitude + rad2deg(asin($radius / ($earthRadius * cos(deg2rad($userLatitude)))));
        $minLongitude = $userLongitude - rad2deg(asin($radius / ($earthRadius * cos(deg2rad($userLatitude)))));

        return $query->whereBetween('latitude', [$minLatitude, $maxLatitude])
        ->whereBetween('longitude', [$minLongitude, $maxLongitude]);
    }

    public function type()
    {
        return $this->belongsTo(RealEstateEntityType::class);
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => $value * 100
        );
    }
}
