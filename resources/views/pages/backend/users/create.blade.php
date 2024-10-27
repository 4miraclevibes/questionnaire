@extends('layouts.backend.main')

@section('content')
<div class="container">
    <h1>Create User</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-md-6">
                <label for="role_id" class="form-label">Role</label>
                <select class="form-control" id="role_id" name="role_id" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="col-md-6">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
        </div>
        <div id="user-specific-fields" style="display: none;">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="from_school" class="form-label">From School</label>
                    <input type="text" class="form-control" id="from_school" name="from_school">
                </div>
                <div class="col-md-6">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="age" name="age">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="exam_score" class="form-label">Exam Score</label>
                    <input type="number" class="form-control" id="exam_score" name="exam_score" step="0.01">
                </div>
                <div class="col-md-6">
                    <label for="english_score" class="form-label">English Score</label>
                    <input type="number" class="form-control" id="english_score" name="english_score" step="0.01">
                </div>
                <div class="col-md-6">
                    <label for="math_score" class="form-label">Math Score</label>
                    <input type="number" class="form-control" id="math_score" name="math_score" step="0.01">
                </div>
                <div class="col-md-6">
                    <label for="culture_score" class="form-label">Culture Score</label>
                    <input type="number" class="form-control" id="culture_score" name="culture_score" step="0.01">
                </div>
                <div class="col-md-6">
                    <label for="tech_score" class="form-label">Tech Score</label>
                    <input type="number" class="form-control" id="tech_score" name="tech_score" step="0.01">
                </div>
                <div class="col-md-6">
                    <label for="interview_sc_tkj" class="form-label">Interview Score TKJ</label>
                    <input type="number" class="form-control" id="interview_sc_tkj" name="interview_sc_tkj" step="0.01">
                </div>
                <div class="col-md-6">
                    <label for="interview_sc_rpl" class="form-label">Interview Score RPL</label>
                    <input type="number" class="form-control" id="interview_sc_rpl" name="interview_sc_rpl" step="0.01">
                </div>
                <div class="col-md-6">
                    <label for="interview_sc_multimedia" class="form-label">Interview Score Multimedia</label>
                    <input type="number" class="form-control" id="interview_sc_multimedia" name="interview_sc_multimedia" step="0.01">
                </div>
                <div class="col-md-6">
                    <label for="school_year" class="form-label">School Year</label>
                    <input type="text" class="form-control" id="school_year" name="school_year">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const roleSelect = document.getElementById('role_id');
        const userFields = document.getElementById('user-specific-fields');

        function toggleUserFields() {
            const selectedOption = roleSelect.options[roleSelect.selectedIndex];
            if (selectedOption.text.toLowerCase() === 'user') {
                userFields.style.display = 'block';
            } else {
                userFields.style.display = 'none';
            }
        }

        roleSelect.addEventListener('change', toggleUserFields);
        toggleUserFields(); // Panggil fungsi ini untuk mengatur tampilan awal
    });
</script>
@endsection