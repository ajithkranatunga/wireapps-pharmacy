<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMedicationRequest;
use App\Http\Requests\UpdateMedicationRequest;
use App\Http\Resources\MedicationResource;
use App\Models\Medication;
use Illuminate\Http\Request;

class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MedicationResource::collection(Medication::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicationRequest $request)
    {
        $medication = Medication::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'quantity'=>$request->quantity,
            'expire_date'=>$request->expire_date,
        ]);

        return new MedicationResource($medication);
    }

    /**
     * Display the specified resource.
     */
    public function show(Medication $medication)
    {
        return new MedicationResource($medication);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicationRequest $request, Medication $medication)
    {
        $medication->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'quantity'=>$request->quantity,
            'expire_date'=>$request->expire_date,
        ]);

        return new MedicationResource($medication);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medication $medication)
    {
        return $medication->delete();
    }
}
