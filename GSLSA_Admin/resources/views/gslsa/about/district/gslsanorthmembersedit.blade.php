@extends('gslsa.dashboard')

@section('content')
    <form class="form" action="{{ route('GslsaNorthMembers.update', compact('GslsaNorthMember')) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="role">Role</label>
        <input class="form-control" type="text" name="role" value="{{ $GslsaNorthMember->role }}">

        <label for="title">Title</label>
        <input class="form-control" type="text" name="title" value="{{ $GslsaNorthMember->title }}">

        <label for="name">Name</label>
        <input class="form-control" type="text" name="name" value="{{ $GslsaNorthMember->name }}">

        <label for="post">Post</label>
        <input class="form-control" type="text" name="post" value="{{ $GslsaNorthMember->post }}">

        <label for="image_path">Image Path</label>
        <input class="form-control" type="text" name="image_path" value="{{ $GslsaNorthMember->image_path }}">

        <label for="role_order">Role order</label>
        <input class="form-control" type="text" name="role_order" value="{{ $GslsaNorthMember->role_order }}">

        <label for="priority">Priority</label>
        <input class="form-control" type="text" name="priority" value="{{ $GslsaNorthMember->priority }}">

        <button type="submit" class="btn btn-info">update</button>

    </form>
@endsection
