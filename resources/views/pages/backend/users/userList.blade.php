@extends('layouts.backend.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header">
      <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Create</a>
    </div>
  </div>
  <div class="card mt-2">
    <h5 class="card-header">Table Users</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table" id="example">
        <thead>
          <tr class="text-nowrap table-dark">
            <th class="text-white">No</th>
            <th class="text-white">Name</th>
            <th class="text-white">Email</th>
            <th class="text-white">Role</th>
            <th class="text-white">From School</th>
            <th class="text-white">Age</th>
            <th class="text-white">Gender</th>
            <th class="text-white">Exam Score</th>
            <th class="text-white">English Score</th>
            <th class="text-white">Math Score</th>
            <th class="text-white">Culture Score</th>
            <th class="text-white">Tech Score</th>
            <th class="text-white">Interview Score TKJ</th>
            <th class="text-white">Interview Score RPL</th>
            <th class="text-white">Interview Score Multimedia</th>
            <th class="text-white">School Year</th>
            <th class="text-white">Average Score</th>
            <th class="text-white">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role->name }}</td>
            <td>{{ $user->from_school ?? '-' }}</td>
            <td>{{ $user->age ?? '-' }}</td>
            <td>{{ $user->gender ?? '-' }}</td>
            <td>{{ $user->exam_score ?? '-' }}</td>
            <td>{{ $user->english_score ?? '-' }}</td>
            <td>{{ $user->math_score ?? '-' }}</td>
            <td>{{ $user->culture_score ?? '-' }}</td>
            <td>{{ $user->tech_score ?? '-' }}</td>
            <td>{{ $user->interview_sc_tkj ?? '-' }}</td>
            <td>{{ $user->interview_sc_rpl ?? '-' }}</td>
            <td>{{ $user->interview_sc_multimedia ?? '-' }}</td>
            <td>{{ $user->school_year ?? '-' }}</td>
            <td>{{ ($user->english_score + $user->math_score + $user->culture_score + $user->tech_score) / 4 ?? '-' }}</td>
            <td>
              <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
              <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- / Content -->
@endsection