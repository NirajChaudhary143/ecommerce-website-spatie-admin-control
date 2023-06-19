<div>
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Product</h4>
                    <form wire:submit.prevent="addProduct" class="forms-sample" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" style="color: white; background-color: black" class="form-control" wire:model="product_title">
                        
                      </div>
                      <span class="text-danger">
                            @error('product_title') {{$message}} <br><br> @enderror
                        </span>
                        <div class="form-group">
                        <label>Product Description</label>
                        
                        <textarea name="product_description" id="editor"  ></textarea>
                        
                      </div>
                      <span class="text-danger">
                            @error('product_description') {{$message}} <br><br> @enderror
                        </span>
                        <div class="form-group">
                        <label>Product Image</label><br>
                        <input type="file" wire:model="product_image">
                        
                      </div>
                      <span class="text-danger">
                            @error('product_image') {{$message}} <br><br> @enderror
                        </span>
                        <div class="form-group">
                        <label>Product Price</label>
                        <input type="text" style="color: white; background-color: black" class="form-control" wire:model="product_price">
                        
                      </div>
                      <span class="text-danger">
                            @error('product_price') {{$message}} <br><br> @enderror
                        </span>
                        <div class="form-group">
                        <label>Product Category</label>
                        <select wire:model="category_id" class="form-control" style="color: white; background-color: black">
                        <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                        
                      </div>
                      <span class="text-danger">
                            @error('category_id') {{$message}} <br><br> @enderror
                        </span>
                      <div class="form-group">
                        <label>Product Discount</label><br>
                        <input type="text" style="color: white; background-color: black" class="form-control" wire:model="product_discount">
                    
                      </div>
                      <span class="text-danger">
                            @error('product_discount') {{$message}} <br><br> @enderror
                        </span>
                        <div class="form-group">
                        <label>Product Quantity</label><br>
                        <input type="text" style="color: white; background-color: black" class="form-control" wire:model="product_quantity">
                        
                      </div>
                      <span class="text-danger">
                            @error('product_quantity') {{$message}} <br><br> @enderror
                        </span>
                        
                      <button type="submit" class="btn btn-primary mr-2" >Add Product</button>
                      
                    </form>
                    <!-- <a style="margin-top: 5px;" wire:click="checkValueToFalse" class="btn btn-success">View Category</a> -->
                  </div>
                </div>


<!-- Product Display Start -->
            <livewire:display-product/>

<!-- Product Display End -->


</div>
