<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RealEstateEntity;
use App\Http\Resources\V1\RealEstateEntity\RealEstateEntity as RealEstateEntityResource;

class RealEstateEntityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(RealEstateEntityResource::collection(RealEstateEntity::all()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $realEstateEntity = RealEstateEntity::create($request->validated());

        return response()->json(new RealEstateEntityResource($realEstateEntity));
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
    public function update(Request $request, RealEstateEntity $realEstateEntity)
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
    }
}
