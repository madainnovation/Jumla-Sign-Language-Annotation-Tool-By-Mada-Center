<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Mada Web Monitor</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset("ControlPanel/assets/modules/bootstrap/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("ControlPanel/assets/modules/fontawesome/css/all.min.css")}}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{asset("ControlPanel/assets/modules/bootstrap-social/bootstrap-social.css")}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset("ControlPanel/assets/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("ControlPanel/assets/css/components.css")}}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA --></head>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">
                    <div class="login-brand">
                        <img src="{{asset("images/logo-en.png")}}" alt="logo" width="100" class="float-left mb-3">
                    </div>


                    {{--                    <a href="#" class="lan" style="float: right" >العربية</a>--}}
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">

                    <div class="card card-primary">
                        <div class="card-web"><label style="margin-top: 30px;margin-left: 19px;font-size: 17px;">Mada Annotation Tools</label>
                        </div>
                        <div class="card-web"><label style="margin-top: 5px;margin-left: 19px;font-size: 17px;">Sign in</label>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="submit"  class="btn btn-primary" value="Sign in">
                                </div>
                            </form>


                        </div>
                    </div>

                    <div class="simple-footer">
                        <span>© copyright 2020 Mada Digital access for all</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(function(){
        $('.selectpicker').selectpicker();
    });
</script>

<!-- General JS Scripts -->
<script src="{{asset("ControlPanel/assets/modules/jquery.min.js")}}"></script>
<script src="{{asset("ControlPanel/assets/modules/popper.js")}}"></script>
<script src="{{asset("ControlPanel/assets/modules/tooltip.js")}}"></script>
<script src="{{asset("ControlPanel/assets/modules/bootstrap/js/bootstrap.min.js")}}"></script>
<script src="{{asset("ControlPanel/assets/modules/nicescroll/jquery.nicescroll.min.js")}}"></script>
<script src="{{asset("ControlPanel/assets/modules/moment.min.js")}}"></script>
<script src="{{asset("ControlPanel/assets/js/stisla.js")}}"></script>
<script src="{{ asset('assets/modules/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-select/dist/css/bootstrap-select.min.css') }}">

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{asset("ControlPanel/assets/js/scripts.js")}}"></script>
<script src="{{asset("ControlPanel/assets/js/custom.js")}}"></script>
</body>
</html>
