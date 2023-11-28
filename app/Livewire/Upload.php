<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Livewire\Component;
use Pion\Laravel\ChunkUpload\Handler\ContentRangeUploadHandler;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class Upload extends Component
{

    public function handleChunk(Request $request)
    {
        $receiver = new FileReceiver(
            UploadedFile::fake()->createWithContent('file', $request->getContent()),
            $request,
            ContentRangeUploadHandler::class,
        );

        $save = $receiver->receive();

        if ($save->isFinished()) {
            // $save->getFile();
            return response()->json([
               'file' => $save->getFile()->getRealPath(),
            ]);
        }

        $save->handler();
    }

    public function render(): View
    {
        return view('livewire.upload');
    }
}
