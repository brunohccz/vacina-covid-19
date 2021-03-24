<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vaccine\StoreRequest;
use App\Http\Requests\Vaccine\UpdateRequest;
use App\Http\Resources\VaccineResource;
use App\Models\Vaccine;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class VaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $vaccines = Vaccine::all();

        return VaccineResource::collection($vaccines);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return VaccineResource
     */
    public function store(StoreRequest $request): VaccineResource
    {
        $vaccine = Vaccine::create($request->validated());

        return new VaccineResource($vaccine);
    }

    /**
     * Display the specified resource.
     *
     * @param Vaccine $vaccine
     * @return VaccineResource
     */
    public function show(Vaccine $vaccine): VaccineResource
    {
        return new VaccineResource($vaccine);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Vaccine $vaccine
     * @return VaccineResource
     */
    public function update(UpdateRequest $request, Vaccine $vaccine): VaccineResource
    {
        $vaccine = tap($vaccine)->update($request->validated());

        return new VaccineResource($vaccine);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Vaccine $vaccine
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Vaccine $vaccine): JsonResponse
    {
        $vaccine->delete();

        return response()->json('', Response::HTTP_NO_CONTENT);
    }
}
