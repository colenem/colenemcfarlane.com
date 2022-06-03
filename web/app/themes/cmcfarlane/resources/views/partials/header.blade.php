<header class="banner">
    <div class="banner__container max-w-7xl mx-auto flex flex-row justify-between">
        <div class="banner__container-logo-wrapper flex flex-wrap content-center h-full">
            <a href="@php echo get_home_url() @endphp" class="banner__container-logo">CM.</a>
        </div>
        <nav class="banner__nav-primary">
            @if ( has_nav_menu( 'primary_navigation' ) )
                {!! wp_nav_menu( [
                    'theme_location'  => 'primary_navigation',
                    'container_class' => 'banner__menu flex flex-wrap content-center h-full',
                    'menu_class'      => 'nav'
                ] ) !!}
            @endif
        </nav>
    </div>
</header>
