<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ setting('app_name') }}</title>


    {{-- 
    @php
        $cwd = getcwd();
        $cssName = basename(glob($cwd . '/build/assets/*.css')[0], '.css');
        $jsName = basename(glob($cwd . '/build/assets/*.js')[0], '.js');
        $css = asset('build/assets/' . $cssName . '.css');
        $js = asset('build/assets/' . $jsName . '.js');
    @endphp --}}


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- @vite('resources/js/app.js') --}}

    <!-- add this code -->
    {{-- <link rel="stylesheet" href="{{ $css }}" id="css">
    <script src="{{ $js }}" id="js"></script> --}}


    <script src="https://upload-widget.cloudinary.com/global/all.js" type="text/javascript"></script>
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <!-- Favicons -->
    <link href="{{ asset('app_logo.png') }}" rel="icon">
    <link rel="apple-touch-icon" href="{{ asset('app_logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

</head>

<body class="hold-transition sidebar-mini">

    <div id="app"></div>




    {{-- <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleMenuIcon = document.getElementById('toggleMenuIcon');
            const body = document.querySelector('body');

            toggleMenuIcon.addEventListener('click', () => {
                if (body.classList.contains('sidebar-collapse')) {
                    localStorage.setItem('sidebarState', 'expanded');
                } else {
                    localStorage.setItem('sidebarState', 'collapsed');
                }
            });

            const sidebarState = localStorage.getItem('sidebarState');
            if (sidebarState === 'collapsed') {
                body.classList.add('sidebar-collapse');
            }
        });
    </script> --}}

    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function(reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>
</body>



</html>
