<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block;
        }
        .sclist{
            list-style: none;
        }
        .sclist li{
            line-height: 33px;
            border-bottom: 1px solid #ccc;
        }
        .slink i{
            font-size:16px;
            margin-left:12px;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> All Categories
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
                             All Categories
                            </div>
                            <div class="column-md-6">
                             <a href="{{route('admin.categories.add')}}" class="btn btn-success float-end">Add New categories</a>
                            </div>
                         </div>
                    </div>
                    <div class="card-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')    }}</div>
                        @endif
                        <table class="table table-srtiped">
                     <thead>
                   <tr>
                     <th>#</th>
                     <th>name</th>
                       <th>slug</th>
                        <th>sub category</th>
                        <th>action</th>
                      </tr>
                      </thead>
                     <tbody>
                        @php
                            $i=($categories->currentPage()-1)*$categories->perPage();
                        @endphp
    @foreach ($categories as $category )
    <td>{{  ++$i }}</td>
    <td>{{  $category->name  }}</td>
    <td>{{  $category->slug }}</td>
    <td>
        <ul class="sclist">
            @foreach($category->subCategories as $scategory)
                <li><i class="fa fa-caret-right"></i> {{$scategory->name}}
                    <a href="{{route('admin.categories.edit',['category_slug'=>$category->slug,'scategory_slug'=>$scategory->slug])}}" class="text-info"><i class="fa fa-edit"></i> Edit</a>
                    <a href="#" onclick="confirm('Are you sure you want to delete this subcategory?') || event.stopImmediatePropagation()" wire:click.prevent="deleteSubcategory({{$scategory->id}})" class="slink"><i class="fa fa-trash text-danger"></i> Delete</a>





                </li>
            @endforeach
        </ul>
    </td>
    <td>
        <a href="{{route('admin.categories.edit',['category_slug'=>$category->slug])}}" class="text-info">Edit</a>
        <a href="#" class="text-danger" style="margin-left:20px;" onclick="deleteConfirmation({{ $category->id}})">Delete</a>
    </td>
                     </tr>

    @endforeach
 </tbody>
         </table>
         {{  $categories->links() }}

                </div>
            </div>
            </div>
            </div>
            </div>
          </section>
    </main>
</div>
<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class=".modal-body pb-30 pt-30">
                <div class="row">
                   <div class=".col-md-12 text-center" >
                    <h4 class="pb-3">Do you want to delete this record</h4>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Cancel</button>
                    <button class="btn btn-danger" onclick="deleteCategory()">Delete</button>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function deleteConfirmation(id){
    @this.set('category_id',id);
     $('#deleteConfirmation').modal('show');
}
function deleteCategory(){
    @this.call('deleteCategory');
    $('#deleteConfirmation').modal('hide');


}

</script>

@endpush
