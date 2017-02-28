<?php

namespace Modules\Api\Http\Controllers;

use App\Pet;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Api\Http\Requests\PetRequest;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index()
    {
        $pets = Pet::where('user_id', Auth::id())->get(['id', 'name', 'species']);

        return response()->json($pets->toArray());
    }

    /**
     * Show the form for creating a new resource.
     * @param PetRequest $request
     * @return JsonResponse
     */
    public function create(PetRequest $request)
    {
        $pet = new Pet($request->all());
        $pet->user_id = Auth::id();
        $pet->save();

        return response()->json($pet->toArray());
    }

    /**
     * Update the specified resource in storage.
     * @param PetRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(PetRequest $request, $id)
    {
        $response = response()->json();

        try {
            $pet = Pet::where('user_id', Auth::id())->findOrFail($id);
            $pet->fill($request->all());
            $pet->save();

            $response->setData($pet->toArray());
        } catch (\Exception $e) {
            $response->setStatusCode(JsonResponse::HTTP_BAD_REQUEST);
            $response->setData(['message' => $e->getMessage()]);
        }

        return $response;
    }
}
