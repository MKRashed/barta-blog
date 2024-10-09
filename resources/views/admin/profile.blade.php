<x-app-layouts>
    <div class="container max-w-2xl mx-auto space-y-8 mt-8 px-2 min-h-screen">
        <!-- Cover Container -->
        <section
            class="bg-white border-2 p-8 border-gray-800 rounded-xl min-h-[350px] space-y-8 flex items-center flex-col justify-center">
            <!-- Profile Info -->
            <div
                class="flex gap-4 justify-center flex-col text-center items-center">
                <!-- Avatar -->
                <div class="relative">
                    <img
                        class="w-32 h-32 rounded-full border-2 border-gray-800"
                        src="{{ asset('storage/' . $user->image) }}"
                        alt="profile" />
                </div>
                <div>
                    <h1 class="font-bold md:text-2xl">{{ $user->first_name ?? '' }} {{ $user->last_name ?? '' }}</h1>
                    <p class="text-gray-700">{{ $user->bio ?? '' }}</p>
                </div>
                <!-- / User Meta -->
            </div>
            <!-- /Profile Info -->

            <!-- Profile Stats -->
            <div
                class="flex flex-row gap-16 justify-center text-center items-center">
                <!-- Total Posts Count -->
                <div class="flex flex-col justify-center items-center">
                    <h4 class="sm:text-xl font-bold">{{ count($posts) }}</h4>
                    <p class="text-gray-600">Posts</p>
                </div>

                <!-- Total Comments Count -->
                <div class="flex flex-col justify-center items-center">
                    <h4 class="sm:text-xl font-bold">14</h4>
                    <p class="text-gray-600">Comments</p>
                </div>
            </div>
            <!-- /Profile Stats -->

            <!-- Edit Profile Button (Only visible to the profile owner) -->
            <a
                href="{{ route('profile.edit', auth()->user()->id) }}"
                type="button"
                class="-m-2 flex gap-2 items-center rounded-full px-4 py-2 font-semibold bg-gray-100 hover:bg-gray-200 text-gray-700">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-5 h-5">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                </svg>

                Edit Profile
            </a>
            <!-- /Edit Profile Button -->
        </section>
        <!-- /Cover Container -->

        <!-- Barta Create Post Card -->
        <form
            action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6 space-y-3">
            @csrf
            <!-- Create Post Card Top -->
            <div>
                <div class="flex items-start /space-x-3/">
                    <!-- User Avatar -->
                    <div class="flex-shrink-0">
                        <img
                            class="h-10 w-10 rounded-full object-cover"
                            src="{{ asset('storage/' . $user->image) }}"
                            alt="Rashedul Islam" />
                    </div>
                    <!-- /User Avatar -->

                    <!-- Content -->
                    <div class="text-gray-700 font-normal w-full">
                        <textarea
                            class="block w-full p-2 pt-2 text-gray-900 rounded-lg border-none outline-none focus:ring-0 focus:ring-offset-0"
                            name="barta"
                            rows="2"
                            placeholder="What's going on, Rashedul Islam?"></textarea>
                    </div>
                </div>
            </div>

            <!-- Create Post Card Bottom -->
            <div>
                <!-- Card Bottom Action Buttons -->
                <div class="flex items-center justify-between">
                    <div class="flex gap-4 text-gray-600">
                        <!-- Upload Picture Button -->
                        <div>
                            <input
                                type="file"
                                name="picture"
                                id="picture"
                                class="hidden" />

                            <label
                                for="picture"
                                class="-m-2 flex gap-2 text-xs items-center rounded-full p-2 text-gray-600 hover:text-gray-800 cursor-pointer">
                                <span class="sr-only">Picture</span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-6 h-6">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>
                            </label>
                        </div>

                    </div>

                    <div>
                        <!-- Post Button -->
                        <button
                            type="submit"
                            class="-m-2 flex gap-2 text-xs items-center rounded-full px-4 py-2 font-semibold bg-gray-800 hover:bg-black text-white">
                            Post
                        </button>
                        <!-- /Post Button -->
                    </div>
                </div>
                <!-- /Card Bottom Action Buttons -->
            </div>
            <!-- /Create Post Card Bottom -->
        </form>
        @include('admin.posts.index')
    </div>
</x-app-layouts>