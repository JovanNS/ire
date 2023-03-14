<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\RealEstateEntity;
use App\Http\Resources\V1\RealEstateEntity\RealEstateEntity as RealEstateEntityResource;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Requests\V1\RealEstateEntity\UpdateRealEstateEntity;
use App\Http\Requests\V1\RealEstateEntity\CreateRealEstateEntity;
use Spatie\QueryBuilder\AllowedFilter;

class RealEstateEntityController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entities = QueryBuilder::for(RealEstateEntity::with('type'))
                    ->allowedFilters([
                        'address', 
                        AllowedFilter::exact('size'),
                        AllowedFilter::exact('number_of_rooms'),
                        AllowedFilter::scope('price_between'),
                        AllowedFilter::scope('radius_seach_haversine')
                    ])
                    ->paginate();

        return response()->json(RealEstateEntityResource::collection($entities)->response()->getData(true));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRealEstateEntity $request)
    {
        $realEstateEntity = RealEstateEntity::create($request->validated());

        return response()->json(new RealEstateEntityResource($realEstateEntity), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(RealEstateEntity $realEstateEntity)
    {
        return response()->json(new RealEstateEntityResource($realEstateEntity));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRealEstateEntity $request, RealEstateEntity $realEstateEntity)
    {
        $realEstateEntity->update($request->validated());

        return response()->json(new RealEstateEntityResource($realEstateEntity));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RealEstateEntity $realEstateEntity)
    {
        $realEstateEntity->delete();

        return response()->json([], 204);
    }
}
