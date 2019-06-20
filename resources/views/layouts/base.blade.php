
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Yuvan Jobs</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicon/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/perfect-scrollbar.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/overrides.css')}}">
</head>
<body>


<!-- Header Area Start -->
@include('layouts.navbar')
<!-- Header Area End -->


@yield('content')

<!-- Footer Area Start -->
<footer class="jobguru-footer-area">
    <div class="footer-top section_50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single-footer-widget">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="{{asset('img/logo.png')}}" alt="jobguru logo" />
                            </a>
                        </div>
                        <p>Aliquip exa consequat dui aut repahend vouptate elit cilum fugiat pariatur lorem dolor cit amet consecter adipisic elit sea vena eiusmod nulla</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single-footer-widget footer-contact">
                        <h3>Contact Info</h3>
                        <p><i class="fa fa-map-marker"></i> 4257 Street, SunnyVale, USA </p>
                        <p><i class="fa fa-phone"></i> 012-3456-789</p>
                        <p><i class="fa fa-envelope-o"></i> support@yuvan.co</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-left">
                        <p>Copyright &copy; 2019 Yuvan. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->


<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/jquery-perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.slicknav.min.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script>
    window.setTimeout(function() {
        $(".alert.auto-fade").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 4000);
</script>

<script>
    $(document).ready(function(){
        $('.menu-toggle').click(function(){
            $('nav').toggleClass('active');
        });
    });
</script>
@yield('scripts')
</body>
</html>

