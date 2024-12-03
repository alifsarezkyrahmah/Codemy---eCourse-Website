<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Content') }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form id="form" method="POST" action="{{ route(Auth::user()->role.'.contents.store') }}">
                    @csrf
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Title -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">{{ __('Title') }}</label>
                            <input id="title" name="title" type="text" value="{{ old('title') }}" required class="block w-full border-gray-300 rounded-md shadow-sm" />
                            @error('title')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Course -->
                        <div>
                            <label for="course_id" class="block text-sm font-medium text-gray-700">{{ __('Course') }}</label>
                            <select id="course_id" name="course_id" class="block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="" disabled selected>Select a course</option>
                                @foreach($courses as $course)
                                    @if (Auth::user()->role == 'admin' || Auth::id() == $course->teacher_id)
                                        <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('course_id')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Video URL -->
                        <div>
                            <label for="video_url" class="block text-sm font-medium text-gray-700">{{ __('Video URL') }}</label>
                            <input id="video_url" name="video_url" type="url" value="{{ old('video_url') }}" required class="block w-full border-gray-300 rounded-md shadow-sm" />
                            @error('video_url')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Body -->
                        <div>
                            <label for="body" class="block text-sm font-medium text-gray-700">{{ __('Body') }}</label>
                            <textarea id="description" name="body" class="block w-full border-gray-300 rounded-md shadow-sm" required>{{ old('body') }}</textarea>
                            @error('body')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end mt-4">
                        <button id="submitBtn" type="sumbit" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-white focus:outline-none bg-sky-950 rounded-full border border-gray-200 hover:bg-gray-800 hover:text-white focus:z-10 focus:ring-4 focus:ring-gray-100">
                            {{ __('Create Content') }}
                        </button>
                    </div>
                </form>
                <a href="{{ route(Auth::user()->role.'.contents.index') }}" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-white focus:outline-none bg-sky-950 rounded-full border border-gray-200 hover:bg-gray-800 hover:text-white focus:z-10 focus:ring-4 focus:ring-gray-100">
                    <svg class="w-6 h-6 text-white inline-block mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
                    </svg>                      
                    Back
                </a>
            </div>
        </div>
    </div>

        <!-- TinyMCE Save Handler -->
        <script>
            document.querySelector('#submitBtn').addEventListener('click', function(e) {
                // Save TinyMCE content as plain text
                let plainTextContent = tinymce.get('description').getContent({ format: 'text' });
                document.getElementById('description').value = plainTextContent;
                tinymce.triggerSave();
                document.querySelector('form').submit();
            });
        </script>
</x-app-layout>
