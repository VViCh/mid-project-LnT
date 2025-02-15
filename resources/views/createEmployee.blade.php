@extends('layout.app')

@section('content')
<div class="card shadow">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0">Add New Employee</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('employee.create') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label class="form-label">Age</label>
                <input type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}">
                @error('age')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">
                @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection