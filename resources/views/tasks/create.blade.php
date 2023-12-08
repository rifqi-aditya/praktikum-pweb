@extends('tasks.layouts.master')
@section('title', 'Tambah Tugas')
@section('content')
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf <!-- CSRF token is required in Laravel forms for security -->
        <div class="mb-3">
            <label for="title" class="form-label">Nama Tugas</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" 
            id="title" name="title" value="{{ old('title') }}" >
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Mata Kuliah</label>
            <input type="text" class="form-control @error('subject') is-invalid @enderror" 
            id="subject" name="subject" value="{{ old('subject') }}" >
            @error('subject')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea id="description" class="form-control @error('description') is-invalid @enderror" 
            name="description">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" class="form-control @error('status') is-invalid @enderror" 
            name="status">
                <option value="">Pilih Status</option>
                <option value="Belum Selesai">Belum Selesai</option>
                <option value="Sedang Dikerjakan">Sedang Dikerjakan</option>
                <option value="Selesai">Selesai</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Tanggal Mulai</label>
            <input type="text" class="form-control @error('start_date') is-invalid @enderror" 
            id="start_date" name="start_date" value="{{ old('start_date') }}">
            @error('start_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">Tanggal Selesai</label>
            <input type="text" class="form-control @error('end_date') is-invalid @enderror" 
            id="end_date" name="end_date" value="{{ old('end_date') }}">
            @error('end_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="priority" class="form-label">Prioritas</label>
            <select id="priority" class="form-control @error('priority') is-invalid @enderror" 
            name="priority">
                <option value="">Pilih Prioritas</option>
                <option value="Rendah">Rendah</option>
                <option value="Sedang">Sedang</option>
                <option value="Tinggi">Tinggi</option>
            </select>
            @error('priority')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Tambah Tugas</button>
    </form>

@endsection