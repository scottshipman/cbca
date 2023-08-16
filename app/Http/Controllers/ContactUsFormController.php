<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;

class ContactUsFormController extends Controller
{
    /// Create Contact Form
    public function createForm(Request $request) {
        $background = "contact.png";
        return view('contact')->with('background', $background);
    }
    // Store Contact Form data
    public function ContactUsForm(Request $request) {
        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'subject'=>'required',
            'message' => 'required'
        ]);
        //  Store data in database
        ContactSubmission::create($request->all());
        //  Send mail to admin

        $mailData = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'user_query' => $request->get('message'),
        ];
        Mail::to('info@crsytalbeachcommunity.org')->send(new ContactUs($mailData));

        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }


    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = ContactSubmission::orderBy('created_at', 'DESC')->get();

            return DataTables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/contact-us/view/'.$row->id.'" class="view btn 
                    btn-success btn-sm">View</a> <a 
href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('contact-us.index');
    }

    public function show($id)
    {
        $contactSubmission = ContactSubmission::find($id);
        return view('contact-us.show',compact('contactSubmission'));
    }
}
