@extends('layouts.backend.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mt-2">
    <h5 class="card-header">Table Results</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table" id="example">
        <thead>
          <tr class="text-nowrap table-dark">
            <th class="text-white">No</th>
            <th class="text-white">User</th>
            <th class="text-white">Category</th>
            <th class="text-white">Category Result</th>
            <th class="text-white">Score</th>
            <th class="text-white">Asal Sekolah</th>
            <th class="text-white">Umur</th>
            <th class="text-white">Jenis Kelamin</th>
            <th class="text-white">Nilai UN</th>
            <th class="text-white">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($formattedResults as $index => $result)
          <tr>
            <th scope="row">{{ $index + 1 }}</th>
            <td>{{ $result['user_name'] }}</td>
            <td>{{ $result['category'] }}</td>
            <td>{{ $result['category_result'] }}</td>
            <td>{{ $result['score'] }}</td>
            <td>{{ $result['from_school'] }}</td>
            <td>{{ $result['age'] }}</td>
            <td>{{ $result['gender'] }}</td>
            <td>{{ $result['exam_score'] }}</td>
            <td>
              <a href="{{ route('landing.result', $result['id']) }}" class="btn btn-sm btn-primary">View</a>
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