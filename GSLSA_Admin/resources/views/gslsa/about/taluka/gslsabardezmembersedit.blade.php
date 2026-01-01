@extends('gslsa.dashboard')

@section('content')
    <form class="form" action="{{ route('GslsaBardezMembers.update', compact('GslsaBardezMember')) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="role">Role</label>
        <input class="form-control" type="text" name="role" value="{{ $GslsaBardezMember->role }}">

        <label for="title">Title</label>
        <input class="form-control" type="text" name="title" value="{{ $GslsaBardezMember->title }}">

        <label for="name">Name</label>
        <input class="form-control" type="text" name="name" value="{{ $GslsaBardezMember->name }}">

        <label for="post">Post</label>
        <input class="form-control" type="text" name="post" value="{{ $GslsaBardezMember->post }}">

        <label for="image_path">Image Path</label>
        <input class="form-control" type="text" name="image_path" value="{{ $GslsaBardezMember->image_path }}">

        <label for="role_order">Role order</label>
        <input class="form-control" type="text" name="role_order" value="{{ $GslsaBardezMember->role_order }}">

        <label for="priority">Priority</label>
        <input class="form-control" type="text" name="priority" value="{{ $GslsaBardezMember->priority }}">

        <button type="submit" class="btn btn-info">update</button>

    </form>
@endsection
