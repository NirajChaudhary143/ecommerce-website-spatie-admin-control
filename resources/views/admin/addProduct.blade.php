
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.admin_css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
       @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
                        <div class="card-body">
                          <h4 class="card-title"><strong>Add Product</strong></h4>
                          @if(session()->has('success'))
                          <span class="alert alert-success">
                            {{session('success')}}
                          </span>
                          <br><br>
                          @endif
                          @if(session()->has('fail'))
                          <span class="alert alert-warning">
                            {{session('fail')}}
                          </span>
                          <br><br>
                          @endif

                           @include('admin.productForm')

                        </div>
        </div>
      </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>