<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs;
use App\User;
use App\Company;
use Auth;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role',NULL)->count();
        $users_with_companies = User::where('isCompany',1)->count();
        $jobs = Jobs::all()->count();
        $active_jobs = Jobs::where('status','Active')->count();
        $rejected_jobs = Jobs::where('status','Rejected')->count();
        $pending_jobs = Jobs::where('status','Pending')->count();
        $archived_jobs = Jobs::where('status','Archived')->count();
        $companies = Company::all()->count();
        $active_companies = Company::where('status','Active')->count();
        $rejected_companies = Company::where('status','Rejected')->count();
        $pending_companies = Company::where('status','Pending')->count();
        $archived_companies = Company::where('status','Archived')->count();
        // dd($users);
        return view('admin.dashboard',compact('users','users_with_companies','jobs','active_jobs','rejected_jobs','pending_jobs','archived_jobs','companies','active_companies','rejected_companies','pending_companies','archived_companies'));
    }

    public function admin()
    {
        return view('admin.login');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
