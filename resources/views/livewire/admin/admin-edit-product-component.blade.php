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
                    <span></span> Update Product
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
                            Edit product
                           </div>
                           <div class="column-md-6">
                            <a href="{{route('admin.products')}}" class="btn btn-success float-end">All products</a>
                           </div>
                        </div>
                    </div>
                    <div class="card-body">
                      @if(Session::has('message'))
                      <div class="alert alert-success" role="alert">{{ Session::get('message')}}</div>
                      @endif
                    <form wire:submit.prevent="updateProduct">
                      <div class="mb-3 mt-3">
                        <lable for="name" class="form-label">name</lable>
                        <input type="text" name="name" class="form-control" placeholder="Enter Product name" wire:model="name" wire:keyup="generateSlug" />
                        @error('name')
                        <p class="text-danger">{{ $message   }}</p>

                        @enderror
                      </div>
                      <div class="mb-3 mt-3">
                        <lable for="slug" class="form-label">slug</lable>
                        <input type="text" name="slug" class="form-control" placeholder="Enter Product slug" wire:model="slug"/>
                        @error('slug')
                        <p class="text-danger">{{ $message   }}</p>
                        @enderror
                      </div>

                      <div class="mb-3 mt-3">
                        <lable for="short_description" class="form-label">short description </lable>
                        <textarea name="short_description" class="form-control" placeholder="Enter short Description" wire:model="short_description"></textarea>
                        @error('short_description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>

                      <div class="mb-3 mt-3">
                        <lable for="description" class="form-label"> description </lable>
                        <textarea name="description" class="form-control" placeholder="Enter Description" wire:model="description"></textarea>
                        @error('description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>

                      <div class="mb-3 mt-3">
                        <lable for="regular_price" class="form-label">regular price</lable>
                        <input type="text" name="regular_price" class="form-control" placeholder="Enter regular price" wire:model="regular_price"/>
                        @error('regular_price')
                        <p class="text-danger">{{ $message   }}</p>
                        @enderror
                      </div>


                      <div class="mb-3 mt-3">
                        <lable for="sale_price" class="form-label">sale price</lable>
                        <input type="text" name="sale_price" class="form-control" placeholder="Enter sale price" wire:model="sale_price"/>
                        @error('sale_price')
                        <p class="text-danger">{{ $message   }}</p>
                        @enderror
                      </div>

                      <div class="mb-3 mt-3">
                        <lable for="sku" class="form-label">SKU</lable>
                        <input type="text" name="sku" class="form-control" placeholder="Enter sku" wire:model="sku"/>
                        @error('sku')
                        <p class="text-danger">{{ $message   }}</p>
                        @enderror
                      </div>


                      <div class="mb-3 mt-3">
                        <lable for="sku" class="form-label" wire:model="stock_status">Stock status</lable>
                        <select class="form-control" >
                            <option value="instock">instock </option>
                            <option value="outofstock"> out of stock </option>
                        </select>
                        @error('stock_status')
                        <p class="text-danger">{{ $message   }}</p>
                        @enderror
                      </div>

                      <div class="mb-3 mt-3">
                        <lable for="featured" class="form-label" >featured</lable>
                        <select class="form-control" name="featured" wire:model="featured" >
                            <option value="0">No</option>
                            <option value="1"> Yes </option>
                        </select>
                        @error('featured')
                        <p class="text-danger">{{ $message   }}</p>
                        @enderror
                      </div>




                      <div class="mb-3 mt-3">
                        <lable for="quntity" class="form-label">quntity</lable>
                        <input type="text" name="quntity" class="form-control" placeholder="Enter Product quntity" wire:model="quantity"/>
                        @error('quantity')
                        <p class="text-danger">{{ $message   }}</p>
                        @enderror
                      </div>

                      <div class="mb-3 mt-3">
                        <lable for="image" class="form-label">image</lable>
                        <input type="file" name="image" class="form-control" placeholder="Enter Product image" wire:model="newimage"/>
                        @if($newimage)
                        <img src="{{  $newimage->temporaryUrl()  }}" width="120"/>
                         @else
                         <img src="{{asset('assets/imgs/products') }}/{{ $image}}" width="120"/>

                        @endif
                        @error('newimage')
                        <p class="text-danger">{{ $message   }}</p>
                        @enderror
                      </div>

                      <div class="mb-3 mt-3">
                        <lable for="category_id" class="form-label">Category</lable>
                        <select class="form-control" name="category_id" wire:model="category_id">
                            <option value="">select category</option>
                            @foreach ($categories as $category )
                            <option value="{{  $category->id  }}">"{{  $category->name }}"</option>



                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-danger">{{ $message   }}</p>
                        @enderror
                      </div>

                       <button type="submit" class="btn btn-primary float-end">Update</button>
                    </form>

                </div>
            </div>
            </div>
            </div>
            </div>
          </section>
    </main>
</div>

