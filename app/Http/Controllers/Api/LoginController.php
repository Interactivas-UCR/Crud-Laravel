<?php

namespace TRAINERPOKEMON\Http\Controllers\Api;

use Illuminate\Http\Request;
use TRAINERPOKEMON\Http\Controllers\Controller;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Route;

class LoginController extends Controller
{

    protected $client;

    public function __construct()
    {
        $this->client = Client::find(2);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        return $this->issueToken($request, 'password');
    }

    public function issueToken(Request $request, $grandType, $scope = '*')
    {

        $params = [
            'grant_type' => $grandType,
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'username' => $request->username ?: $request->email,
            'password' => $request->password,
            'scope' => $scope
        ];

        $request->request->add($params);

        $proxy = Request::create('oauth/token', 'POST');

        return Route::dispatch($proxy);
    }
}
