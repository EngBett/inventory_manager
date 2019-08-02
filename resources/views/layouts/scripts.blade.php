<script src="{{asset('js/app.js')}}"></script>
<script>
    $("#wrapper").toggleClass("toggled");
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
