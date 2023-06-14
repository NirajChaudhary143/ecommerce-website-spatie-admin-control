<div>
            @if($check == 'add')
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Category</h4>
                    <form wire:submit.prevent="addCategory" class="forms-sample">
                      <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" style="color: white; background-color: black" class="form-control" placeholder="Fruits, Vegitables, ..." wire:model="category_name">
                        
                      </div>
                      <span class="text-danger">
                            @error('category_name') {{$message}} <br><br> @enderror
                        </span>
                        
                      <button type="submit" class="btn btn-primary mr-2">Add Category</button>
                      
                    </form>
                    <a style="margin-top: 5px;" wire:click="checkValueToFalse" class="btn btn-success">View Category</a>
                  </div>
                </div>
                @elseif($check =='view')
                <div class="card">
                  <div class="card-body">
                 <a wire:click="checkValueToTrue" class="btn btn-success">Add Category</a>
                    <h4 class="card-title">Category Table</h4>
                    <div class="table-responsive">
                          <table class="table" id="category_table">
                            <thead>
                              <tr>
                                <th>S.N.</th>
                                <th>Category Id</th>
                                <th>Category Name</th>
                                <th>Action</th>
                                
                                <!-- <th>Status</th> -->
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($categories as $category)
                              <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$category->category_id}}</td>
                                <td>{{$category->category_name}}</td>
                                
                                <td>
                                @role('admin')
                                  <a wire:click="deleteCategory({{$category->category_id}})" class="btn btn-danger">Delete</a>
                                  @endrole
                                  <a wire:click="editCategory({{$category->category_id}})" class="btn btn-success">Edit</a>
                                </td>
                                
                                <!-- <td><label class="badge badge-danger">Pending</label></td> -->
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                  </div>
                </div>
                @elseif($check=='edit')
                <livewire:edit-category :category_name="$category_name" :c_id="$c_id" />
                @endif
              
</div>
