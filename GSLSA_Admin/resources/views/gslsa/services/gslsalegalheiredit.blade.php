@extends('gslsa.dashboard')

@section('content')
    <form class="form" action="{{ route('GslsaLegalheirs.update', compact('GslsaLegalheir')) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name</label>
        <input class="form-control" type="text" name="name" value="{{ $GslsaLegalheir->name }}">

        <label for="role">Role</label>
        <input class="form-control" type="text" name="role" value="{{ $GslsaLegalheir->role }}">

        <label for="contact_no">Contact.No</label>
        <input class="form-control" type="text" name="contact_no" value="{{ $GslsaLegalheir->contact_no }}">

        <label for="path">Path</label>
        <input class="form-control" type="text" name="path" value="{{ $GslsaLegalheir->path }}">

        <button type="submit" class="btn btn-info">update</button>

    </form>
@endsection
