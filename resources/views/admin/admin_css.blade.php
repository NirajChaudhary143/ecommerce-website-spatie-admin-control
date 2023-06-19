<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Panel</title>
    <!--Font Awesom -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('admin') }}/assets/images/favicon.png" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dropzone.min.css') }}">
    <meta name="_token" content="{{csrf_token()}}">
    @livewireStyles
    
    <style type="text/css">
        .ck-editor__editable {
            color: #000000; /* Black text color */
           
        }
        *{
            box-sizing: border-box;
        }
        .dropzone{
           
            border-radius: 10px;
        }
 

     
    </style>