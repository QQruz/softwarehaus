<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
        // allow admins only to review posts made by trashed users
        if ($job->user->trashed() && Gate::denies('edit-users')) {
            return abort(404);
        }

        return view('jobs.view')->with(compact('job'));
    }
}
