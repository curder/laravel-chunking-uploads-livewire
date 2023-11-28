<?php

namespace App\Livewire;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class SpecificUpload extends Upload
{
    public function onSuccess(UploadedFile $file)
    {
        auth()->user()->files()->create([
            'name' => $file->getClientOriginalName(),
            'path' => $file->storeAs('files', Str::uuid() . '.' . $file->getClientOriginalExtension(), 'public')
        ]);

        $this->dispatch('refresh')->component(FileIndex::class);
    }
}
