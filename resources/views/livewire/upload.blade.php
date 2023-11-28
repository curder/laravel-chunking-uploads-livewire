<form x-data="{
    submit() {
        const file = $refs.file.files[0]
        if (!file) {
            return
        }

    }
}" @submit.prevent="submit">
    <div class="flex items-center">
        <input type="file" name="file" x-ref="file" class="flex-grow"/>
        <x-primary-button>Upload</x-primary-button>
    </div>
</form>
