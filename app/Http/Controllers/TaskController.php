<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'subject' => 'required|max:255',
            'description' => 'nullable',
            'status' => 'required|in:Belum Selesai,Sedang Dikerjakan,Selesai',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'priority' => 'required|in:Rendah,Sedang,Tinggi',
        ]);

        // Ubah format tanggal sebelum menyimpan ke database
        $validatedData['start_date'] = Carbon::createFromFormat('d-m-Y', $request->input('start_date'));
        $validatedData['end_date'] = Carbon::createFromFormat('d-m-Y', $request->input('end_date'));

        Task::create($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Tugas Berhasil Ditambahkan');
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
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'subject' => 'required|max:255',
            'description' => 'nullable',
            'status' => 'required|in:Belum Selesai,Sedang Dikerjakan,Selesai',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'priority' => 'required|in:Rendah,Sedang,Tinggi',
        ]);

        // Ubah format tanggal sebelum menyimpan ke database
        $validatedData['start_date'] = Carbon::createFromFormat('d-m-Y', $request->input('start_date'));
        $validatedData['end_date'] = Carbon::createFromFormat('d-m-Y', $request->input('end_date'));
        
        $task = Task::findOrFail($id);
        $task->update($validatedData);
        
        return redirect()->route('tasks.index')->with('success', 'Tugas Berhasil Diubah');
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Task::destroy($id);
        return redirect()->route('tasks.index')->with('success', 'Tugas Berhasil Dihapus.');
    }
}
