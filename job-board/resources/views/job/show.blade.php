<x-layout>
        <x-job-card class="mb-4" :$job>
            <p class="text-sm text-slate-500">
                {!! nl2br(e($job->description)) !!}
            </p>
            <div class="flex space-x-2.5">
                <div class="mt-4">
                    <x-link-button :href="route('jobs.index')">
                        Back
                    </x-link-button>
                </div>
                <div class="mt-4">
                    @can('apply', $job)
                    <x-link-button :href="route('job.application.create', ['job' => $job])">
                        Apply!
                    </x-link-button>
                    @else
                        @if(auth()->user())
                        <x-link-button href="#">
                            You have already applied!
                        </x-link-button>
                        @else
                            <x-link-button :href="route('auth.create')">
                                Sign in to apply!
                            </x-link-button>
                        @endif
                    @endcan
                </div>
            </div>
        </x-job-card>
        <x-card class="mb-4">
            <h2 class="mb-4 text-lg font-medium">
                More jobs from
                <b>{{$job->employer->company_name}}</b>
            </h2>
            @foreach ($job->employer->jobs as $empjob)
                <x-job-card class="mb-4" :job="$empjob">
                    <div class="text-xs ">
                        {{$job->created_at->diffForHumans()}}
                    </div>
                </x-job-card>
            @endforeach
        </x-card>
</x-layout>