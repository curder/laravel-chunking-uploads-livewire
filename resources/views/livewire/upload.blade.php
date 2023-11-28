<form x-data="{
    uploader: null,

    submit() {
        const file = $refs.file.files[0]
        if (!file) {
            return
        }

        this.uploader = createUpload({
            file,
            endpoint: '{{ route('files.store') }}',
            method: 'post',
            headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            chunkSize: 10 * 1024, // 10mb
        })
    }
}" @submit.prevent="submit">
    <div class="flex items-center">
        <input type="file" name="file" x-ref="file" class="flex-grow"/>
        <x-primary-button>Upload</x-primary-button>
    </div>
</form>
