<x-layout>
    <x-job-card class="mb-4" :$job>
    </x-job-card>
    <x-card>
        <h2 class="mb-4 text-lg font-medium">
            Your Job Application
        </h2>
        <form action="{{route('job.application.store', $job)}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="expected_salary"
                       class="mb-2 block text-sm font-medium text-slate-900">
                    Expected Salary
                </label>
                <x-text-input name="expected_salary" type="number"/>
            </div>
            <x-button class="w-full">Apply!</x-button>
        </form>
    </x-card>
</x-layout>
