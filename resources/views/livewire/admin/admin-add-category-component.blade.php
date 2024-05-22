<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Add New Category
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <div class="card">
                    <div class="card-header">
                        <div class="row">
                           <div class="column-md-6">
                            Add New Category
                           </div>
                           <div class="column-md-6">
                            <a href="{{route('admin.categories')}}" class="btn btn-success float-end">All categories</a>
                           </div>
                        </div>
                    </div>
                    <div class="card-body">
                      @if(Session::has('message'))
                      <div class="alert alert-success" role="alert">{{ Session::get('message')}}</div>
                      @endif
                    <form wire:submit.prevent="storeCategory">
                      <div class="mb-3 mt-3">
                        <lable for="name" class="form-label">name</lable>
                        <input type="text" name="name" class="form-control" placeholder="Enter Category name" wire:model="name" wire:keyup="generateSlug" />
                        @error('name')
                        <p class="text-danger">{{ $message   }}</p>

                        @enderror
                      </div>
                      <div class="mb-3 mt-3">
                        <lable for="slug" class="form-label">slug</lable>
                        <input type="text" name="slug" class="form-control" placeholder="Enter Category slug" wire:model="slug"/>
                        @error('slug')
                        <p class="text-danger">{{ $message   }}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label class="col-md-4 control-label">Parent Category</label>
                        <div class="col-md-4">
                            <select class="form-control input-md" wire:model="category_id">
                                {{-- The wire:model attribute is used to bind the selected value to the category_id property in the Livewire component. --}}
                                <option value="">None</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                       <button type="submit" class="btn btn-primary float-end">submit</button>
                    </form>

                </div>
            </div>
            </div>
            </div>
            </div>
          </section>
    </main>
</div>
