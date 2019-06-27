<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\model\User;
use App\Jobs\SendEmailJob;
use App\model\Custumers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $users;
    public function __construct(User $users) {
        $this->users = $users;
    }
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);
            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'message' => 'Unauthorized',
                ], 401);
            }

            $user = $request->user();
            if ($user->status == 'disabled') {
                return response()->json([
                    'message' => 'User Dasabled, please contact admim',
                ], 400);
            }

            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            if ($request->remember_me) {
                $token->expires_at = Carbon::now()->addWeeks(1);
            }

            $token->save();
            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed in seervice!' . $e->getMessage(),
            ], 500);
        }
    }
    public function signup(Request $request)
    {
        try {
            $this->users = $request->user();

            $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|confirmed',
            ]);
            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
            $user->typeacess = 'client';
            $user->status = 'disabled';
            $user->remember_token = str_random(40);
            $mens = "New pet Shop created email: ". $user->email;
            $mensagem = ['titulo' => 'Verify account',
                'mensagem' => $mens,
            ];
            $email = env("MAIL_ADMIN");
            SendEmailJob::dispatch($email, $mensagem, "[".env("APP_NAME")."] Verify account created");
            $user->save();
            return response()->json([
                'message' => 'Successfully created user!',
            ], 200);
            return response()->json(compact('user'), 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create user!' . $e->getMessage(),
            ], 500);
        }
    }
    public function sendPassword($email = null)
    {
        try {
            if ($email) {
                $user = new User();
                $user = User::where('email', $email)->first();
                if ($user->id == null) {
                    return response()->json([
                        'message' => 'Unauthorized!',
                    ], 404);
                }
                $passwordNew = str_random(6);
                $user->password = bcrypt($passwordNew);
                $mens = "Your new password is <b>" . $passwordNew . "</b>";
                $mensagem = ['titulo' => 'New Password',
                    'mensagem' => $mens,
                ];
                SendEmailJob::dispatch($email, $mensagem, "[".env("APP_NAME")."] New Password");
                $user->save();
                return response()->json([
                    'message' => 'successful operation',
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Unauthorized!',
                ], 404);
            }

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed service!',
            ], 500);
        }
    }
    public function newPasswordUser(Request $request)
    {
        try {
            $user = $request->user();
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json([
                'message' => 'successful operation',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed service!',
            ], 500);
        }
    }
    public function getMe(){
        try {
            $user = $request->user();
            $cutumer = Custumers::where("users_id",$user->id)->with("getBanners")->first();
            if($cuntumer == null){
                return response()->json([
                    'message' => 'Not found',
                ], 404);
            }
            return response()->json($cuntumer, 200);
        } catch (\Exception $th) {
            return response()->json([
                'message' => 'Failed service!',
            ], 500);
        }
    }
}
