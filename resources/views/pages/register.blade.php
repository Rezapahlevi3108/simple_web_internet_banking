<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script src="https://kit.fontawesome.com/3f08182a17.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="row w-100">
            <div class="col-md-6 bg-primary-1 d-none d-md-block" style="height: 100vh">
                <img src="{{ asset('img/img-bank.png') }}" class="margin-top-170 d-block mx-auto" width="540">
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="ms-4 mt-4">
                    <a href="{{ route('home') }}" class="font-weight-500 color-primary-1">
                        <i class="fa-solid fa-arrow-left me-1" style="color: #5e99a8;"></i>
                        Back to Home
                    </a>
                </div>
                <div class="margin-x position-absolute mt-3">
                    @if ($errors->any())
                        @foreach($errors->all() as $err)
                            <div class="alert alert-danger" role="alert">{{ $err }}</div>
                        @endforeach
                    @endif
                </div>
                <div class="margin-x margin-top-80">
                    <h2 class="font-weight-700 color-primary-1">Register</h2>
                    <form id="form" action="{{ route('register.action') }}" method="POST" class="mt-4">
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
                            <input type="password" class="form-control" id="passwordConfirm" name="password" placeholder="Konfirmasi Password">
                        </div>
                        <x-button type="button" class="w-100 py-2 mt-3" id="register">Daftar Sekarang</x-button>
                        <div class="text-center font-weight-500 margin-top-80">
                            Sudah punya akun? 
                            <a href="{{ route('login') }}" class="color-primary-1">Masuk Sekarang</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            document.getElementById("register").addEventListener("click", function() {
                var passValue = document.getElementById("password").value;
                var passConfirmValue = document.getElementById("passwordConfirm").value;
                
                if (passValue === passConfirmValue) {
                    document.getElementById("form").submit();
                } else {
                    alert("Password tidak sama");
                }  
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>