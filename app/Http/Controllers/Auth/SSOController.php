<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SSOController extends Controller
{
    public function handleCallback(Request $request){
        $token = $request->query('token');
        if(!$token){
            return redirect ('/')->with('error', 'Token tidak ditemukan');
        }

        $apiUrl = "https://satupintu.wahanavisi.org/api/getDetail/{$token}";
        $response = Http::get($apiUrl);
        if($response->failed()){
            return redirect('/')->with('error', 'Gagal mengambil data dari API.');
        }

        $userData = $response->json();
        // dd($userData);
//================================================================TESTING================================================================================
        $email = $userData['email'] ?? null;
        $name = $userData['name'] ?? null;

        if (!$email || !$name) {
            return redirect('/')->with('error', 'Data tidak lengkap.');
        }

        $user = User::where('email', $email)->first();

        // check ada role admin atau tidak
        if ($user) {
            Auth::login($user);
        }
        else{
            session([
                'staff_name' => $name,
                'staff_email' => $email,
                'staff_logged_in' => true,
            ]);
        }

        
        return redirect('/Ruangan');
    }
}
