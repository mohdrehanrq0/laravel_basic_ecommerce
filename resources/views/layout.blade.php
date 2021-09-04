
<x-header />
@if(Session::has('user'))
<x-side_model />
@endif

    @yield('content')

<x-footer />