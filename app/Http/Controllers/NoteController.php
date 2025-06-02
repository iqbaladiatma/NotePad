<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index()
    {
        $query = Auth::user()->notes();

        // Handle search
        if (request('search')) {
            $search = request('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        // Handle category filter
        if (request('category')) {
            $query->where('category', request('category'));
        }

        // Handle sorting
        switch (request('sort')) {
            case 'oldest':
                $query->oldest();
                break;
            case 'title_asc':
                $query->orderBy('title', 'asc');
                break;
            case 'title_desc':
                $query->orderBy('title', 'desc');
                break;
            case 'priority_high':
                $query->orderByRaw("FIELD(priority, 'high', 'medium', 'low')");
                break;
            case 'priority_low':
                $query->orderByRaw("FIELD(priority, 'low', 'medium', 'high')");
                break;
            case 'due_date':
                $query->orderBy('due_date', 'asc');
                break;
            default: // 'latest'
                $query->latest();
                break;
        }

        $notes = $query->get();

        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'priority' => 'required|in:low,medium,high',
            'category' => 'nullable|string|max:50',
            'due_date' => 'nullable|date',
        ]);

        $note = Auth::user()->notes()->create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'priority' => $validated['priority'],
            'category' => $validated['category'],
            'due_date' => $validated['due_date'],
            'is_completed' => false,
        ]);

        return redirect()->route('notes.index')
            ->with('success', 'Note created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            abort(403);
        }
        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'priority' => 'required|in:low,medium,high',
            'category' => 'nullable|string|max:50',
            'due_date' => 'nullable|date',
        ]);

        $note->update($validated);

        return redirect()->route('notes.index')
            ->with('success', 'Note updated successfully.');
    }

    public function toggleStatus(Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            abort(403);
        }

        $note->update(['is_completed' => !$note->is_completed]);

        return redirect()->route('notes.index')
            ->with('success', 'Note status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            abort(403);
        }

        $note->delete();

        return redirect()->route('notes.index')
            ->with('success', 'Note deleted successfully.');
    }
}
