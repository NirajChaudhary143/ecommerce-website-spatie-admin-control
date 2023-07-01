
                         @if(isset($product))

        
                            {!! Form::model($product,[
                              'route'=>['update.product', $product->id],
                            'class'=>'forms-control',
                            'mehtod'=>'post',
                            'enctype'=>'multipart/form-data',
                            'id'=>'productFormEdit',
                            'name'=>'productFormEdit'
                            ]) !!}
                       
                              @else
                            {!! Form::model([
                            'route'=> 'add.product',
                            'class'=>'forms-control',
                            'mehtod'=>'post',
                            'enctype'=>'multipart/form-data',
                            'id'=>'productForm',
                            'name'=>'productForm'
                            ]) !!}
                        @endif
                            <!-- Row Start -->
                        <div class="row">
                          <!-- Row Start -->
                          <!-- Coll Start -->
                          <div class="col col-md-6">
                                <div class="col p-2" style="border-radius: 10px;  box-shadow: 2px 1px 5px 1px #888888;">
                                  <div class="mb-6 mt-3" >
                                      <div>
                                        <strong> {!! Form::label('','Title') !!}  </strong>
                                          <div class="md-3">
                                          {!! Form::text('product_title',null,[
                                            'class'=>'form-control',
                                            'style'=>'color:white;background:black',
                                            ]) !!}
                                        </div>
                                      </div>
                              
                                    </div>
                                  @error('product_title')
                                    <span class="alert alert-warning">
                                        {{$message}}
                                        </span><br><br>
                                  @enderror
                                  <hr>
                                  <div class="mt-2" >
                                  <strong> {!! Form::label('','Product Description') !!}</strong> 
                                    <div class="md-3">
                                    {!! Form::textarea('product_description',null,[
                                      'class'=>'form-control',
                                      'id'=>'editor'
                                      ]) !!}
                                    </div>
                                  
                                </div>
                                @error('description')
                                  <span class="alert alert-warning">
                                      {{$message}}
                                      </span><br><br>
                                @enderror
                            </div>

                          
                            <div class="col p-2 mt-3" style="border-radius: 10px;  box-shadow: 2px 1px 5px 1px #888888;">
                                <div class="mb-6 mt-3" >
                                      <div>
                                        <strong> {!! Form::label('','Selling Price') !!}  </strong>
                                          <div class="md-3">
                                          {!! Form::number('product_price',null,[
                                            'class'=>'form-control',
                                            'style'=>'color:white;background:black',
                                            ]) !!}
                                        </div>
                                      </div>
                              
                                    </div>
                                  @error('product_price')
                                    <span class="alert alert-warning">
                                        {{$message}}
                                        </span><br><br>
                                  @enderror
                                </div>

                                <div class="col p-2 mt-3" style="border-radius: 10px;  box-shadow: 2px 1px 5px 1px #888888;">
                                <div class="mb-6 mt-3" >
                                      <div>
                                        <strong> {!! Form::label('','Crossed Price',[
                                          'style'=>'text-decoration:line-through;'
                                          ]) !!}  </strong>
                                          <div class="md-3">
                                          {!! Form::number('product_discount',null,[
                                            'class'=>'form-control',
                                            'style'=>'color:white;background:black',
                                            ]) !!}
                                        </div>
                                      </div>
                              
                                    </div>
                                  @error('discount_price')
                                    <span class="alert alert-warning">
                                        {{$message}}
                                        </span><br><br>
                                  @enderror
                                </div>
                                <div class="col p-2 mt-3" style="border-radius: 10px;  box-shadow: 2px 1px 5px 1px #888888;">
                                <div class="mb-6 mt-3" >
                                      <div>
                                        <strong> {!! Form::label('','Quantity') !!}  </strong>
                                          <div class="md-3">
                                          {!! Form::number('product_quantity',null,[
                                            'class'=>'form-control',
                                            'style'=>'color:white;background:black',
                                            ]) !!}
                                        </div>
                                      </div>
                              
                                    </div>
                                  @error('product_quantity')
                                    <span class="alert alert-warning">
                                        {{$message}}
                                        </span><br><br>
                                  @enderror
                                </div>
                            
                        </div>
                          <!-- Col End -->
                          <!-- Col Start -->
                          <div class="col col-md-6">
                                <div class="col p-2" style="border-radius: 10px;  box-shadow: 2px 1px 5px 1px #888888;">
                                <div class="mb-3 mt-3">
                                   <strong> {!! Form::label('','Product Image')!!} </strong>
                                     <div id="image" class="dropzone dz-clickable">
                                        <div class="dz-message needsclick" style="color: black;">    
                                        <i class="fas fa-cloud-upload-alt" style="font-size: 50px;"></i>
                                            <br>Drop files here or click to upload.<br><br>                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row" id="image-wrapper">
                                @if(isset($productImages))
                                  @foreach($productImages as $productImage)
                                  <div class="col-md-3 mb-3" id="product-image-row-{{$productImage->id}}">
                                    <div class="card image-card">
                                        <a href="#" onclick="deleteImage({{$productImage->id }});" class="btn btn-danger">Delete</a>
                                        <img src="{{ asset('uploads/products/'.$productImage->name) }}" alt="" class="w-100 card-img-top">
                                        <div class="card-body">
                                            
                                            <input type="hidden" name="image_id[]" value="#"/>
                                        </div>
                                    </div>
                                  </div>
                                  @endforeach
                                  @endif
                                </div>
                               
                                </div>

                                <div class="col p-2 mt-3" style="border-radius: 10px;  box-shadow: 2px 1px 5px 1px #888888;">
                                <div class="mb-6 mt-3" >
                                      <div>
                                        <strong> {!! Form::label('','Categories') !!}  </strong>
                                        <div class="md-3">
                                          {!! Form::select('product_category',$categories->pluck('category_name','category_id'),isset($product) ? $product->category_id : '',[
                                          'class'=>'form-control js-example-basic-multiple',
                                          'style'=>'color:white;background-color:black',
                                          ]) !!}
                                        </div>
                                      </div>
                              
                                    </div>
                                  @error('product_title')
                                    <span class="alert alert-warning">
                                        {{$message}}
                                        </span><br><br>
                                  @enderror
                                </div>

                                                          
                          </div>
                          <!-- Col End -->
                          <!-- Row End -->
                            </div>
                            <!-- Row End -->
                        
                          {!! Form::submit($submit,['class'=>'btn btn-primary mr-2 mt-2','id'=>'updateBtn']) !!}

    {!! Form::close() !!}

    

                        
                        