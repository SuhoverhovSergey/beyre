<?php

namespace Modules\Api\Http\Controllers;

use App\Pet;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Api\Http\Requests\PetRequest;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $user = Auth::user();

        $pets = Pet::where('user_id', $user->id)->get(['id', 'name', 'species']);

        return response()->json($pets->toArray());
    }

    /**
     * Show the form for creating a new resource.
     * @param PetRequest $request
     * @return Response
     */
    public function create(PetRequest $request)
    {
        $user = Auth::user();
        $petData = $request->all();

        $pet = new Pet($petData);
        $pet->user_id = $user->id;

        $pet->save();

        return response()->json($pet->toArray());
    }
}
