@if($errors -> any())

    <script>
        swal({
            title: "Validation Message !",
            text: "{{ $errors -> first() }}!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        });
    </script>

@endif


@if(Session::has('success'))

    <script>
        swal({
            title: "Validation Message !",
            text: "{{ Session::get('success') }}!",
            icon: "success",
        });
    </script>

@endif

@if ( Session::has('confirm') )

    <script>
        swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
        return true;
        });
        } else {
        swal("Your data is safe!");
        }
    });
    </script>
    
@endif