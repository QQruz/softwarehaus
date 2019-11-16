<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::approved();

        return view('jobs.index')->with(compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.new');
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
            'title' => 'required|string|min:5|max:30|unique:jobs',
            'description' => 'required|string|min:10|max:255',
            'email' => 'required|string|email'
        ]);

        $user = $request->user();

        $job = new Job($request->only(['title', 'description', 'email']));

        $job->user()->associate($user);

        $job->save();

        // check if user is posting for the first time
        if ($user->approved === NULL) {
            // forbid user to post more jobs until approved
            $user->approved = false;
            $user->save();

            // TODO: fire event
        }

        return redirect()->route('jobs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('jobs.view')->with(compact('job'));
    }
}
