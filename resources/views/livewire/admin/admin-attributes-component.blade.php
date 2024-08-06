
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
                    <span></span> All Attributes
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
                             All Attributes
                            </div>
                            <div class="column-md-6">
                                <a href="{{route('admin.add_attribute')}}" class="btn btn-success pull-right">Add New</a>
                            </div>
                         </div>
                    </div>
                    <div class="card-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')    }}</div>
                        @endif
                          <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=($pattributes->currentPage()-1)*$pattributes->perPage();
                            @endphp
                                @foreach ($pattributes as $pattribute)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$pattribute->name}}</td>
                                        <td>{{$pattribute->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.edit_attribute',['attribute_id'=>$pattribute->id])}}"><i class="fa fa-edit fa-2x"></i></a>
                                            <a href="#" onclick="confirm('Are you sure, You want to delete this Attribte?') || event.stopImmediatePropagation()" wire:click.prevent="deleteAttribute({{$pattribute->id}})" style="margin-left:10px; "><i class="fa fa-times fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
         {{  $pattributes->links() }}

                </div>
            </div>
            </div>
            </div>
            </div>
          </section>
    </main>
</div>




