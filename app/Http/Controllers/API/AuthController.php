<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Helpers\MailsTrait;
use Illuminate\Http\Request;
use App\Helpers\HelperFunctionTrait;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    use HelperFunctionTrait, MailsTrait, AuthenticatesUsers;

    // Start User

    public function login_or_register_user(Request $request)
    {
        $phone = $request->validate(['phone' => 'required|numeric']);

        $user = User::where($phone)->firstOr(function () {
            return User::create(['phone' => request('phone')]);
        });

        $user->update(['verify_code' => $this->randomCode(4)]);

        return response()->json(['msg' => 'A confirmation code has been sent, check your inbox', 'code' => $user->verify_code]);
    }


    public function verify_code_user(Request $request)
    {
        $inputs = $request->validate(['phone' => 'required|numeric', 'verify_code' => 'required|min:4|max:5']);

        $user = User::firstWhere($inputs);

        if (empty($user)) {
            return response()->json(['msg' => 'Verify code is not correct'], 403);
        }

        $token = auth('api.user')->tokenById($user->id);

        return response()->json(compact('user', 'token'));
    }

    // End User



    public function logout()
    {
        auth()->logout();

        return response()->json(['msg' => 'success'], 200);
    }


    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'phone';
    }
}
