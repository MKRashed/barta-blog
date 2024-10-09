<form action="{{ route('posts.index') }}" method="GET" class="flex items-center">
    <input
        type="text"
        placeholder="Search..."
        name="search"
        value="{{ request('search') }}"
        class="border-2 border-gray-300 bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none" />
</form>