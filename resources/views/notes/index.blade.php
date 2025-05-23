<x-app-layout>
<x-slot name="header">
    <div class="flex flex-col items-start justify-between gap-2 sm:flex-row sm:items-center sm:gap-0">
      <h2 class="text-3xl font-bold leading-tight tracking-wide text-purple-800 font-poppins">
        📝 My Notes
      </h2>
      <a href="{{ route('notes.create') }}"
         class="px-5 py-2 font-semibold text-white transition-all duration-300 rounded-lg shadow-lg bg-gradient-to-r from-purple-500 to-purple-700 hover:from-purple-600 hover:to-purple-800 hover:scale-105 font-poppins">
        + Create New Note
      </a>
    </div>
</x-slot>


  <div class="min-h-screen py-12 bg-gradient-to-br from-purple-50 via-white to-purple-100 font-poppins">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      @if (session('success'))
      <div class="relative px-4 py-3 mb-6 font-medium text-green-700 bg-green-100 border border-green-400 rounded shadow animate-fade-in-down">
        {{ session('success') }}
      </div>
      @endif

      <div class="overflow-hidden shadow-xl bg-white/80 backdrop-blur-sm sm:rounded-xl animate-fade-in-up">
        <div class="p-8 text-gray-900">
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
</x-app-layout>
