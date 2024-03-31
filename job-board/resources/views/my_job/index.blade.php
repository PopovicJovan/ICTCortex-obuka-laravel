<x-layout>
    <div class="mb-8 text-right">
        <x-link-button :href="route('my-jobs.create')">Add new!</x-link-button>
    </div>
    @forelse ($jobs as $job)
        <x-job-card class="mb-4" :$job>
            <div class="text-xs text-slate-500">
                @forelse($job->jobApplications as $application)
                    <div class="mb-4 flex justify-between items-center">
                        <div>
                            <div>{{$application->user->name}}</div>
                            <div>Applied {{$application->created_at->diffForHumans()}}</div>
                            <div>Download CV</div>
                        </div>
                        <div>
                            ${{number_format($application->expected_salary)}}
                        </div>
                    </div>
                @empty
                    No applications yet!
                @endforelse
                    <div class="mt-4">
                        <x-link-button :href="route('my-jobs.edit', $job)">
                            Edit
                        </x-link-button>
                    </div>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
                No jobs yet!
            </div>
            <div class="text-center">
                Post your first job <a href="{{route('my-jobs.create')}}" class="hover:underline text-indigo-500">here!</a>
            </div>
        </div>
    @endforelse

</x-layout>
