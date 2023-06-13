<div>

                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Category</h4>
                    <form wire:submit.prevent="addCategory" class="forms-sample">
                      <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control" placeholder="Fruits, Vegitables, ..." wire:model="category_name">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Add Category</button>
                      
                    </form>
                  </div>
                </div>
              
</div>
