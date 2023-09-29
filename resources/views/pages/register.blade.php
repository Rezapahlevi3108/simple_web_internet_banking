<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body style="background-color: #ECF3F3;">
        <div class="card shadow w-25 border-0 mx-auto p-4 mt-5">
            @if($errors->any())
                @foreach($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
            @endif
            <h3 class="text-center mb-4">Register</h3>
            <form id="form" action="{{ route('register.action') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Anda">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Masukkan Email Anda">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Anda">
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="passwordConfirm" name="password" placeholder="Konfirmasi Password Anda">
                </div>
                <button type="button" class="btn btn-primary w-100 mt-2" id="register">Register</button>
            </form>
            <a href="{{ route('login') }}" class="text-center mt-4">Login</a>
        </div>


        <script>
            document.getElementById("register").addEventListener("click", function() {
                var passValue = document.getElementById("password").value;
                var passConfirmValue = document.getElementById("passwordConfirm").value;

                if (!passValue || !passConfirmValue) {
                    alert("Mohon lengkapi form");
                } else {
                    if (passValue === passConfirmValue) {
                        document.getElementById("form").submit();
                    } else {
                        alert("Password tidak sama");
                    }
                }
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>