<?php
namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class Controller extends BaseController{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function login() {
        return view('login');
    }
    public function doLogin(Request $request) {
      $rules = array('email' => 'required|email', 'password' => 'required');
      $validator = Validator::make($request->all() , $rules);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors([
                'message' => 'Failed Validation',
            ]);
        }
        else
        {
            $userdata = array(
            'email' => $request->input('email'),
            'password' => $request->input('password')
        );
        if (Auth::attempt($userdata))
        {
            return redirect('/dashboard');
        }
        else
        {
            return redirect()->back()->withErrors([
                'message' => 'Wrong email/password',
            ]);
        }
        }
    }
    public function listUser(){
        if (!Auth::user()) 
        {
            return redirect('/login')->withErrors([
                'message' => 'Forbidden. Login first.',
            ]);
        }
        $user = Auth::user()->load('role');
        $data = User::all();
        $data->load('role');
        return view('dashboard', [
            'data' => $data,
            'loggedUser' => $user['name'],
            'loggedRole' => $user['role']['roleName']
        ]);
    }
    public function logout(){
        Auth::logout(); // logging out user
        return redirect('/login'); // redirection to login screen
    }
}
