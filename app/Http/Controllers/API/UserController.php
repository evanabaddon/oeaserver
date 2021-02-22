<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Actions\Fortify\PasswordValidationRules;


class UserController extends Controller
{

    use PasswordValidationRules;

    public function fetch(Request $request)
    {
        return ResponseFormatter::success($request->user(), 'Data profile user berhasil diambil');
    }

    //login
    public function login(Request $request)
    {
        try {
            $request->validate([
                //validasi
                'email' => 'email|required',
                'password' => 'required'
            ]);

            //cek credentials
            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return ResponseFormatter::error([
                    'message' => 'Unauthorized',
                ], 'Authentication Failed', 500);
            }

            // jika hash tidak sesuai beri eror
            $user = User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            // jika sukses lanjutkan login
            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' =>  'Bearer',
                'user' => $user
            ], 'Authenticated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    //register
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['email', 'max:255', 'unique:users'],
                'password' => $this->passwordRules()
            ]);
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'hp' => $request->hp,
                'alamat' => $request->alamat,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'nik' => $request->nik,
                'asalSma' => $request->asalSma,
                'alamatSma' => $request->alamatSma,
                'password' => Hash::make($request->password)
            ]);

            $user = User::where('email', $request->email)->first();

            $tokenResult = $user->createToken('auth_token')->plainTextToken;
            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ]);
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    //logout
    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();
        return ResponseFormatter::success($token, 'Token Revoked');
    }

    //updateProfile
    public function updateProfile(Request $request)
    {
        $data = $request->all();

        $user = Auth::user();
        $user->update($data);

        return ResponseFormatter::success($user, 'Profile Updated');
    }

    //update photo
    public function updatePhoto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|max:2048',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(['error' => $validator->errors()], 'Update Photo Fails', 401);
        }

        if ($request->file('file')) {

            $file = $request->file->store('assets/user', 'public');

            //store your file into database
            $user = Auth::user();
            $user->profile_photo_path = $file;
            $user->update();

            return ResponseFormatter::success([$file], 'File successfully uploaded');
        }
    }
}