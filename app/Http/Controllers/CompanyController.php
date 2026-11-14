<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Auth;
use App\User;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::where('status','Active')->orWhere('status','Retrieved')->orderBy('created_at','desc')->paginate()->all();
        return view('company.index',compact('companies'));

    }

    public function archive()
    {
        $companies = Company::where('status','Archived')->orderBy('created_at','desc')->paginate()->all();
        return view('company.archives',compact('companies'));
    }

    public function declined()
    {
        $companies = Company::where('status','Rejected')->orderBy('created_at','desc')->paginate()->all();
        return view('company.declined',compact('companies'));
    }

    public function mycompanies()
    {
        $companies = Company::where('user_id','=',Auth::user()->id)->where('status','Active')->orWhere('status','Retrieved')->orderBy('created_at','desc')->paginate()->all();
        return view('company.mycompanies',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
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
             if(request()->hasFile('image')){
                // Get filename with the extension
                $imagenameWithExt = request()->file('image')->getClientOriginalName();
                // Get just filename
                $imagename = pathinfo($imagenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('image')->getClientOriginalExtension();
                // Filename to store
                $imageNameToStore= 'p-'.$imagename.'_'.time().'_'.$extension;
                // Upload Image
                $path = $request->file('image')->storeAs('public/images', $imageNameToStore);
             } else{
                $imageNameToStore = null;
             }

         $companies = new Company;
         $companies->user_id = Auth::user()->id;
         if(Auth::user()->role == 1){
            $companies->status = 'Active';
            }
            else{
            $companies->status = 'Pending';
            }
         $companies->title = $request->input('title');
         $companies->category = $request->input('category');
         $companies->city = $request->input('city');
         $companies->country = $request->input('country');
         $companies->about = $request->input('about');
         $companies->contact_number = $request->input('contact_number');
         $companies->email = $request->input('email');
         $companies->address = $request->input('address');
         $companies->image = $imageNameToStore;
         $companies->save();

         $users = User::find($companies->user_id);
         $users->isCompany = 1;
         $users->save();

         if(Auth::user()->role == 1){
            return \Redirect::route('companies', array($companies->id));
            }else{
                return back()->with('success','Registeration awaiting for approval');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companies = Company::find($id);
        return view('company.show',compact('companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Company::find($id);
        return view('company.edit',compact('companies'));
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
        
        $companies = Company::find($id);
        if($companies->image == true){
        $companies->status = $request->input('status');
        $companies->reason = $request->input('reason');
        $companies->title = $request->input('title');
        $companies->about = $request->input('about');
        $companies->contact_number = $request->input('contact_number');
        $companies->email = $request->input('email');
        $companies->address = $request->input('address');
        $companies->save();
        }
        else{
            $companies->status = $request->input('status');
            $companies->reason = $request->input('reason');
            $companies->title = $request->input('title');
            $companies->about = $request->input('about');
            $companies->contact_number = $request->input('contact_number');
            $companies->email = $request->input('email');
            $companies->address = $request->input('address');
            $companies->image = $imageNameToStore;
            $companies->save();
        }
      
         // return redirect()->back()->with('success','Record Updated');
         if(Auth::check() && Auth::user()->role == NULL && $companies->status == "Archived"){
            return redirect()->back()->with('success','Post Archived and moved to Archives page');
       }
       if(Auth::check() && Auth::user()->role == NULL && $companies->status == "Active"){
        return \Redirect::route('companies', array($companies->id))->with('success','Post Updated');
      }
      if(Auth::check() && Auth::user()->role == NULL && $companies->status == "Retrieved"){
        return \Redirect::route('companies', array($companies->id))->with('success','Post Retrieved and Published');
      }
      if(Auth::check() && Auth::user()->role == 1 && $companies->status == "Active"){
       return redirect()->route('company-list')->with('success','Post has been approved and published');
  }
  if(Auth::check() && Auth::user()->role == 1 && $companies->status == "Archived"){
   return redirect()->route('company-list')->with('success','Post has been archived');
}
if($companies->status == "Rejected"){
   return redirect()->back()->with('success','Post has been declined and move to all companys list');
}
else
       return \Redirect::route('companies', array($companies->id));
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companies = Company::find($id);
        $companies->delete();
        return redirect()->route('company')->with('success','company Post has been permanently Deleted!');

    }
}
