@extends('layouts.main')

@section('container')
    <div class="historyTable">
        <div class="card mt-5">
            <div class="card-body">
                <h3 class="text-center mb-4">Forum History</h3>
                <table class="table is-bordered is-stripped is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Lecturer</th>
                            <th>Title</th>
                            <th>Contributors</th>
                            <th>Topic</th>
                            <th>Department</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($histories as $key => $his)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $his->lecturer->name }}</td>
                                <td>{{ $his->title }}</td>
                                <td>
                                    <ul>
                                        @foreach ($his->comment as $c)
                                            <li>{{ $c->student->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{ $his->topic }}</td>
                                <td>{{ $his->department->department_name }}</td>
                                <td>{{ $his->type->type_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div>
                    {{ $histories->onEachSide(1)->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
