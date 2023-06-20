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
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
        
        .image-card{
            position: relative;
        }
        .image-card .btn-danger{
            position: absolute;
            right: 0px;
            top: 0px;
        }
       /* Custom styling for Select2 */
        .select2-container {
        width: 100%;
        height: 30px;
        }

        .select2-container .select2-selection {
        background-color: black;
        border: 1px solid #ccc;
        border-radius: 4px;
        color: white;
        padding: 8px;
        }

        .select2-container .select2-selection--single {
        height: 34px;
        }

        .select2-container .select2-selection--multiple {
        min-height: 34px;
        height: auto;
        }

        .select2-container .select2-selection__choice {
        background-color: #555;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 2px 8px;
        margin-right: 4px;
        }

        .select2-container .select2-selection__choice__remove {
        color: #ccc;
        margin-left: 4px;
        }

        .select2-container .select2-selection__placeholder {
        color: #ccc;
        }

        .select2-container .select2-results__option--highlighted {
        background-color: #555;
        color: white;
        }

        .select2-container .select2-results__option--selected {
        background-color: #555;
        color: white;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
    color: white;
    line-height: 0px;
}

  

     
    </style>