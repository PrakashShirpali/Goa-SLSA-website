<!-- resources/views/login.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .login-div {
            margin-inline: 1.5em;
            margin-top: 10em !important;
        }

        @media (min-width: 575.98px) {
            .login-div {
                width: 30em;
                margin: 0 auto;
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
    <div class="d-flex flex-column gap-3 align-items-center border p-3 login-div">
        <h2>Login</h2>

        <form class="d-flex flex-column gap-3 w-75" action="{{ route('login') }}" method="POST">
            @csrf

            <div class="d-flex flex-column gap-1">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}">
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

            <button class="btn btn-primary w-50 mx-auto" type="submit">Login</button>
        </form>
    </div>

</body>

</html>
