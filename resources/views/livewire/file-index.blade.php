<div>
    @forelse($files as $file)
        <div wire:key="{{ $file->id }}">
            <a class="text-blue-500 hover:text-blue-700" href="{{ $file->url }}">{{ $file->name }}</a>
        </div>
    @empty
        暂时没有文件!
    @endforelse
</div>
