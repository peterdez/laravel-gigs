<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gig;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class GigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gigs = Gig::latest()->paginate(5);
        $gig_count = Gig::count();
        return view('gigs.index', compact('gigs', 'gig_count'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userId = Auth::id();
        return view('gigs.create', ['user_id' => $userId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'salary' => 'required',
            'company_id' => 'required',
            'role_id' => 'required',
            'user_id' => 'required',
        ]);

        Gig::create($request->all());

        return redirect()->route('gigs.index')
            ->with('success', 'Gig created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Gig $gig)
    {
        return view('gigs.show',compact('gig'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gig $gig)
    {
        if (Auth::check())
        {
        $user_id = Auth::id();
        }
        $companies = Company::all();
        return view('gigs.edit',compact('gig', 'user_id', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gig $gig)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'salary' => 'required',
            'company_id' => 'required',
            'role_id' => 'required',
            'user_id' => 'required',
        ]);
 
        $gig->update($request->all());
     
        return redirect()->route('gigs.index')
                        ->with('success','Gig Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gig $gig)
    {
        $gig->delete();
     
        return redirect()->route('gigs.index')
                        ->with('success','Gig has been deleted successfully');
    }
}
