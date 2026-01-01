@extends('gslsa.dashboard')

@section('content')
    <form class="form" action="{{ route('GslsaSouthMembers.store') }}" method="POST">
        @csrf

        <label for="role">Role</label>
        <input class="form-control" type="text" name="role">

        <label for="title">Title</label>
        <input class="form-control" type="text" name="title">

        <label for="name">Name</label>
        <input class="form-control" type="text" name="name">

        <label for="post">Post</label>
        <input class="form-control" type="text" name="post">

        <label for="image_path">Image Path</label>
        <input class="form-control" type="text" name="image_path">

        <label for="role_order">Role order</label>
        <input class="form-control" type="text" name="role_order">

        <label for="priority">Priority</label>
        <input class="form-control" type="text" name="priority">

        <button type="submit" class="btn btn-success">Add</button>

    </form>

    @if (isset($GslsaSouthMembers) && !$GslsaSouthMembers->isEmpty())
        <div class="table-responsive">
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Sr.no</th>
                        <th>Role</th>
                        <th>Title</th>
                        <th>Name</th>
                        <th>Post</th>
                        <th>Image Path</th>
                        <th>role_order</th>
                        <th>priority</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($GslsaSouthMembers as $GslsaSouthMember)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $GslsaSouthMember->role }}</td>
                            <td>{{ $GslsaSouthMember->title }}</td>
                            <td>{{ $GslsaSouthMember->name }}</td>
                            <td>{{ $GslsaSouthMember->post }}</td>
                            <td>{{ $GslsaSouthMember->image_path }}</td>
                            <td>{{ $GslsaSouthMember->role_order }}</td>
                            <td>{{ $GslsaSouthMember->priority }}</td>
                            <td class="d-flex gap-1">
                                <form action="{{ route('GslsaSouthMembers.edit', compact('GslsaSouthMember')) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary bi-pencil-fill"></button>
                                </form>

                                <form action="{{ route('GslsaSouthMembers.destroy', compact('GslsaSouthMember')) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger bi-trash3-fill"></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection
