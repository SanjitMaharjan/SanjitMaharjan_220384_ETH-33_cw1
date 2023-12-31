<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <form id="registerForm" method="POST" action="/register">
                @csrf
                <div class="mb-md-5 mt-md-4 pb-5">
                  <h2 class="fw-bold mb-2 text-uppercase">Signup</h2>
                  <p class="text-white-50 mb-5">Sign Up for creating account</p>
                  <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typeUsername">Full Name</label>
                    <input type="text" id="typeUsername" class="form-control form-control-lg" name="name" value="{{ old('name') }}" />
                    @error('name')
                    <span class="text-danger" style="font-size: 16px;">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typeUsername">Email</label>
                    <input type="email" name="email" id="typeUsername" class="form-control form-control-lg" value="{{ old('email') }}" />
                    @error('email')
                    <span class="text-danger" style="font-size: 16px;">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typeUsername">Phone Number</label>
                    <input name="phone_number" type="number" id="typeUsername" class="form-control form-control-lg" value="{{ old('phone_number') }}" />
                    @error('phone_number')
                    <span class="text-danger" style="font-size: 16px;">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typePasswordX">Password</label>
                    <input name="password" type="password" id="typePasswordX" class="form-control form-control-lg" value="{{ old('password') }}" />
                    @error('password')
                    <span class="text-danger" style="font-size: 16px;">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typePasswordX">Confirm Password</label>
                    <input name="password_confirmation" type="password" id="typePasswordX" class="form-control form-control-lg" value="{{ old('password_confirmation') }}" />
                    @error('password_confirmation')
                    <span class="text-danger" style="font-size: 16px;">{{ $message }}</span>
                    @enderror
                  </div>
                  <button class="btn btn-outline-light btn-lg px-5" type="submit">Signup</button>
                </div>
              </form>

              <div>
                <p class="mb-0">Already have account ?? <a href="/login" class="text-white-50 fw-bold">Login</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
</body>

</html>