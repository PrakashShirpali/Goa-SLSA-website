@extends('gslsa.dashboard')

@section('content')
    <form class="form" action="{{ route('GslsaBicholimMembers.update', compact('GslsaBicholimMember')) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="role">Role</label>
        <input class="form-control" type="text" name="role" value="{{ $GslsaBicholimMember->role }}">

        <label for="title">Title</label>
        <input class="form-control" type="text" name="title" value="{{ $GslsaBicholimMember->title }}">

        <label for="name">Name</label>
        <input class="form-control" type="text" name="name" value="{{ $GslsaBicholimMember->name }}">

        <label for="post">Post</label>
        <input class="form-control" type="text" name="post" value="{{ $GslsaBicholimMember->post }}">

        <label for="image_path">Image Path</label>
        <input class="form-control" type="text" name="image_path" value="{{ $GslsaBicholimMember->image_path }}">

        <label for="role_order">Role order</label>
        <input class="form-control" type="text" name="role_order" value="{{ $GslsaBicholimMember->role_order }}">

        <label for="priority">Priority</label>
        <input class="form-control" type="text" name="priority" value="{{ $GslsaBicholimMember->priority }}">

        <button type="submit" class="btn btn-info">update</button>

    </form>
@endsection
