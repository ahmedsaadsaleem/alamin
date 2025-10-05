<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Counter extends Component
{
    public $count = 1;

    public function increment(): void
    {
        $this->count++;
    }

    public function decrement(): void
    {
        $this->count--;
    }

    #[Title('counter')]
    public function render()
    {
        return view('livewire.counter');
    }
}
