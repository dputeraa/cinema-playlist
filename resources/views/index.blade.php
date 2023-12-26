<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>MovieHunter</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{ asset('assets2/css/style.css') }}" type="text/css" media="all" />
    <script type="text/javascript" src="{{ asset('assets2/js/jquery-1.4.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets2/js/jquery-func.js') }}"></script>
    <!--[if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
</head>

<body>
    <!-- START PAGE SOURCE -->
    <div id="shell">
        <div id="header">
            <h1 id="logo"><a href="#">MovieHunter</a></h1>
            <div class="social">
                <br>
            </div>
            <div id="navigation">
                <ul>
                    <li><a class="active" href="#">HOME</a></li>
                    <li><a href="{{ route('login') }}">LOGIN</a></li>
                </ul>
            </div>
            <div id="sub-navigation">
            </div>
        </div>
        <div id="main">
            <div id="content">
                <div class="box">
                    <div class="head">
                        {{-- <h2>LATEST TRAILERS</h2>
                        <p class="text-right"><a href="#">See all</a></p> --}}
                    </div>
                    @foreach ($playlists as $playlist)
                        @csrf
                        <div class="movie">
                            <div class="movie-image"> <span class="play"><span
                                        class="name">{{ $playlist->movie->title }}</span></span> <a
                                    href="#"><img src="/images/poster/{{ $playlist->movie->image }}"
                                        alt="" /></a> </div>
                            <div class="rating">
                                <p>RATING</p>
                                <div class="stars">
                                    <div class="stars-in"> </div>
                                </div>
                                <span class="comments">12</span>
                            </div>
                        </div>
                    @endforeach
                    <div class="cl">&nbsp;</div>
                </div>
            </div>
            <div id="footer">
                <p class="lf">Copyright &copy; 2023 Cinema Playlist</p>
                <p class="rf">Design by Daniel Putera Alamsyah</a></p>
                <div style="clear:both;"></div>
            </div>
        </div>
        <!-- END PAGE SOURCE -->
</body>

</html>
