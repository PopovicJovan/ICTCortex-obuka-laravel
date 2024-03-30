<x-layout>
    <p class=" my-16 text-center text-4xl font-medium text-slate-600">
        Become employer!
    </p>
    <x-card class="py-8 px-16">
        <form action="{{route('employer.store')}}" method="POST">
            @csrf
            <div class="mb-4">
                <x-label for="company_name" :required="true">Company name</x-label>
                <x-text-input name="company_name"/>
            </div>
            <x-button class="w-full bg-green-50">Create</x-button>
        </form>
    </x-card>
</x-layout>
