<script src="{{ asset('admin') }}/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('admin') }}/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{ asset('admin') }}/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('admin') }}/assets/js/off-canvas.js"></script>
    <script src="{{ asset('admin') }}/assets/js/hoverable-collapse.js"></script>
    <script src="{{ asset('admin') }}/assets/js/misc.js"></script>
    <script src="{{ asset('admin') }}/assets/js/settings.js"></script>
    <script src="{{ asset('admin') }}/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('admin') }}/assets/js/dashboard.js"></script>

        <!--jQuery Datables -->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    <!-- <script src="{{ asset('assets/js/jquery-3.6.4.min.js')}}"></script> -->
    <script src="{{ asset('assets/js/dropzone.min.js')}}"></script>
<script>
   Dropzone.autoDiscover = false;    
  const dropzone = $("#image").dropzone({ 
	
      url:  "{{ route('temp-images.create') }}",
      maxFiles: 10,
      paramName: 'image',
      addRemoveLinks: true,
      acceptedFiles: "image/jpeg,image/png,image/gif",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }, success: function(file, response){
        var html = `<div class="col-md-3 mb-3" id="product-image-row-${response.image_id}">
                            <div class="card image-card">
                                <a href="#" onclick="" class="btn btn-danger">Delete</a>
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

 


</script>

    <script>
        $(document).ready(function(){
            $('#category_table').DataTable();
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#product_table').DataTable();
        });
    </script>
                <script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>

               
    @livewireScripts

    <!-- End jQuery Table -->