
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
                    <h4 class="card-title">Add Product</h4>
                    @include('admin.productForm')
                    <!-- <a style="margin-top: 5px;" wire:click="checkValueToFalse" class="btn btn-success">View Category</a> -->
                  </div>
                </div>

          </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
   
  </body>
</html>