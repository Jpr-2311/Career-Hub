<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\UserProfile;

class ImageController extends Controller
{
      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UserUpdate(Request $request, $id)
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
        $profile->image = $imageNameToStore;
        
        $profile->save();

        return \Redirect::route('users', array($profile->user_id));

    
}

public function CompanyUpdate(Request $request, $id)
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
        $companies= Company::find($id);
        $companies->image = $imageNameToStore;
        $companies->save();
        
        return back()->with('success','Image Updated!');
 

    
}
}
