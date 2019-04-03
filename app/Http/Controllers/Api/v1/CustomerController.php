<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustomerController extends Controller
{

    /**
     * Creating a customer
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name'  => 'required|string',
                'email' => 'required|email|unique:users,email',
                'cnp'   => 'required|boolean'
        ]);
        $data             = $request->toArray();
        $data['password'] = Hash::make(Str::random(8)); //new random pswd, in future need to sent this password via email
        $model            = User::create($data);
        return response()->json($model);
    }

    /**
     * Login as customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            $user             = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], 200);
        } else {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }
    }

}
