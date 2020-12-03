<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\ProfileCompany;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;

class DaftarPerusahaanController extends Controller
{

	use RegistersUsers;

   
    public function __construct()
    {
        $this->middleware('guest');
    }

   

    protected function validator(array $data)
    {

        $message = [
            'required' => 'Kolom tidak boleh kosong!',
            'min:8' => 'Password minimal 8 karakter',
        ];

        return Validator::make($data, [
            'username' => ['required','string','max:100','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],$message);
    }

   


    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    protected function registered(Request $request,$user)
    {
    	$user->assignRole('company');
	    $user->profileCompany()->save(new profileCompany);

	    return redirect()->route('company')->with('success','Pendaftaran telah berhasil');
    }
}
