@extends('gslsa.dashboard')

@section('content')
    <form class="form" action="{{ route('GslsaHclscMembers.update', compact('GslsaHclscMember')) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="role">Role</label>
        <input class="form-control" type="text" name="role" value="{{ $GslsaHclscMember->role }}">

        <label for="title">Title</label>
        <input class="form-control" type="text" name="title" value="{{ $GslsaHclscMember->title }}">

        <label for="name">Name</label>
        <input class="form-control" type="text" name="name" value="{{ $GslsaHclscMember->name }}">

        <label for="post">Post</label>
        <input class="form-control" type="text" name="post" value="{{ $GslsaHclscMember->post }}">

        <label for="image_path">Image Path</label>
        <input class="form-control" type="text" name="image_path" value="{{ $GslsaHclscMember->image_path }}">

        <label for="role_order">Role order</label>
        <input class="form-control" type="text" name="role_order" value="{{ $GslsaHclscMember->role_order }}">

        <label for="priority">Priority</label>
        <input class="form-control" type="text" name="priority" value="{{ $GslsaHclscMember->priority }}">

        <button type="submit" class="btn btn-info">update</button>

    </form>
@endsection
