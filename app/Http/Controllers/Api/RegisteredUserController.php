<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller {
    public function checkUniqueLogin(Request $request) {
        $request->validate(
            [
                'login' => 'required|string'
            ]
        );

        return response()->json(
            [
                'data' => [
                    'is_unique' => !User::query()->whereLogin($request->login)->exists()
                ]
            ]
        );
    }
}
