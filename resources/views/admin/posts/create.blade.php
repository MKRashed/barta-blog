<form
    action="{{ route('posts.store') }}"
    method="POST"
    enctype="multipart/form-data"
    class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6 space-y-3">
    @csrf

    <!-- Post Text -->
    <textarea
        class="block w-full p-2 pt-2 text-gray-900 rounded-lg border-none outline-none focus:ring-0 focus:ring-offset-0"
        name="body"
        rows="2"
        placeholder="What's going on, Rashed?"></textarea>

    <!-- Upload image Button -->
    <div>
        <input type="file" name="image" id="image" class="hidden" onchange="previewImage(event)" />
        <label for="image" class="-m-2 flex gap-2 text-xs items-center rounded-full p-2 text-gray-600 hover:text-gray-800 cursor-pointer">
            <span class="sr-only">image</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
            </svg>
        </label>
    </div>

    <!-- Preview of Selected Image -->
    <div id="imagePreview" class="mt-4 hidden">
        <img id="preview" src="" alt="Selected Image" class="w-40 h-40 object-cover rounded-lg" />
    </div>

    <!-- Post Button -->
    <div class="flex justify-end">
        <button type="submit" class="flex gap-2 text-xs justify-center rounded-full px-4 py-2 font-semibold bg-gray-800 hover:bg-black text-white">
            Post
        </button>
    </div>
</form>
<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById('imagePreview');
        const previewImage = document.getElementById('preview');

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('hidden');
            };

            reader.readAsDataURL(file);
        } else {
            previewImage.src = "";
            previewContainer.classList.add('hidden');
        }
    }
</script>