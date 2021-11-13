<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <p
                style="margin: 0; background: lightgreen; font-weight: bold; color: white;"
                class="p-4 rounded"
            >
                {{ session('success') }}
            </p>
        </div>

    @endif

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <form action="{{ route('post.add') }}" method="POST">
                            @csrf
                            <div class="">
                                <x-label for="title" :value="__('Title')" />
                                <input id="title" class="block mt-1 w-full rounded" type="text" name="title" value="{{ old('title') }}" required autofocus />
                            </div>
                            <div class="mt-6 mb-4">
                                <x-label for="body" :value="__('Body')" />
                                <textarea id="body" class="block mt-1 w-full rounded" name="body" required autofocus></textarea>
                            </div>
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            >
                                Button
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
