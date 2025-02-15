@extends('layout.app')

@section('content')
<div class="card shadow">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0">Update Employee</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('employee.update', $employee->id) }}" method="POST">
            @csrf
            @method('PATCH')
            
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $employee->name }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Age</label>
                <input type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ $employee->age }}">
                @error('age')
                <div class="invalid-feedback">{{ $message }}</div
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $employee->address }}">
                @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $employee->phone }}">
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection