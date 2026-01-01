@extends('gslsa.dashboard')

@section('content')
    <form class="form" action="{{ route('GslsaPernemMembers.update', compact('GslsaPernemMember')) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="role">Role</label>
        <input class="form-control" type="text" name="role" value="{{ $GslsaPernemMember->role }}">

        <label for="title">Title</label>
        <input class="form-control" type="text" name="title" value="{{ $GslsaPernemMember->title }}">

        <label for="name">Name</label>
        <input class="form-control" type="text" name="name" value="{{ $GslsaPernemMember->name }}">

        <label for="post">Post</label>
        <input class="form-control" type="text" name="post" value="{{ $GslsaPernemMember->post }}">

        <label for="image_path">Image Path</label>
        <input class="form-control" type="text" name="image_path" value="{{ $GslsaPernemMember->image_path }}">

        <label for="role_order">Role order</label>
        <input class="form-control" type="text" name="role_order" value="{{ $GslsaPernemMember->role_order }}">

        <label for="priority">Priority</label>
        <input class="form-control" type="text" name="priority" value="{{ $GslsaPernemMember->priority }}">

        <button type="submit" class="btn btn-info">update</button>

    </form>
@endsection
