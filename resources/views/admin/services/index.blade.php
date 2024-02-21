@extends('layouts.admin')

@section('content')
    <h2>Service List</h2>
<a href="{{ route('admin.services.create') }}" class="btn btn-primary">Create Service</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->title }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $service->image) }}" style="masx-width: 100px; max-height: 100px;">
                    </td>
                    <td>
                        <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
