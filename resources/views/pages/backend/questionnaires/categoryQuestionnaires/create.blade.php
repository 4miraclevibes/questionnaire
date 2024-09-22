@extends('layouts.backend.main')

@section('content')
<div class="container">
    <h1>Create Detail Questionnaires</h1>
    <form action="{{ route('categoryQuestionnaires.store', $questionnaire->id) }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" required>
            </div>
            <div class="col-md-6">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="select1" name="category_id" aria-label="Default select example">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('categoryQuestionnaires.index', $questionnaire->id) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection