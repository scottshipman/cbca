@extends('layouts.main')
@section('head')

@endsection
@section('content')
    <h1 class="sub-page-title text-center text-white" style="background: var
    (--bs-primary);">Contact Us Submission</h1>
    <span><a href="/contact-us/list">Back to Contact Us Submission
            List</a></span>
    <div class="container mt-5" style="background:white";>
        <ul class="text-black">
            <li>ID: {{$contactSubmission->id}}</li>
            <li>Name of Sender: {{$contactSubmission->name}}</li>
            <li>Subject: {{$contactSubmission->subject}}</li>
            <li>Message: {{$contactSubmission->message}}</li>
            <li>Phone Number: {{$contactSubmission->phone}}</li>
            <li>Email: {{$contactSubmission->email}}</li>
            <li>Date Sent: {{$contactSubmission->created_at}}</li>
        </ul>
    </div>

@endsection

@section('scripts')

@endsection