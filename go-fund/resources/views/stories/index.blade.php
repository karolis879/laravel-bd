@extends('layouts.app')

@section('content')
    <div class="w-4/5 mx-auto">
        <div class="text-center">
            <h1 class="text-3xl text-gray-700">
                All Articles
            </h1>
            <hr class="border border-1 border-gray-300 mt-10">
        </div>
        @if (session()->has('message'))
            <div class="mx-auto w-4/5 pb-10">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    Warning
                </div>
                <div class="border border-t-1 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    {{ session()->get('message') }}
                </div>
            </div>
        @endif

        @if (Auth::user())
            <div class="py-10 sm:py-20">
                <a class="primary-btn inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400"
                    href="{{ route('story-create') }}">
                    New Article
                </a>
            </div>
        @endif
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mx-auto w-4/5">
        @foreach ($stories as $story)
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4">
                    <img src="{{ $story->image }}" alt="" class="my-4 w-32 h-32 sm:w-48 sm:h-48 object-cover">
                    <h2 class="text-gray-900 text-2xl font-bold pt-6 pb-0 sm:pt-0 hover:text-gray-700 transition-all">
                        <a href="">
                            {{ $story->story }}
                        </a>
                    </h2>



                    <p class="text-gray-900 text-lg py-8 w-full break-words">
                        Totally collected: {{ $story->sum_now }}
                    </p>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-blue-600 h-2.5 rounded-full"
                            style="width: {{ ($story->sum_now / $story->sum_wanted) * 100 }}%"></div>
                    </div>


                    <p class="text-gray-900 text-lg py-8 w-full break-words">
                        Asked ammount: {{ $story->sum_wanted }}
                    </p>

                    <!-- Inside the foreach loop -->
                    @if (Auth::user())
                        
                    <form action="{{ route('add-to-sum', $story->id) }}" method="POST">
                        @csrf
                        <input type="number" name="amount" placeholder="Amount to add" class="mr-2">
                        <button type="submit"
                            class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-400">Add</button>
                    </form>
                    @endif

                    <form action="{{ route('story-create') }}" method="GET">
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5"
                                stroke="currentColor" class="w-10 h-10 icon">
                                <path strokeLinecap="round" strokeLinejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </button>
                    </form>

                    <span class="text-gray-500 text-sm sm:text-base">
                        Made by:
                        <a href=""
                            class="text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all">
                            {{-- {{ $post->user->name }} --}}
                        </a>
                        {{-- op {{ $post->updated_at->format('d/m/Y') }} --}}
                    </span>

                    {{-- @if (Auth::id() === $post->user->id) --}}
                    <a href="{{ route('story-edit', $story->id) }}"
                        class="block italic text-green-500 border-b-1 border-green-400">
                        Edit
                    </a>
                    <form action="{{ route('story-destroy', $story->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="pt-3 text-red-500 pr-3" type="submit">
                            Delete
                        </button>
                    </form>
                    {{-- @endif --}}
                </div>
            </div>
        @endforeach
    </div>

    <div class="mx-auto pb-10 w-4/5">
        {{-- {{ $posts->links() }} --}}
    </div>
@endsection
