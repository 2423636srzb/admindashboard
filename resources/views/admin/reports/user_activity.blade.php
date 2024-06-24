@extends('layouts.admin')

@section('main')

<div class="card">
    <div class="card-header">
      <h3 class="card-title">User Activity Log Report</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>User</th>
            <th>Name</th>
            <th>Modify</th>
            {{-- <th>Old One</th> --}}
            <th>New One</th>
            <th>Created At</th>
        </tr>
        </thead>
        <tbody>
            @foreach($activities as $activity)
            @php
            $properties = json_decode($activity->properties, true);
            $attributes = $properties['attributes'] ?? [];
            $oldAttributes = $properties['old'] ?? [];
            @endphp
            <tr>
                <td>{{ $activity->causer ? $activity->causer->name : 'Unknown'}}</td>
                <td>{{ $activity->log_name }}</td>
                <td>{{ $activity->event }}</td>
                {{-- <td>
                    @foreach($oldAttributes as $key => $value)
                        <strong>{{ $key }}:</strong> {{ $value }}<br>
                    @endforeach
                </td> --}}
                <td>
                    @foreach($attributes as $key => $value)
                        <strong>{{ $key }}:</strong> {{ $value }}<br>
                    @endforeach
                </td>
                <td>{{ $activity->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

@endsection

@section('script')

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": true, // Allow changing the number of records per page
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

@endsection
