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

        .success {
            height: 1em;
            animation: slide 0.8s ease-out;
            width: fit-content;
            top: 0;
            left: 45%;
        }

        @keyframes slide {
            0% {
                transform: translateY(0%);
            }

            50% {
                transform: translateY(50%);
            }

            75% {
                transform: translateY(50%);
            }

            100% {
                transform: translateY(25%);
            }
        }
    </style>
</head>

<body>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible position-absolute show fade d-flex justify-content-center align-items-center success"
        role="alert" id="successAlert">
        {{ session('success') }}
    </div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Automatically hide the alert after 2 seconds
        var successAlert = document.getElementById('successAlert');
        if (successAlert) {
            setTimeout(function() {
                successAlert.classList.remove('show');
                successAlert.classList.add('fade');
            }, 1000); // 2000 milliseconds = 2 seconds
        }
    });
</script>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">dashboard</a>
    <div class="d-flex justify-content-evenly align-items-center">
        <div class="d-flex flex-column gap-3 align-items-center border p-3 login-div">
            <h2>Register</h2>

            <form class="d-flex flex-column gap-3 w-75" action="{{ route('register') }}" method="POST">
                @csrf

                <div class="d-flex flex-column gap-1">
                    <label class="form-label" for="name">Name</label>
                    <input class="form-control" type="text" id="name" name="name"
                        value="{{ old('name') }}">
                    @error('name')
                        <span class="alert alert-danger p-1 w-75" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-flex flex-column gap-1">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" id="email" name="email"
                        value="{{ old('email') }}">
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

                <button class="btn btn-success w-50 mx-auto" type="submit">Register</button>
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
