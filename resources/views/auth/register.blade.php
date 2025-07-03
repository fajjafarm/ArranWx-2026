<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials.title-meta', ['title' => 'Sign Up'])

    @include('layouts.partials.head-css')
</head>

<body class="h-100">

    <div class="auth-bg d-flex min-vh-100 justify-content-center align-items-center">
        <div class="row g-0 justify-content-center w-100 m-xxl-5 px-xxl-4 m-3">
            <div class="col-xl-4 col-lg-5 col-md-6">
                <div class="card overflow-hidden text-center h-100 p-xxl-4 p-3 mb-0">
                    <a href="{{ route('second', ['dashboards', 'index']) }}" class="auth-brand mb-3">
                        <img src="/images/logo-dark.png" alt="dark logo" height="24" class="logo-dark">
                        <img src="/images/logo.png" alt="logo light" height="24" class="logo-light">
                    </a>

                    <h3 class="fw-semibold mb-2">Welcome to Ocen Admin</h3>

                    <p class="text-muted mb-4">Enter your name , email address and password to access account.</p>

                    <div class="d-flex justify-content-center gap-2 mb-3">
                        <a href="#!" class="btn btn-soft-danger avatar-lg"><i
                                class="ti ti-brand-google-filled fs-24"></i></a>
                        <a href="#!" class="btn btn-soft-success avatar-lg"><i
                                class="ti ti-brand-apple fs-24"></i></a>
                        <a href="#!" class="btn btn-soft-primary avatar-lg"><i
                                class="ti ti-brand-facebook fs-24"></i></a>
                        <a href="#!" class="btn btn-soft-info avatar-lg"><i
                                class="ti ti-brand-linkedin fs-24"></i></a>
                    </div>

                    <p class="fs-13 fw-semibold">Or Sign Up With Email</p>

                    <form action="{{ route('second', ['dashboards', 'index']) }}" class="text-start mb-3">
                        <div class="mb-3">
                            <label class="form-label" for="example-name">Your Name</label>
                            <input type="text" id="example-name" name="example-name" class="form-control"
                                placeholder="Enter your name">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="example-email">Email</label>
                            <input type="email" id="example-email" name="example-email" class="form-control"
                                placeholder="Enter your email">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="example-password">Password</label>
                            <input type="password" id="example-password" class="form-control"
                                placeholder="Enter your password">
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                <label class="form-check-label" for="checkbox-signin">I agree to all <a href="#!"
                                        class="link-dark text-decoration-underline">Terms & Condition</a> </label>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary" type="submit">Sign Up</button>
                        </div>
                    </form>

                    <p class="text-danger fs-14 mb-4">Already have an account? <a
                            href="{{ route('second', ['auth', 'login']) }}" class="fw-semibold text-dark ms-1">Login
                            !</a>
                    </p>

                    <p class="mt-auto mb-0">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Osen - By <span
                            class="fw-bold text-decoration-underline text-uppercase text-reset fs-12">Coderthemes</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.partials.footer-scripts')

</body>

</html>
