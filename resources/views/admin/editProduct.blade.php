
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
                          <h4 class="card-title">Edit Product</h4>
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
    <script>
   Dropzone.autoDiscover = false;
   var product_id ={{$product->id}}    
  const dropzone = $("#image").dropzone({ 
     
      url:  "{{ route('product-image.store') }}",
      params:{product_id:product_id},
      maxFiles: 10,
      paramName: 'image',
      addRemoveLinks: true,
      acceptedFiles: "image/jpeg,image/png,image/gif",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }, success: function(file, response){
        var html = `<div class="col-md-3 mb-3" id="product-image-row-${response.image_id}">
                            <div class="card image-card">
                                <a href="#" onclick="deleteImage(${response.image_id});" class="btn btn-danger">Delete</a>
                                <img src="${response.imagePath}" alt="" class="w-100 card-img-top">
                                <div class="card-body">
                                   
                                    <input type="hidden" name="image_id[]" value="${response.image_id}"/>
                                </div>
                            </div>
                        </div>`;
            $("#image-wrapper").append(html);
          this.removeFile(file);            
      }
  });
  var imageIdsToDelete = []; // Array to store the IDs of images to delete

function deleteImage(id) {
    if (confirm("Are you sure you want to delete this image?")) {
        // Remove the image div from the HTML
        $("#product-image-row-" + id).remove();

        // Add the ID of the image to delete to the array
        imageIdsToDelete.push(id);
    }
}

$("#updateBtn").on("click", function() {
    if (imageIdsToDelete.length > 0) {
        var URL = "{{ route('product-image.delete', 'ID') }}";

        // Loop through the array and send separate AJAX requests to delete each image
        imageIdsToDelete.forEach(function(imageId) {
            var newUrl = URL.replace('ID', imageId);

            // Send AJAX request to delete the file
            $.ajax({
                url: newUrl,
                method: 'DELETE',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success: function(response) {
                    // Handle the success response here
                },
                error: function(xhr, status, error) {
                    // Handle the error response here
                }
            });
        });

        // Clear the array after deletion
        imageIdsToDelete = [];
    }
});


</script>
    <!-- End custom js for this page -->
  </body>
</html>