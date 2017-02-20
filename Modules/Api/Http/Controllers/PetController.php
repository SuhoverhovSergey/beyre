<?php

namespace Modules\Api\Http\Controllers;

use App\Pet;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

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
}
