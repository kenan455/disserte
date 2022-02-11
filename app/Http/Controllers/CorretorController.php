<?php

namespace App\Http\Controllers;

use App\Models\Corretor;
use Illuminate\Http\Request;
use App\Models\User;

use Auth;

class CorretorController extends Controller
{
    private $objUser;

    public function __construct()
    {
        $this->objUser = new User();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Corretor  $corretor
     * @return \Illuminate\Http\Response
     */
    public function show(Corretor $corretor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Corretor  $corretor
     * @return \Illuminate\Http\Response
     */
    public function edit(Corretor $corretor)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Corretor  $corretor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Corretor $corretor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Corretor  $corretor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corretor $corretor)
    {
        //
    }

    public function login(){
        return view('corretores/login');
    }

    public function home()
    {   
        $user = User::find(Auth::user()->id);
        return view('corretores/dashboard', compact('user'));
    }

    public function logout()
    {
        Auth::logout();

        return view('login');
    }

}
