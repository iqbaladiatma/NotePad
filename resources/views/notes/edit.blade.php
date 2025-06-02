@extends('layouts.app')
@section('content')


<div class="min-h-screen py-12 bg-gradient-to-br from-purple-50 via-white to-purple-100 font-poppins">
  <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
    <div class="overflow-hidden shadow-xl bg-white/90 backdrop-blur-sm sm:rounded-3xl animate-fade-in-up">
      <div class="p-8 text-gray-900">
        <div class="mb-8">
          <h2 class="text-3xl font-bold bg-gradient-to-r from-purple-700 to-purple-900 bg-clip-text text-transparent">Edit Note</h2>
          <p class="mt-2 text-gray-600">Update your note details below.</p>
        </div>

        <form action="{{ route('notes.update', $note) }}" method="POST" class="space-y-6">
          @csrf
          @method('PUT')

          <div>
            <label for="title" class="block mb-2 text-sm font-semibold text-purple-800">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $note->title) }}"
              class="block w-full px-4 py-3 border border-purple-200 rounded-xl shadow-sm focus:border-purple-500 focus:ring-purple-500 transition-all duration-200 @error('title') border-red-500 @enderror"
              placeholder="Enter note title"
              required>
            @error('title')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="category" class="block mb-2 text-sm font-semibold text-purple-800">Category</label>
              <select name="category" id="category"
                class="block w-full px-4 py-3 border border-purple-200 rounded-xl shadow-sm focus:border-purple-500 focus:ring-purple-500 transition-all duration-200 @error('category') border-red-500 @enderror">
                <option value="">Select a category</option>
                <option value="work" {{ old('category', $note->category) == 'work' ? 'selected' : '' }}>Work</option>
                <option value="personal" {{ old('category', $note->category) == 'personal' ? 'selected' : '' }}>Personal</option>
                <option value="shopping" {{ old('category', $note->category) == 'shopping' ? 'selected' : '' }}>Shopping</option>
                <option value="ideas" {{ old('category', $note->category) == 'ideas' ? 'selected' : '' }}>Ideas</option>
                <option value="tasks" {{ old('category', $note->category) == 'tasks' ? 'selected' : '' }}>Tasks</option>
              </select>
              @error('category')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label for="due_date" class="block mb-2 text-sm font-semibold text-purple-800">Due Date</label>
              <input type="datetime-local" name="due_date" id="due_date"
                value="{{ old('due_date', $note->due_date ? $note->due_date->format('Y-m-d\TH:i') : '') }}"
                class="block w-full px-4 py-3 border border-purple-200 rounded-xl shadow-sm focus:border-purple-500 focus:ring-purple-500 transition-all duration-200 @error('due_date') border-red-500 @enderror">
              @error('due_date')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <div>
            <label for="priority" class="block mb-2 text-sm font-semibold text-purple-800">Priority</label>
            <select name="priority" id="priority"
              class="block w-full px-4 py-3 border border-purple-200 rounded-xl shadow-sm focus:border-purple-500 focus:ring-purple-500 transition-all duration-200 @error('priority') border-red-500 @enderror"
              required>
              <option value="low" {{ old('priority', $note->priority) == 'low' ? 'selected' : '' }}>Low</option>
              <option value="medium" {{ old('priority', $note->priority) == 'medium' ? 'selected' : '' }}>Medium</option>
              <option value="high" {{ old('priority', $note->priority) == 'high' ? 'selected' : '' }}>High</option>
            </select>
            @error('priority')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="content" class="block mb-2 text-sm font-semibold text-purple-800">Content</label>
            <textarea name="content" id="content" rows="6"
              class="block w-full px-4 py-3 border border-purple-200 rounded-xl shadow-sm focus:border-purple-500 focus:ring-purple-500 transition-all duration-200 @error('content') border-red-500 @enderror"
              placeholder="Write your note content here..."
              required>{{ old('content', $note->content) }}</textarea>
            @error('content')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <div class="flex justify-end pt-4 space-x-4">
            <a href="{{ route('notes.index') }}"
              class="inline-flex items-center px-6 py-3 font-semibold text-purple-900 transition-all duration-200 bg-purple-100 rounded-xl hover:bg-purple-200">
              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
              </svg>
              Cancel
            </a>
            <button type="submit"
              class="inline-flex items-center px-6 py-3 font-semibold text-white transition-all duration-200 rounded-xl shadow-lg bg-gradient-to-r from-purple-700 to-purple-900 hover:shadow-xl hover:-translate-y-0.5">
              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              Update Note
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<style>
  @keyframes fade-in-up {
    0% {
      opacity: 0;
      transform: translateY(20px);
    }

    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .animate-fade-in-up {
    animation: fade-in-up 0.6s ease-out forwards;
  }
</style>
@endsection