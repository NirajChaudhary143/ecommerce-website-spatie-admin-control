
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
            <!-- Table -->
          <div class="card">
                      <div class="card-body">
                        <h4 class="card-title"><strong>Product Table</strong></h4>
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
                        <!-- <p class="card-description"> Add class <code>.table</code>
                        </p> -->
                        <div class="table-responsive">
                          <table class="table" id="product_table">
                            <thead>
                              <tr>
                                <th>S.N.</th>
                                <th>Product Id</th>
                                <th>Product Image</th>
                                <th>Product Title</th>
                                <th>Product Description</th>
                                <th>Product Quantity</th>
                                <th>Product Category</th>
                                <th>Action</th>
                                <!-- <th>Status</th> -->
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                              
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$product->id}}</td>
                                    <td><img src="{{ asset($product->product_image)}}" alt="img" height="50" width="50"></td>
                                    <td>{{$product->product_title}}</td>
                                    <td >{!!$product->product_description!!}
                                    </td>
                                    <td>{{$product->product_quantity}}</td>
                                    <td>{{$product->category->category_name}}</td>
                                    <td>
                                    <a href="{{ route('delete.product',[ 'id'=>$product->id]) }}" class="btn btn-danger">Delete</a>
                                        <a href="{{ route('edit.product',[ 'id'=>$product->id]) }}" id="editBtn" class="btn btn-success">Edit</a>
                                    </td>
                                </tr>
                            
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

            <!-- Table End -->

          </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>


<!-- @foreach($productImage as $productImage)
                                      @if($productImage->product_id == $product->id)
                                        asset('uploads/products/'.$productImage->name)
                                      @endif
                                    @endforeach -->