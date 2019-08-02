<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.head')
</head>

<body>

<div class="d-flex" id="wrapper">

    @include('layouts.side')
    <!-- Page Content -->

        <div id="page-content-wrapper">

            @include('layouts.header')

            @section('page-content')
                @show
        </div>


    <!-- /#page-content-wrapper -->

</div>

@include('layouts.scripts')

</body>

</html>
