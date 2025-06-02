@extends('layouts.app')
@section('content')
<div class="min-h-screen py-12 bg-gradient-to-br from-purple-50 via-white to-purple-100 font-poppins">
  <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    @if (session('success'))
    <div id="notification" class="relative px-6 py-4 mb-6 font-medium text-green-700 bg-green-100 border border-green-400 rounded-2xl shadow-lg animate-fade-in-down">
      <div class="flex justify-between items-center">
        <span>{{ session('success') }}</span>
        <button onclick="closeNotification()" class="text-green-700 hover:text-green-900 focus:outline-none">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
    </div>
    @endif

    <div class="overflow-hidden shadow-xl bg-white/80 backdrop-blur-sm sm:rounded-3xl animate-fade-in-up">
      <div class="p-8 text-gray-900">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-8">
          <h2 class="text-3xl font-bold bg-gradient-to-r from-purple-700 to-purple-900 bg-clip-text text-transparent">My Notes</h2>
          <a href="{{ route('notes.create') }}"
            class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-700 to-purple-900 text-white rounded-xl hover:shadow-xl hover:-translate-y-1 transition-all duration-300 ease-in-out">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Create New Note
          </a>
        </div>

        <!-- Search and Filter Section -->
        <div class="mb-8 space-y-4">
          <form action="{{ route('notes.index') }}" method="GET" class="flex flex-col sm:flex-row gap-4">
            <!-- Search Bar -->
            <div class="flex-1">
              <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}"
                  class="w-full pl-10 pr-4 py-3 border border-purple-200 rounded-xl shadow-sm focus:border-purple-500 focus:ring-purple-500 transition-all duration-200"
                  placeholder="Search notes..."
                  autocomplete="off">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <svg class="h-5 w-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                  </svg>
                </div>
              </div>
            </div>

            <!-- Category Filter -->
            <div class="sm:w-48">
              <select name="category" onchange="this.form.submit()"
                class="w-full pl-4 pr-10 py-3 border border-purple-200 rounded-xl shadow-sm focus:border-purple-500 focus:ring-purple-500 transition-all duration-200 appearance-none bg-white">
                <option value="">All Categories</option>
                <option value="work" {{ request('category') == 'work' ? 'selected' : '' }}>Work</option>
                <option value="personal" {{ request('category') == 'personal' ? 'selected' : '' }}>Personal</option>
                <option value="shopping" {{ request('category') == 'shopping' ? 'selected' : '' }}>Shopping</option>
                <option value="ideas" {{ request('category') == 'ideas' ? 'selected' : '' }}>Ideas</option>
                <option value="tasks" {{ request('category') == 'tasks' ? 'selected' : '' }}>Tasks</option>
              </select>
            </div>

            <!-- Sort Filter -->
            <div class="sm:w-48">
              <select name="sort" onchange="this.form.submit()"
                class="w-full pl-4 pr-10 py-3 border border-purple-200 rounded-xl shadow-sm focus:border-purple-500 focus:ring-purple-500 transition-all duration-200 appearance-none bg-white">
                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest First</option>
                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                <option value="title_asc" {{ request('sort') == 'title_asc' ? 'selected' : '' }}>Title (A-Z)</option>
                <option value="title_desc" {{ request('sort') == 'title_desc' ? 'selected' : '' }}>Title (Z-A)</option>
                <option value="priority_high" {{ request('sort') == 'priority_high' ? 'selected' : '' }}>Priority (High to Low)</option>
                <option value="priority_low" {{ request('sort') == 'priority_low' ? 'selected' : '' }}>Priority (Low to High)</option>
                <option value="due_date" {{ request('sort') == 'due_date' ? 'selected' : '' }}>Due Date</option>
              </select>
            </div>

            <!-- Clear Filters Button -->
            @if(request('search') || request('sort') || request('category'))
            <a href="{{ route('notes.index') }}"
              class="inline-flex items-center px-4 py-3 text-purple-700 bg-purple-100 rounded-xl hover:bg-purple-200 transition-all duration-200">
              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
              Clear Filters
            </a>
            @endif
          </form>
        </div>

        @if($notes->isEmpty())
        <div class="text-center py-12 animate-fade-in-up">
          <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-purple-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
          </div>
          <p class="text-xl text-gray-600">
            @if(request('search'))
            No notes found matching your search.
            @else
            No notes yet. Create your first note!
            @endif
          </p>
        </div>
        @else
        <div class="grid gap-6 {{ $notes->count() <= 3 ? 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3' : 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 max-h-[calc(100vh-400px)] overflow-y-auto pr-2' }}">
          @foreach($notes as $note)
          <div class="bg-white border border-purple-100 rounded-2xl p-6 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 ease-in-out note-card flex flex-col justify-between min-h-[200px] animate-fade-in-up {{ $note->is_completed ? 'opacity-75' : '' }}" style="animation-delay: {{ $loop->index * 0.1 }}s">
            <div>
              <div class="flex items-center justify-between mb-3">
                <h3 class="text-xl font-bold text-purple-800 truncate {{ $note->is_completed ? 'line-through' : '' }}">{{ $note->title }}</h3>
                <form action="{{ route('notes.toggle-status', $note) }}" method="POST" class="inline">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="p-1 rounded-full hover:bg-purple-100 transition-colors">
                    @if($note->is_completed)
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    @else
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    @endif
                  </button>
                </form>
              </div>
              <div class="flex items-center gap-2 mb-3">
                <span class="px-2 py-1 text-xs font-semibold rounded-full
                  @if($note->priority === 'high') bg-red-100 text-red-700
                  @elseif($note->priority === 'medium') bg-yellow-100 text-yellow-700
                  @else bg-green-100 text-green-700
                  @endif">
                  {{ ucfirst($note->priority) }} Priority
                </span>
                @if($note->category)
                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-700">
                  {{ ucfirst($note->category) }}
                </span>
                @endif
              </div>
              <p class="text-gray-600 line-clamp-3 {{ $note->is_completed ? 'line-through' : '' }}">{{ Str::limit($note->content, 150) }}</p>
              @if($note->due_date)
              <div class="mt-3 text-sm text-gray-500">
                <div class="flex items-center">
                  <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                  </svg>
                  Due: {{ $note->due_date->format('M d, Y H:i') }}
                </div>
              </div>
              @endif
            </div>
            <div class="flex justify-end space-x-3 mt-6">
              <a href="{{ route('notes.edit', $note) }}"
                class="inline-flex items-center px-4 py-2 font-semibold text-purple-700 transition bg-purple-100 rounded-xl hover:bg-purple-200">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Edit
              </a>
              <form action="{{ route('notes.destroy', $note) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                  class="inline-flex items-center px-4 py-2 font-semibold text-red-600 transition bg-red-100 rounded-xl hover:bg-red-200"
                  onclick="return confirm('Are you sure you want to delete this note?')">
                  <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                  </svg>
                  Delete
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

  @keyframes fade-in-down {
    0% {
      opacity: 0;
      transform: translateY(-20px);
    }

    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes fade-out {
    0% {
      opacity: 1;
      transform: translateY(0);
    }

    100% {
      opacity: 0;
      transform: translateY(-20px);
    }
  }

  .animate-fade-in-up {
    animation: fade-in-up 0.6s ease-out forwards;
  }

  .animate-fade-in-down {
    animation: fade-in-down 0.6s ease-out forwards;
  }

  .animate-fade-out {
    animation: fade-out 0.6s ease-out forwards;
  }

  /* Custom scrollbar for the notes grid */
  .overflow-y-auto::-webkit-scrollbar {
    width: 8px;
  }

  .overflow-y-auto::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
  }

  .overflow-y-auto::-webkit-scrollbar-thumb {
    background: #c4b5fd;
    border-radius: 4px;
  }

  .overflow-y-auto::-webkit-scrollbar-thumb:hover {
    background: #a78bfa;
  }
</style>

<script>
  // Auto dismiss notification after 5 seconds
  document.addEventListener('DOMContentLoaded', function() {
    const notification = document.getElementById('notification');
    if (notification) {
      setTimeout(() => {
        closeNotification();
      }, 5000);
    }
  });

  // Function to close notification
  function closeNotification() {
    const notification = document.getElementById('notification');
    if (notification) {
      notification.classList.add('animate-fade-out');
      setTimeout(() => {
        notification.remove();
      }, 600);
    }
  }
</script>
@endsection