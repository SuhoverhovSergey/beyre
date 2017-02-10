<?php

namespace Modules\Api\Http\Controllers;

use DB;
use App\User;
use App\Address;
use App\CreditCard;
use App\Pet;
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
     * @param AccountRegisterRequest $request
     * @return Response
     */
    public function register(AccountRegisterRequest $request)
    {
        $requestData = $request->all();

        DB::beginTransaction();

        try {
            $user = User::create($requestData['AccountDetails']);

            if ($user) {
                $address = new Address($requestData['PersonalInfo']);
                $address->user_id = $user->id;
                $address->save();

                $creditCard = new CreditCard($requestData['CreditCard']);
                $creditCard->user_id = $user->id;
                $creditCard->save();

                foreach ($requestData['Pets'] as $petData) {
                    $pet = new Pet($petData);
                    $pet->user_id = $user->id;
                    $pet->save();
                }

                $files = $request->allFiles();
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        return response()->json([
            'Account' => 'register',
        ]);
    }
}
