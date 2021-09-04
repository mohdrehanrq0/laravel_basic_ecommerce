<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function loginverify(Request $req){

        $req->validate([
            'email' => 'required|email',
            'pass' => 'required',
        ]);
        // return $req->input();
        $user = User::where(['email'=>$req->email])->first();
        if($user && Hash::check($req->pass, $user->password)){
            $req->session()->put('user', $user);
            $req->session()->put('loggedin', true);
            $req->session()->flash("msg","Logging Successful");
            return redirect('/');
        }else{
            $req->session()->flash("error","Username and password was inorrect");
            return redirect('login');
        }
    }

    
    public function register(Request $req){
        $req->validate([
            'email' => 'required|email',
            'name' => 'required',
            'pwd' => 'required',
            'mobile' => 'required|max:10|min:10'
        ]);

        $insert = new User;
        $insert->name = $req->name;
        $insert->email = $req->email;
        $insert->password = Hash::make($req->pwd);
        $insert->mobile = $req->mobile;
        $insert->save();
        $req->session()->flash("msg","Your account has been created successfully.Please login to continue");
        return redirect('login');
    }
    public function logout(Request $request){
        $request->session()->forget('user');
        $request->session()->forget('loggedin');
        return redirect('/');
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
        //
    }
}