<script src="{{asset('backend/assets/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{asset('backend/assets/bundles/morrisscripts.bundle.js')}}"></script><!-- Morris Plugin Js -->
<script src="{{asset('backend/assets/bundles/knob.bundle.js')}}"></script> <!-- Jquery Knob-->

<script src="{{asset('backend/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('backend/assets/js/index8.js')}}"></script>

{{-- ------------------ --}}

<script src="{{asset('backendassets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('backend/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script>

<script src="{{asset('backend/assets/vendor/sweetalert/sweetalert.min.js')}}"></script> <!-- SweetAlert Plugin Js -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script src="{{asset('backend/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('backend/assets/js/pages/tables/jquery-datatable.js')}}"></script>
{{-- ----------- --}}
<script src="{{asset('backend/assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('backend/assets/bundles/vendorscripts.bundle.js')}}"></script>

<script src="{{asset('backend/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
<script src="{{asset('backend/assets/vendor/parsleyjs/js/parsley.min.js')}}"></script>

<script>
    $(function() {
        // validation needs name of the element
        $('#food').multiselect();

        // initialize after multiselect
        $('#basic-form').parsley();
    });
</script>

{{-- summernote --}}

<script src="{{asset('backend/assets/summernote/summernote.js')}}"></script>

{{-- switch button bootstrap --}}
<script src="{{asset('backend/assets/vendor/switch-button-bootstrap/src/bootstrap-switch-button.js')}}"></script>

@yield('scripts')

<script>
    setTimeout(function () {
        $('#alert').slideUp();
    }, 4000);
</script>

<script src="https://kit.fontawesome.com/e502e3604b.js" crossorigin="anonymous"></script>

