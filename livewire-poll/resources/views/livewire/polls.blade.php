<div>
    @forelse($pools as $pool)
        <div class="mb-4">
            <h3 class="mb-4 text-xl">
                {{$pool->title}}
            </h3>
            @foreach($pool->options as $option)
                <div class="mb-2">
                    <button class="btn" wire:click="vote({{$option->id}})">Vote</button>
                    {{$option->name}} {{$option->votes()->count()}}
                </div>
            @endforeach
        </div>
    @empty
        <div class="text-gray-500">
            No pools available!
        </div>
    @endforelse
</div>
