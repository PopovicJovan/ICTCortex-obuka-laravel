<?php

namespace App\Http\Livewire;

use App\Models\Option;
use Livewire\Component;

class Polls extends Component
{
    protected $listeners = [
        'poolCreated' => 'render'
    ];

    public function render()
    {
        $pools = \App\Models\Poll::with('options.votes')
                                    ->latest()->get();
        return view('livewire.polls', ['pools' => $pools]);
    }

    public function vote(Option $option)
    {
        $option->votes()->create();
    }
}
