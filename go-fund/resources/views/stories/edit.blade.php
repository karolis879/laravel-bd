@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-center">
        <div class="w-96">
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4">
                    <h5 class="text-lg font-semibold">Edit story</h5>
                    <form method="POST" action="{{ route('story-update', $story->id) }}" enctype="multipart/form-data" 
                        >
                        @method('PATCH')

                        <div class="mb-4">
                            <label for="story" class="block text-sm font-medium text-gray-700">Your story</label>
                            <input type="text" name="story" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="story" value="{{  $story->story  }}">
                        </div>
                     
                        <div class="mb-4">
                            <label for="gallery" class="block text-sm font-medium text-gray-700">Upload Photos for Gallery</label>
                            <input type="file" name="image" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="gallery" multiple>
                        </div>
                      
                        <div class="mb-4">
                            <label for="sum" class="block text-sm font-medium text-gray-700">Edit sum</label>
                            <input type="text" name="sum_wanted" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="sum" value="{{ $story->sum_wanted }}">
                        </div>
                        <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Add
                        </button>
                        @csrf

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
