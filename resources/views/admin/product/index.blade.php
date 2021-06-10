@extends('admin.admin_layout')

@section('adminMain')


<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Tables</a>
        <span class="breadcrumb-item active">Data Table</span>
    </nav>
    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Brands List
            <a href="{{ route('admin.product.create') }}" class="btn btn-warning btn-sm " style="float: right">Add
                New</a>
        </h6>
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap text-center">
                <thead>
                    <tr>
                        <th class="wd-15p">Code</th>
                        <th class="wd-15p">Name</th>
                        <th class="wd-15p">Category</th>
                        <th class="wd-15p">Brand</th>
                        <th class="wd-15p">Image</th>
                        <th class="wd-15p">Status</th>
                        <th class="wd-20p">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key=>$product)


                    <tr>
                        <td>{{ $product->product_code }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->category->category_name }}</td>
                        <td>{{ $product->brand->brand_name }}</td>
                        <td><img width="50" src="{{ asset('img/media/products/'.$product->image_one) }}"
                                alt="{{ $product->brand_photo }}">
                        </td>
                        <td>
                            @if ($product->status == 1)
                            <span class="badge badge-pill badge-success">active</span>
                            @else
                            <span class="badge badge-pill badge-danger">deactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.product.edit',$product->id) }}" title="Edit"
                                class="btn btn-warning btn-sm " id="edit" data-id="{{ $product->id }}"><i
                                    class='fa fa-edit'></i></a>
                            <a href="{{ route('admin.product.show',$product->id) }}" title="View"
                                class="btn btn-primary btn-sm " data-id="{{ $product->id }}"><i
                                    class='fa fa-eye'></i></a>
                            @if ($product->status == 1)
                            <a href="{{ route('admin.product.status.change',$product->id) }}" title="Make Deactive"
                                class="btn btn-danger btn-sm " data-id="{{ $product->id }}"><i
                                    class='fa fa-arrow-down'></i></a>

                            @else
                            <a href="{{ route('admin.product.status.change',$product->id) }}" title="Make active"
                                class="btn btn-info btn-sm " data-id="{{ $product->id }}"><i
                                    class='fa fa-arrow-up'></i></a>

                            @endif


                            <form class="d-inline" method="post"
                                action="{{ route('admin.product.destroy',$product->id) }}">
                                @csrf
                                @method('delete')
                                <button title="delete" type="submit" class="btn btn-danger btn-sm"><i
                                        class="fa fa-trash"></i></button>
                            </form>


                            <!-- <button class="btn btn-sm btn-warning">edit</button> -->
                            <!-- <button class="btn btn-sm btn-danger" id='delete'>delete</button> -->
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- table-wrapper -->
    </div><!-- card -->







</div><!-- sl-pagebody -->

</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->


{{-- start modal here  --}}

<!-- LARGE MODAL -->
<div id="modaldemo3" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Message Preview</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('admin.brands.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body pd-20">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand Name</label>
                        <input name="brand_name" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Brand Name"
                            class="@error('brand_name') is-invalid @enderror">
                        @error('brand_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- photo  --}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand Photo</label>
                        <input name="brand_photo" type="file" class="form-control" id="exampleInputEmail1"
                            class="@error('brand_photo') is-invalid @enderror">
                        @error('brand_photo')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Add Category</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->
{{-- end modal here  --}}

<!-- LARGE MODAL for edit -->
<div id="modaldemo4" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Message Preview</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ url('/admin/product/updated') }}">
                @csrf

                <input type="hidden" id="dataid" name="id" value="">
                <div class="modal-body pd-20">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                        <input name="category_name" type="text" class="form-control" id="category_name"
                            aria-describedby="emailHelp" placeholder="Enter Category Name"
                            class="@error('category_name') is-invalid @enderror">
                        @error('category_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Update</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->
{{-- end modal here  --}}


@endsection
@section('script')

<script>
    $(document).ready(function() {

$("body").on('click',"#edit",function() {
    let id = $(this).data('id')
    $.get(`/admin/product/${id}/edit`,function(data) {
        $("#dataid").val(id)
        $("#category_name").val(data.category_name)
        $("#modaldemo4").modal('show')
    })

})

})
</script>

@endsection
