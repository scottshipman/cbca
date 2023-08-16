<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = User::select('users.id', 'users.name', 'email', 'address1',
                'phone', DB::raw("group_concat(memberships.name) as memberships"))
                ->whereRelation('roles', 'roles.id', '=', 1)
                ->join('membership_user', 'membership_user.user_id', '=', 'users.id')
                ->join('memberships', 'memberships.id', '=', 'membership_user.membership_id')
//                ->with('memberships')
                ->groupBy('users.id')
                ->get();

            return DataTables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/members/edit/'.$row->id.'" 
                    class="edit btn btn-success btn-sm">Edit</a> <a 
href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('member.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
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

        member::create($request->post());

        return redirect()->route('member.index')->with('success','member has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(member $member)
    {
        return view('member.show',compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(member $member)
    {

        return view('member.edit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, member $member)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'active' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $member->fill($request->post())->save();

        return redirect()->route('member.index')->with('success','member Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy( member $member)
    {
        $member->delete();
        return redirect()->route('companies.index')->with('success','member has been deleted successfully');
    }

}
