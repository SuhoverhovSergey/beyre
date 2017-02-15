<?php

namespace Modules\Api\Http\Controllers;

use DB;
use App\User;
use App\Address;
use App\CreditCard;
use App\Pet;
use Laravel\Passport\ClientRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Api\Http\Requests\AccountRegisterRequest;

class AccountController extends Controller
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * Creating a new account.
     *
     * @param ClientRepository $clients
     * @param AccountRegisterRequest $request
     * @return Response
     */
    public function register(ClientRepository $clients, AccountRegisterRequest $request)
    {
        $responseData = [];

        DB::beginTransaction();

        try {
            $user = new User($request->input('AccountDetails', []));
            $user->password = bcrypt($user->password);
            $user->remember_token = str_random(10);
            if ($avatar = $request->file('Avatar')) {
                $user->avatar_path = $avatar->store('avatars', 'public');
            }

            if ($user->save()) {
                $client = $clients->createPasswordGrantClient($user->id, $user->email, '');
                $responseData = [
                    'client_id' => $client->id,
                    'client_secret' => $client->secret,
                ];

                if ($addressData = $request->input('PersonalInfo')) {
                    $address = new Address($addressData);
                    $address->user_id = $user->id;
                    $address->save();
                }

                if ($creditCardData = $request->input('CreditCard')) {
                    $creditCard = new CreditCard($creditCardData);
                    $creditCard->user_id = $user->id;
                    $creditCard->save();
                }

                foreach ($request->input('Pets', []) as $key => $petData) {
                    $pet = new Pet($petData);
                    $pet->user_id = $user->id;

                    $petAvatarKey = 'PetAvatar' . ($key + 1);
                    if ($petAvatar = $request->file($petAvatarKey)) {
                        $pet->avatar_path = $petAvatar->store('pet_avatars', 'public');
                    }

                    $pet->save();
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            $responseData = ['message' => $e->getMessage()];
        }

        return response()->json($responseData);
    }
}
