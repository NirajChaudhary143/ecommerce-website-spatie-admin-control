<div>
            @if($check=="edit")
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Category</h4>
                    <form wire:submit.prevent="editCategory" class="forms-sample">
                      <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" style="color: white; background-color: black" class="form-control" placeholder="Fruits, Vegitables, ..." wire:model="category_name">
                        
                      </div>
                      <span class="text-danger">
                            @error('category_name') {{$message}} <br><br> @enderror
                        </span>
                        
                      <button type="submit" class="btn btn-primary mr-2">Update Category</button>
                      
                    </form>
                    <a style="margin-top: 5px;" wire:click="checkValueToFalse" class="btn btn-success">View Category</a>
                  </div>
                </div>
                @elseif($check=="view")
                <livewire:category-livewire :check="$check"/>
                @endif
</div>
