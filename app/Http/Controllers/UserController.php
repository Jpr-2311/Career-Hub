<?php

namespace App\Http\Controllers;

use App\LevelOfEducation;
use App\User;
use App\UserProfile;
use App\UserEdu;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserProfile::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $education_levels = LevelOfEducation::all();
        return view('user.create', compact('education_levels'));
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createEduInfo()
    {
        $education_levels = LevelOfEducation::all();
        return view('user.create-edu-info', compact('education_levels'));
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createExperience()
    {
        $education_levels = LevelOfEducation::all();
        return view('user.create-experience', compact('education_levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Image Upload
        if (request()->hasFile('image')) {
            // Get filename with the extension
            $imagenameWithExt = request()->file('image')->getClientOriginalName();
            // Get just filename
            $imagename = pathinfo($imagenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $imageNameToStore = 'new-' . $imagename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('image')->storeAs('public/images', $imageNameToStore);
        } else {
            $imageNameToStore = null;
        }
        $profile = new UserProfile;
        $profile->user_id = Auth::user()->id;
        $profile->first_name = $request->input('first_name');
        $profile->last_name = $request->input('last_name');
        $profile->about = $request->input('about');
        $profile->contact_number = $request->input('contact_number');
        $profile->contact_show = $request->input('contact_show');
        $profile->email = $request->input('email');
        $profile->address = $request->input('address');
        $profile->address_show = $request->input('address_show');
        $profile->country = $request->input('country');
        $profile->city = $request->input('city');
        $profile->gender = $request->input('gender');
        $profile->gender_show = $request->input('gender_show');
        $profile->marital_status = $request->input('marital_status');
        $profile->marital_show = $request->input('marital_show');
        $profile->image = $imageNameToStore;
        $profile->save();

        $users = User::find($profile->user_id);
        $users->isProfile = 1;
        $users->save();

        return back()->with('success', 'stored');

    }

    public function storeEduInfo(Request $request)
    {
        
        $edu = new UserEdu;
        $edu->user_id = Auth::user()->id;
        $edu->school = $request->input('school');
        $edu->degree = $request->input('degree');
        $edu->study_field = $request->input('study_field');
        $edu->present = $request->input('present');
        $edu->end = $request->input('end');
        $edu->begin = $request->input('begin');
        $edu->save();

        return back()->with('success', 'stored');

    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeExperience(Request $request)
    {
        //Image Upload
        if (request()->hasFile('image')) {
            // Get filename with the extension
            $imagenameWithExt = request()->file('image')->getClientOriginalName();
            // Get just filename
            $imagename = pathinfo($imagenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $imageNameToStore = 'new-' . $imagename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('image')->storeAs('public/images', $imageNameToStore);
        } else {
            $imageNameToStore = null;
        }
        $profile = new UserProfile;
        $profile->user_id = Auth::user()->id;
        $profile->first_name = $request->input('first_name');
        $profile->last_name = $request->input('last_name');
        $profile->about = $request->input('about');
        $profile->contact_number = $request->input('contact_number');
        $profile->contact_show = $request->input('contact_show');
        $profile->email = $request->input('email');
        $profile->address = $request->input('address');
        $profile->address_show = $request->input('address_show');
        $profile->country = $request->input('country');
        $profile->city = $request->input('city');
        $profile->gender = $request->input('gender');
        $profile->gender_show = $request->input('gender_show');
        $profile->marital_status = $request->input('marital_status');
        $profile->marital_show = $request->input('marital_show');
        $profile->image = $imageNameToStore;
        $profile->save();

        $users = User::find($profile->user_id);
        $users->isProfile = 1;
        $users->save();

        return back()->with('success', 'stored');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $users = User::find($id);
        $profiles = UserProfile::where('user_id', $id)->paginate()->all();
        // dd($profile);
        return view('user.show', compact('profiles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function editProfile()
    // {
    //     $profile = UserProfile::find(Auth::user()->id);
    //     return view('user.edit-profile', compact('profile'));
    // }
    public function edit($id)
    {
        $profile = UserProfile::find($id);
        return view('user.edit-profile', compact('profile'));
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
        //Image Upload
        if (request()->hasFile('image')) {
            // Get filename with the extension
            $imagenameWithExt = request()->file('image')->getClientOriginalName();
            // Get just filename
            $imagename = pathinfo($imagenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $imageNameToStore = 'new-' . $imagename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('image')->storeAs('public/images', $imageNameToStore);
        } else {
            $imageNameToStore = null;
        }
        $profile= UserProfile::find($id);
        $profile->user_id = Auth::user()->id;
        $profile->first_name = $request->input('first_name');
        $profile->last_name = $request->input('last_name');
        $profile->about = $request->input('about');
        $profile->contact_number = $request->input('contact_number');
        $profile->contact_show = $request->input('contact_show');
        $profile->email = $request->input('email');
        $profile->address = $request->input('address');
        $profile->address_show = $request->input('address_show');
        $profile->country = $request->input('country');
        $profile->city = $request->input('city');
        $profile->gender = $request->input('gender');
        $profile->gender_show = $request->input('gender_show');
        $profile->marital_status = $request->input('marital_status');
        $profile->marital_show = $request->input('marital_show');
        $profile->image = $imageNameToStore;
        
        $profile->save();

        return \Redirect::route('users', array($profile->user_id));

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
