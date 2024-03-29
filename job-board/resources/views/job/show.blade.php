<x-layout>
        <x-job-card class="mb-4" :$job>
            <p class="text-sm text-slate-500">
                {!! nl2br(e($job->description)) !!}
            </p>
            <div class="mt-4">
                <x-link-button :href="route('jobs.index')">
                    Back
                </x-link-button>
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