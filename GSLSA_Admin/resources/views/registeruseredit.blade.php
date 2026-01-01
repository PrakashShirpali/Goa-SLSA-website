<!-- resources/views/register.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .login-div {
            margin-inline: 1.5em;
            margin-top: 10em !important;
        }

        @media (min-width: 575.98px) {
            .login-div {
                width: 30em;
                /* margin: 0 auto; */
            }
        }
    </style>
</head>

<body>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">dashboard</a>
    <div class="d-flex justify-content-evenly align-items-center">
        <div class="d-flex flex-column gap-3 align-items-center border p-3 login-div">
            <h2>Register</h2>

            <form class="d-flex flex-column gap-3 w-75" action="{{ route('userUpdate', ['user' => $user->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="d-flex flex-column gap-1">
                    <label class="form-label" for="name">Name</label>
                    <input class="form-control" type="text" id="name" name="name"
                        value="{{ $user->name }}">
                    @error('name')
                        <span class="alert alert-danger p-1 w-75" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-flex flex-column gap-1">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" id="email" name="email"
                        value="{{ $user->email }}">
                    @error('email')
                        <span class="alert alert-danger p-1 w-75" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-flex flex-column gap-1">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password">
                    @error('password')
                        <span class="alert alert-danger p-1 w-75" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-flex flex-column gap-1">
                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation">
                    @error('password_confirmation')
                        <span class="alert alert-danger p-1 w-75" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <button class="btn btn-info w-50 mx-auto" type="submit">Update</button>
            </form>
        </div>

        @if (isset($users) && !$users->isEmpty())
            <div class="table-responsive">
                <table class="table table-sm table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>sr.no</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="d-flex gap-1">
                                    <form action="{{ route('userEdit', ['user' => $user->id]) }}"
                                        method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-primary bi-pencil-fill"></button>
                                    </form>
        
                                    <form action="{{ route('userDelete', ['user' => $user->id]) }}"
                                        method="POST">
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
    </div>
</body>

</html>
