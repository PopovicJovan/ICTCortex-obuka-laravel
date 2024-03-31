<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Policies\JobPolicy;

class JobController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Job::class);
        $filters = request()->only([
            'min_salary',
            'max_salary',
            'search',
            'category',
            'experience'
        ]);

        return view("job.index",
                    ['jobs' => Job::with('employer')
                                ->latest()->filter($filters)->get()]
                    );
    }

    public function show(Job $job)
    {
        $this->authorize('view', Job::class);
        return view('job.show', ['job' => $job->load('employer.jobs')]);
    }

}
