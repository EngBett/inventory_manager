<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body>

<div class="d-flex" id="wrapper">

    @include('layouts.side')
    <!-- Page Content -->
    @section('page-content')
        @show
    <!-- /#page-content-wrapper -->

</div>

@include('layouts.scripts')

</body>

</html>
