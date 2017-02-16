<div class="social-buttons">

    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}"
       target="_blank" class="fb">
        <i class="fa fa-facebook-official fa-2x"></i>
    </a>

    <a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}"
       target="_blank" class="twitter">
        <i class="fa fa-twitter-square fa-2x"></i>
    </a>

    <a href="https://plus.google.com/share?url={{ urlencode($url) }}"
       target="_blank" class="google">
        <i class="fa fa-google-plus-square fa-2x"></i>
    </a>

    <a href="https://pinterest.com/pin/create/button/?{{
        http_build_query([
            'url' => $url,
            'media' => $image,
            'description' => $description
        ])
        }}" target="_blank" class="pinterest">
        <i class="fa fa-pinterest-square fa-2x"></i>
    </a>

</div>

@yield('share')