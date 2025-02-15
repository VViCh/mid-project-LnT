@extends('layout.app')

@section('content')
<div class="card shadow">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0">Employee List</h3>
    </div>
    <div class="card-body">
        @if($employees->isEmpty())
            <div class="alert alert-warning">No employees found</div>
        @else
            <div class="list-group">
                @foreach($employees as $employee)
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <strong>{{ $employee->name }}</strong>
                        </div>
                        <div class="col-md-2">
                            Age: {{ $employee->age }}
                        </div>
                        <div class="col-md-3">
                            {{ $employee->address }}
                        </div>
                        <div class="col-md-2">
                            {{ $employee->phone }}
                        </div>
                        <div class="col-md-2 text-end">
                            <a href="{{ route('employee.update.page', $employee->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('employee.delete', $employee->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection