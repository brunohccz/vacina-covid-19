<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vaccinate\StoreRequest;
use App\Http\Resources\VaccinateResource;
use App\Models\Vaccinate;
use App\Vaccinate\VaccinateService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class VaccinateController extends Controller
{
    /** @var VaccinateService */
    protected VaccinateService $service;

    /**
     * VaccinateController constructor.
     * @param VaccinateService $service
     */
    public function __construct(VaccinateService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $vaccinates = Vaccinate::all();

        return VaccinateResource::collection($vaccinates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return VaccinateResource
     */
    public function store(StoreRequest $request): VaccinateResource
    {
        $vaccinate = $this->service->vaccinate(
            $request->patient_id, $request->vaccine_id
        );

        return new VaccinateResource($vaccinate);
    }
}
