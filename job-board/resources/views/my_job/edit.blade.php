<x-layout>
    <x-card>
        <form action="{{route('my-jobs.update', $job)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title" :required="true">Job Title</x-label>
                    <x-text-input name="title" :value="$job->title"></x-text-input>
                </div>
                <div>
                    <x-label for="location" :required="true">Location</x-label>
                    <x-text-input name="location" :value="$job->location"></x-text-input>
                </div>
                <div class="col-span-2">
                    <x-label for="salary" :required="true">Salary</x-label>
                    <x-text-input name="salary" type="number" :value="$job->salary"></x-text-input>
                </div>
                <div class="col-span-2">
                    <x-label for="description" :required="true">Description</x-label>
                    <x-text-input name="description" type="textarea" :value="$job->description"></x-text-input>
                </div>
                <div>
                    <x-label for="experience" :required="true">Experience</x-label>
                    <x-radio-group name="experience" :options="\App\Models\Job::$experience"
                                   :all-options="false" :value="$job->experience">
                    </x-radio-group>
                </div>
                <div>
                    <x-label for="category" :required="true">Category</x-label>
                    <x-radio-group name="category" :options="\App\Models\Job::$category"
                                   :all-options="false" :value="$job->category">
                    </x-radio-group>
                </div>
                <x-button class="col-span-2">Edit job!</x-button>
            </div>
        </form>
    </x-card>
</x-layout>