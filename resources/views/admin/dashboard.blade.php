<x-app-layouts>
    <main
        class="container max-w-xl mx-auto space-y-8 mt-8 px-2 md:px-0 min-h-screen">
        @include('admin.posts.create')
        <!-- Newsfeed -->
        <section
            id="newsfeed"
            class="space-y-6">
            @include('admin.posts.index')
        </section>
        <!-- /Newsfeed -->
    </main>
</x-app-layouts>