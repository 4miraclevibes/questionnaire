@extends('layouts.backend.main')

@section('content')
<div class="container">
    <h1>Edit Questionnaire</h1>
    <form action="{{ route('questionnaires.update', $questionnaire->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $questionnaire->description }}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('questionnaires.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection