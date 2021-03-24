<?php

namespace App\Http\Controllers;

use App\Http\Requests\Patient\StoreRequest;
use App\Http\Requests\Patient\UpdateRequest;
use App\Http\Resources\PatientResource;
use App\Models\Patient;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $patients = Patient::all();

        return PatientResource::collection($patients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return PatientResource
     */
    public function store(StoreRequest $request): PatientResource
    {
        $patient = Patient::create($request->validated());

        return new PatientResource($patient);
    }

    /**
     * Display the specified resource.
     *
     * @param Patient $patient
     * @return PatientResource
     */
    public function show(Patient $patient): PatientResource
    {
        return new PatientResource($patient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Patient $patient
     * @return PatientResource
     */
    public function update(UpdateRequest $request, Patient $patient): PatientResource
    {
        $patient = tap($patient)->update($request->validated());

        return new PatientResource($patient);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Patient $patient
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Patient $patient): JsonResponse
    {
        $patient->delete();

        return response()->json('', Response::HTTP_NO_CONTENT);
    }
}
