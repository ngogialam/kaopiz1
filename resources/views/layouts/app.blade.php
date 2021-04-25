<html>

<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    @section('sidebar')
        <p> This is the master sidebar </p>
    @show
    <div class="container">
        @yield('content')
    </div>
    @component('layouts.alert')
        @slot('heading')
            <p> This is heading slot </p>
        @endslot
        <p> This is default slot</p>

    @endcomponent

    {{-- @php
        $message = 'success!';
    @endphp
    @component('layouts.alert', ['message' => $message])
        @slot('heading')
            <p>This is heading slot </p>
        @endslot
        <p> This is default slot </p>
    @endcomponent --}}
</body>
<footer>
    @include('layouts.footer')
</footer>

</html>
