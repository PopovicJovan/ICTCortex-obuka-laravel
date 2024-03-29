<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filters = request()->only([
            'min_salary',
            'max_salary',
            'search',
            'category',
            'experience'
        ]);

//        if(request('min_salary') && request('max_salary')){
//            $jobs->whereBetween(
//                'salary', [request('min_salary'), request('max_salary')]
//            );
//        }elseif (!request('min_salary') && request('max_salary')){
//            $jobs->where('salary', '<=', request('max_salary'));
//        }elseif (request('min_salary') && !request('max_salary')){
//            $jobs->where('salary', '>=', request('min_salary'));
//        }
        return view("job.index", ['jobs' => Job::with('employer')->filter($filters)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('job.show', ['job' => $job->load('employer')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
