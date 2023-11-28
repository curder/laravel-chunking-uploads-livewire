<?php

namespace App\Livewire;

use Illuminate\Http\UploadedFile;

class SpecificUpload extends Upload
{

    public function onSuccess(UploadedFile $file)
    {
        dd($file);
    }
}
