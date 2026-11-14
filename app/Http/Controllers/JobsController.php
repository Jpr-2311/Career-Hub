<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs;
use App\Company;
use Auth;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Jobs::where(function ($q) {
            $q->where('status', 'Active')
                ->orWhere('status', 'Retrieved');
        });

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('desc', 'like', '%' . $search . '%')
                    ->orWhere('qual', 'like', '%' . $search . '%')
                    ->orWhere('req', 'like', '%' . $search . '%')
                    ->orWhere('salary', 'like', '%' . $search . '%');
            });
        }

        $jobs = $query->orderBy('created_at', 'desc')->paginate(10);

        $companies = Company::all();

        return view('jobs.index', compact('jobs', 'companies', 'search'));
    }

    public function archive()
    {
        $jobs = Jobs::where('user_id', Auth::user()->id)->where('status', 'Archived')->orWhere('status', 'Rejected')->orderBy('created_at', 'desc')->paginate()->all();
        $companies = Company::all();
        return view('jobs.archives', compact('jobs', 'companies'));
    }

    public function closed()
    {
        $jobs = Jobs::where('user_id', Auth::user()->id)->where('status', 'Closed')->orderBy('created_at', 'desc')->paginate()->all();
        $companies = Company::all();
        return view('jobs.closed', compact('jobs', 'companies'));
    }

    public function declined()
    {
        $jobs = Jobs::where('user_id', Auth::user()->id)->where('status', 'Rejected')->orderBy('created_at', 'desc')->paginate()->all();
        $companies = Company::all();
        return view('jobs.declined', compact('jobs', 'companies'));
    }
    public function myjobs()
    {
        $jobs = Jobs::where('user_id', '=', Auth::user()->id)->where('status', 'Active')->orWhere('status', 'Retrieved')->orderBy('created_at', 'desc')->paginate()->all();
        return view('jobs.myjobs', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::where('user_id', '=', Auth::user()->id)->whereNot('status', 'Rejected')->whereNot('status', 'Archived')->paginate()->all();
        return view('jobs.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jobs = new Jobs;
        $jobs->user_id = Auth::user()->id;
        if (Auth::user()->role == 1) {
            $jobs->status = 'Active';
        } else {
            $jobs->status = 'Pending';
        }
        $jobs->company = $request->input('company');
        $jobs->title = $request->input('title');
        $jobs->desc = $request->input('desc');
        $jobs->req = $request->input('req');
        $jobs->qual = $request->input('qual');
        $jobs->salary = $request->input('salary');
        $jobs->perk = $request->input('perk');
        $jobs->about = $request->input('about');
        $jobs->save();
        if (Auth::user()->role == 1) {
            return \Redirect::route('jobs', array($jobs->id));
        } else {
            return redirect()->route('job')->with('success', 'Post awaiting for approval');
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
        $jobs = Jobs::findOrFail($id);

        $companies = Company::all();

        return view('jobs.show', compact('jobs', 'companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobs = Jobs::find($id);
        return view('jobs.edit', compact('jobs'));
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
        $jobs = Jobs::find($id);
        $jobs->company = $request->input('company');
        $jobs->status = $request->input('status');
        $jobs->reason = $request->input('reason');
        $jobs->title = $request->input('title');
        $jobs->desc = $request->input('desc');
        $jobs->req = $request->input('req');
        $jobs->qual = $request->input('qual');
        $jobs->salary = $request->input('salary');
        $jobs->perk = $request->input('perk');
        $jobs->about = $request->input('about');
        $jobs->save();
        // return redirect()->back()->with('success','Record Updated');
        if (Auth::check() && Auth::user()->role == NULL && $jobs->status == "Archived") {
            return redirect()->route('jobs.index')->with('success', 'Post Archived and moved to Archives page');
        }
        if (Auth::check() && Auth::user()->role == NULL && $jobs->status == "Active") {
            return redirect()->route('jobs.index')->with('success', 'Post Retrieved and Published');
        }
        if (Auth::check() && Auth::user()->role == NULL && $jobs->status == "Retrieved") {
            return redirect()->route('jobs.index')->with('success', 'Post Retrieved and Published');
        }
        if (Auth::check() && Auth::user()->role == 1 && $jobs->status == "Active") {
            return redirect()->route('job-list')->with('success', 'Post has been approved and published');
        }
        if (Auth::check() && Auth::user()->role == 1 && $jobs->status == "Archived") {
            return redirect()->route('job-list')->with('success', 'Post has been archived');
        }
        if (Auth::check() && Auth::user()->role == NULL && $jobs->status == "Closed") {
            return redirect()->route('jobs.index')->with('success', 'Post Closed and moved to Closed page');
        }
        if (Auth::check() && Auth::user()->role == 1 && $jobs->status == "Rejected") {
            return redirect()->route('job-list')->with('success', 'Post has been declined');
        } else {
            return \Redirect::route('jobs', array($jobs->id));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobs = Jobs::find($id);
        $jobs->delete();
        if (Auth::user()->role == 1) {
            return redirect()->route('job-list')->with('success', 'Job Post has been permanently Deleted!');
        } else {
            return redirect()->route('job')->with('success', 'Job Post has been permanently Deleted!');
        }
    }
}
