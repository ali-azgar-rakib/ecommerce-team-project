@extends('admin.admin_layout')


@section('adminMain')



<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <span class="breadcrumb-item active">Show Product</span>
    </nav>

    <div class="sl-pagebody">

        <div class="sl-pagebody">
            <div class="sl-page-title">

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">All Product
                    <div class="form-group pull-right">

                        <a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-success ">Add Product</a>
                        <a href="{{ route('admin.product.edit',$product->id) }}"
                            class="btn btn-sm btn-primary ">edit</a>
                        <a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-danger ">All
                            Product</a>
                    </div>
                </h6>

                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Name <span class="tx-danger">*</span></label>
                                <strong>{{ $product->product_name }}</strong>
                            </div>


                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Quantity </label>
                                <strong>{{ $product->product_quantity }}</strong>

                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Code <span class="tx-danger">*</span></label>
                                <strong>{{ $product->product_code }}</strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Category <span class="tx-danger">*</span></label>
                                <strong>{{ $product->category->category_name ?? 'Not Available' }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Sub Category </label>
                                \
                                <strong>{{ $product->sub_category ? $product->sub_category->sub_category_name:'Not Available' }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Brand</label>
                                \ <strong>{{ $product->brand ? $product->brand->brand_name:'Not Available' }}</strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Color <span class="tx-danger">*</span></label>
                                <strong>{{ $product->product_color }}</strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Size <span class="tx-danger">*</span></label>
                                <br />
                                <strong>{{ $product->product_size }}</strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Video Link </label>
                                <strong>{{ $product->video_link ?? 'Not Available' }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Product Details </label>
                                <div>{!! $product->product_details !!}</div>

                            </div>
                        </div><!-- col-12 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Selling Price <span class="tx-danger">*</span>
                                </label>
                                <strong>{{ $product->selling_price }}</strong>
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Discount Price </label>
                                <strong>{{ $product->discount_price ?? 'Not Available' }}</strong>
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="custom-file">

                                    <span>Thumbnail Image</span>
                                    <img width="200" src="{{ asset('img/media/products/'.$product->image_one) }}" />

                                </label>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="custom-file">

                                    <span>Secondary Image</span>
                                </label>
                                <img width="200" src="{{ asset('img/media/products/'.$product->image_two) }}" />

                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="custom-file">

                                    <span>Secondary Image</span>
                                </label>
                                <img width="100" src="{{ asset('img/media/products/'.$product->image_three) }}" />
                            </div>
                        </div><!-- col-4 -->
                    </div><!-- row -->

                    <div class="row my-5">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>
                                    @if ($product->main_slider == 1)
                                    <span class="badge badge-success badge-pill">active</span>

                                    @else
                                    <span class="badge badge-danger badge-pill">inactive</span>

                                    @endif
                                    <span>Main Slider</span>
                                </label>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>
                                    @if ($product->hot_deal == 1)
                                    <span class="badge badge-success badge-pill">active</span>

                                    @else
                                    <span class="badge badge-danger badge-pill">inactive</span>

                                    @endif
                                    <span>Hot Deal</span>
                                </label>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>
                                    @if ($product->best_rated == 1)
                                    <span class="badge badge-success badge-pill">active</span>

                                    @else
                                    <span class="badge badge-danger badge-pill">inactive</span>

                                    @endif
                                    <span>Best Rated</span>
                                </label>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>
                                    @if ($product->mid_slider == 1)
                                    <span class="badge badge-success badge-pill">active</span>

                                    @else
                                    <span class="badge badge-danger badge-pill">inactive</span>

                                    @endif
                                    <span>Mid Slider</span>
                                </label>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>
                                    @if ($product->hot_new == 1)
                                    <span class="badge badge-success badge-pill">active</span>

                                    @else
                                    <span class="badge badge-danger badge-pill">inactive</span>

                                    @endif
                                    <span>Hot New</span>
                                </label>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>
                                    @if ($product->trend == 1)
                                    <span class="badge badge-success badge-pill">active</span>

                                    @else
                                    <span class="badge badge-danger badge-pill">inactive</span>

                                    @endif
                                    <span>Trend</span>
                                </label>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>
                                    @if ($product->bogo == 1)
                                    <span class="badge badge-success badge-pill">active</span>

                                    @else
                                    <span class="badge badge-danger badge-pill">inactive</span>

                                    @endif
                                    <span>BOGO</span>
                                </label>
                            </div>
                        </div><!-- col-4 -->

                    </div>

                </div><!-- form-layout -->
                </form>
            </div><!-- card -->

        </div><!-- sl-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->
    </div>


    @endsection
