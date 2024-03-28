<x-layout>
        <x-job-card class="mb-4" :$job>
            <div class="mt-4">
                <x-link-button :href="route('jobs.index')">
                    Back
                </x-link-button>
            </div>
        </x-job-card>
</x-layout>