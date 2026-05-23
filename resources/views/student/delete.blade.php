@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Delete Student</h1>
        <p>Are you sure you want to delete this student?</p>
        <form action="{{ route('student.destroy', $student->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
            <a href="{{ route('student.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection