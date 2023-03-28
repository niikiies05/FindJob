

<script src="{{ asset('') }}https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/jquery/jquery-3.3.1.min.js">\x3C/script>')</script>
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('assets/js/vendors.min.js') }}"></script>

<!-- include custom script for site  -->
<script src="{{ asset('assets/js/main.min.js') }}"></script>



<!-- include jquery autocomplete plugin  -->

<script type="text/javascript" src="{{ asset('assets/plugins/autocomplete/jquery.mockjax.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/autocomplete/jquery.autocomplete.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/autocomplete/usastates.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/plugins/autocomplete/autocomplete-demo.js') }}"></script>

<script type="text/javascript">
    var url = "{{ route('LangChange') }}";
    $(".Langchange").change(function() {
        window.location.href = url + "?lang=" + $(this).val();
    });
</script>
