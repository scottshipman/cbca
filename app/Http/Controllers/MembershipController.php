<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memberships = Membership::orderBy('id','desc')->paginate(5);
        return view('membership.index', compact('memberships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('membership.create');
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
            'name' => 'required',
            'price' => 'required',
            'active' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        Membership::create($request->post());

        return redirect()->route('membership.index')->with('success','Membership has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function show(Membership $membership)
    {
        return view('membership.show',compact('membership'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit(Membership $membership)
    {

        return view('membership.edit',compact('membership'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membership $membership)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'active' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $membership->fill($request->post())->save();

        return redirect()->route('membership.index')->with('success','Membership Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy( Membership $membership)
    {
        $membership->delete();
        return redirect()->route('companies.index')->with('success','Membership has been deleted successfully');
    }

}
