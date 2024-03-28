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
</x-layout>