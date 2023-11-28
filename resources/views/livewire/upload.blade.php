<form class="space-y-4"
      x-data="{
        uploader: null,
        progress: 0,

        submit() {
            const file = $refs.file.files[0]
            if (!file) {
                return
            }
            this.uploader = createUpload({
                file,
                endpoint: '{{ route('livewire.upload') }}?name=' + file.name,
                method: 'post',
                headers: {
                  'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                chunkSize: 10 * 1024, // 10mb
            })

            this.uploader.on('progress', (progress) => {
                this.progress = progress.detail
            })

            this.uploader.on('chunkSuccess', (response) => {
                if(!response.detail.response.body) {
                    return
                }

                console.log(JSON.parse(response.detail.response.body).file)

            })

            this.uploader.on('success', () => {
                this.uploader = null
                this.progress = 0
            })
        },
}" @submit.prevent="submit">
    <div class="flex items-center">
        <input type="file" name="file" x-ref="file" class="flex-grow"/>
        <x-primary-button>Upload</x-primary-button>
    </div>

    <template x-if="uploader">
        <div>
            <div class="w-full rounded-full bg-gray-100 overflow-hidden">
                <div class="bg-blue-500 h-4 transform-all duration-200" :style="{width: `${progress}%`}"></div>
            </div>
        </div>
    </template>
</form>
