@extends('layouts.app')
@section('content')
    

  <div class="min-h-screen py-12 bg-gradient-to-br from-purple-50 via-white to-purple-100 font-poppins">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
      <div class="overflow-hidden shadow-xl bg-white/90 backdrop-blur-sm sm:rounded-xl animate-fade-in-up">
        <div class="p-8 text-gray-900">
          <form action="{{ route('notes.update', $note) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
              <label for="title" class="block mb-1 text-sm font-semibold text-purple-800">Title</label>
              <input type="text" name="title" id="title" value="{{ old('title', $note->title) }}"
                     class="block w-full px-4 py-2 border border-purple-300 rounded-md shadow-sm focus:border-purple-500 focus:ring-purple-500"
                     required>
              @error('title')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label for="content" class="block mb-1 text-sm font-semibold text-purple-800">Content</label>
              <textarea name="content" id="content" rows="6"
                        class="block w-full px-4 py-2 border border-purple-300 rounded-md shadow-sm focus:border-purple-500 focus:ring-purple-500"
                        required>{{ old('content', $note->content) }}</textarea>
              @error('content')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            <div class="flex justify-end pt-4 space-x-3">
              <a href="{{ route('notes.index') }}"
                 class="px-4 py-2 font-semibold text-purple-900 transition-all duration-200 bg-purple-100 rounded-md hover:bg-purple-200">
                Cancel
              </a>
              <button type="submit"
                      class="px-5 py-2 font-semibold text-white transition-all duration-200 rounded-md shadow bg-gradient-to-r from-purple-500 to-purple-700 hover:from-purple-600 hover:to-purple-800">
                💾 Update Note
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
