@extends('layouts.app')
@section('content')
<div class="min-h-screen py-12 bg-gradient-to-br from-purple-50 via-white to-purple-100 font-poppins">
  <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    @if (session('success'))
    <div class="relative px-4 py-3 mb-6 font-medium text-green-700 bg-green-100 border border-green-400 rounded shadow animate-fade-in-down">
      {{ session('success') }}
    </div>
    @endif

    <div class="overflow-hidden shadow-xl bg-white/80 backdrop-blur-sm sm:rounded-xl animate-fade-in-up">
      <div class="p-8 text-gray-900">
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-2xl font-bold text-purple-800">My Notes</h2>
          <a href="{{ route('notes.create') }}"
            class="inline-flex items-center px-4 py-2 bg-purple-700 text-white rounded-lg hover:bg-purple-800 transition-all duration-300 ease-in-out">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Create New Note
          </a>
        </div>

        @if($notes->isEmpty())
        <p class="text-lg text-center text-gray-500">No notes yet. Create your first note!</p>
        @else
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
          @foreach($notes as $note)
          <div class="bg-white border border-purple-100 rounded-xl p-6 shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 ease-in-out note-card flex flex-col justify-between min-h-[180px] animate-fade-in-up">
            <h3 class="mb-2 text-xl font-bold text-purple-800 truncate">{{ $note->title }}</h3>
            <p class="flex-1 mb-4 text-gray-600">{{ Str::limit($note->content, 100) }}</p>
            <div class="flex justify-end space-x-2">
              <a href="{{ route('notes.edit', $note) }}"
                class="inline-block px-4 py-1 font-semibold text-purple-700 transition bg-purple-100 rounded hover:bg-purple-200">
                ✏️ Edit
              </a>
              <form action="{{ route('notes.destroy', $note) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                  class="inline-block px-4 py-1 font-semibold text-red-600 transition bg-red-100 rounded hover:bg-red-200"
                  onclick="return confirm('Are you sure you want to delete this note?')">
                  🗑️ Delete
                </button>
              </form>
            </div>
          </div>
          @endforeach
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection