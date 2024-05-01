<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>

    @include('include.style')
    
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left" class="d-flex flex-column">
            <div class="auth-logo mx-auto">
                <a href='/login'><img src="{{ asset('template/assets/images/logo/logo.svg') }}" alt="Logo"></a>
            </div>
            <h1 class="auth-title mx-auto">Log in Admin</h1>

            @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
            @endif

            <form action="{{ route('postlogin') }}" method="POST">
              {{ csrf_field() }}
              <label for="username">Email Address</label>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" name="email" placeholder="nama@gmail.com">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <label for="password">Password</label>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" name="password" placeholder="Enter your password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>

                <button class="btn btn-success btn-block btn-lg shadow-lg mt-5">Log in</button>
            </form>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
    
    @if(Session::has('success'))
    <script>
        Swal.fire({
                title: 'Success!',
                text: 'Data has been saved successfully.',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
    </script>
        
    @endif
    
</body>

</html>
