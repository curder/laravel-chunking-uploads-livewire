<?php

namespace App\Livewire;

use Livewire\Component;

class FileIndex extends Component
{

    protected $listeners = [
        'refresh',
    ];

    public function render()
    {
        $files = auth()->user()->files()->latest()->get();

        return view('livewire.file-index', [
            'files' => $files,
        ]);
    }
}
