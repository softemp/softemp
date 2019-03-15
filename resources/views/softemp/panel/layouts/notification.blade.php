@if(session('error'))
    <script>
        toastr.error("{!! session('error') !!}", "{{ trans('panel/notification.error') }}",{timeOut: 5000});
    </script>
@endif
@if(session('warning'))
    <script>
        toastr.warning("{!! session('warning') !!}", "{{ trans('panel/notification.warning') }}");
    </script>
@endif
@if(session('info'))
    <script>
        toastr.info("{!! session('info') !!}", "{{ trans('panel/notification.info') }}");
    </script>
@endif
@if(session('success'))
    <script>
        toastr.success("{!! session('success') !!}", "{{ trans('panel/notification.success') }}");
    </script>
@endif

@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <script>
            toastr.error("{!! $error !!}", "{{ trans('panel/notification.error') }}", {timeOut: 5000});
        </script>
    @endforeach
@endif