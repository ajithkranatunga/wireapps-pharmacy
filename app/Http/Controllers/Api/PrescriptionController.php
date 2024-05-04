<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PrescriptionCollection;
use App\Http\Resources\PrescriptionResource;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->cannot('view prescription')){
            return response([
                'message'=>'Unauthorized action'
            ]);
        }
        //return new PrescriptionCollection(Prescription::all());
        return PrescriptionResource::collection(
            Prescription::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->cannot('create Prescription')){
            return response([
                'message'=>'Unauthorized action'
            ]);
        }
        //TODO: insert prescription
    }

    /**
     * @param Prescription $prescription
     * @return PrescriptionResource
     */
    public function show(Prescription $prescription)
    {
        if (auth()->user()->cannot('create Prescription')){
            return response([
                'message'=>'Unauthorized action'
            ]);
        }
        return new PrescriptionResource($prescription);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (auth()->user()->cannot('update Prescription')){
            return response([
                'message'=>'Unauthorized action'
            ]);
        }
        //TODO: implement function
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prescription $prescription)
    {
        if (auth()->user()->can('delete Prescription')){
            return $prescription->forceDelete();
        } else if (auth()->user()->can('soft delete Prescription')){
            return $prescription->delete();
        } else {
            return response([
                'message'=>'Unauthorized action'
            ]);
        }
    }
}
