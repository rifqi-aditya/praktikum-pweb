@extends('tasks.layouts.master')
@section('title', 'Tugas Kuliah')
@section('content')
    <div class="mb-3">
        <a class="btn btn-success px-5" href="{{route('tasks.create')}}" role="button">Tambah Tugas +</a>
    </div>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Tugas</th>
                <th scope="col">Mata Kuliah</th>
                <th scope="col">Deskirpsi</th>
                <th scope="col">Status</th>
                <th scope="col">Tanggal Mulai</th>
                <th scope="col">Tanggal Berakhir</th>
                <th scope="col">Prioritas</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $tasks as $task )
                <tr>
                    <th scope="row">{{$task->id}}</th>
                    <td>{{$task->title}}</td>
                    <td>{{$task->subject}}</td>
                    <td>{{$task->description}}</td>
                    <td>
                        <span class="badge 
                            {{ $task->status == 'Belum Selesai' ? 'bg-danger' : '' }}
                            {{ $task->status == 'Sedang Dikerjakan' ? 'bg-warning' : '' }}
                            {{ $task->status == 'Selesai' ? 'bg-success' : '' }}">
                            {{$task->status}}
                        </span>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($task->start_date)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($task->end_date)->format('d-m-Y') }}</td>
                    <td>
                    <span class="badge 
                        {{ $task->priority == 'Rendah' ? 'bg-success' : '' }}
                        {{ $task->priority == 'Sedang' ? 'bg-warning' : '' }}
                        {{ $task->priority == 'Tinggi' ? 'bg-danger' : '' }}">
                        {{$task->priority}}
                    </span>
                    </td>
                    <td>
                        <form action="/tasks/{{$task->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary btn-sm btn-icon" href="{{ route('tasks.edit', $task->id) }}" role="button"><i class="fas fa-pen-to-square"></i></a>
                            <button class="btn btn-danger btn-sm btn-icon confirm-delete" type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection