@extends('admin.admin_layout')


@section('adminMain')

@push('css')

<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />
<link href="{{ asset('backend') }}/lib/summernote/summernote-bs4.css" rel="stylesheet">
@endpush


<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Add Product</span>
    </nav>

    <div class="sl-pagebody">

        <div class="sl-pagebody">
            <div class="sl-page-title">

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Add Product
                    <a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-success pull-right">All
                        Product</a>
                </h6>
                <form action="{{ route('admin.product.store') }}" method='post' enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_name"
                                        placeholder="Enter Product Name" value="{{ old('product_name') }}">
                                    @error('product_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Quantity <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_quantity"
                                        value="{{ old('product_quantity') }}" placeholder="Enter Product Quantity">
                                    @error('product_quantity')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_code"
                                        value="{{ old('product_code') }}" placeholder="Enter Product Code">
                                    @error('product_code')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category <span class="tx-danger">*</span></label>
                                    <select name="category_id" class="form-control select2"
                                        data-placeholder="Chose Category">
                                        <option selected disabled label="Choose Category"></option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach

                                    </select>
                                    @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Sub Category </label>
                                    <select name="sub_category_id" class="form-control select2"
                                        data-placeholder="Chose Sub Category">

                                    </select>
                                    @error('sub_category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Brand</label>
                                    <select name="brand_id" class="form-control select2"
                                        data-placeholder="Chose a Brand">
                                        <option selected disabled label="Choose Brand"></option>
                                        @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                        @endforeach

                                    </select>
                                    @error('brand_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Color <span
                                            class="tx-danger">*</span></label>
                                    <input id='product_color' class="form-control" type="text" name="product_color"
                                        data-role="tagsinput" value="{{ old('product_color') }}">
                                    @error('product_color')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Size <span
                                            class="tx-danger">*</span></label>
                                    <br />
                                    <input id='product_size' class="form-control" type="text" name="product_size"
                                        data-role="tagsinput" value="{{ old('product_size') }}">
                                    @error('product_size')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Video Link </label>
                                    <input class="form-control" type="text" name="video_link"
                                        value="{{ old('video_link') }}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Product Details <span
                                            class="tx-danger">*</span></label>
                                    <textarea id="summernote" name="product_details"
                                        value='{{ old('product_details') }}'>
                                    </textarea>
                                    @error('product_details')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- col-12 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Selling Price <span class="tx-danger">*</span>
                                    </label>
                                    <input class="form-control" type="text" name="selling_price"
                                        value="{{ old('selling_price') }}">
                                    @error('selling_price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Discount Price </label>
                                    <input class="form-control" type="text" name="discount_price"
                                        value="{{ old('discount_price') }}">
                                    @error('discount_price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="custom-file">
                                        <input type="file" name="image_one" class="custom-file-input"
                                            onchange="readUrl(this);">
                                        <span class="custom-file-control">Thumbnail Image</span>
                                        <img src='' id='one' />
                                        @error('image_one')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </label>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="custom-file">
                                        <input type="file" name="image_two" class="custom-file-input"
                                            onchange="readUrlTwo(this)">
                                        <span class="custom-file-control">Secondary Image</span>
                                    </label>
                                    <img src='' id='two' />
                                    @error('image_two')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="custom-file">
                                        <input type="file" name="image_three" class="custom-file-input"
                                            onchange="readUrlThree(this)">
                                        <span class="custom-file-control">Secondary Image</span>
                                    </label>
                                    <img src='' id='three' />
                                    @error('image_three')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                        </div><!-- row -->

                        <div class="row my-5">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" value="1" name="main_slider">
                                        <span>Main Slider</span>
                                    </label>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" value="1" name="hot_deal">
                                        <span>Hot Deal</span>
                                    </label>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" value="1" name="best_rated">
                                        <span>Best Rated</span>
                                    </label>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" value="1" name="mid_slider">
                                        <span>Mid Slider</span>
                                    </label>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" value="1" name="hot_new">
                                        <span>Hot New</span>
                                    </label>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" value="1" name="hot_new">
                                        <span>Trend</span>
                                    </label>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" value="1" name="bogo">
                                        <span>BOGO</span>
                                    </label>
                                </div>
                            </div><!-- col-4 -->

                        </div>

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Submit Form</button>
                            <button class="btn btn-secondary">Cancel</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </form>
            </div><!-- card -->

        </div><!-- sl-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->
    </div>

    @section('script')
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script src="{{ asset('backend') }}/lib/summernote/summernote-bs4.min.js"></script>
    <script type="text/javascript">
        $('#summernote').summernote({
        height: 150
        });

        $(document).ready(function(){
            $('select[name="category_id"]').on('change',function(){
                var category_id = $(this).val();
                if (category_id) {

                $.ajax({
                    url: "{{ url('/admin/get/subcategory/') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    var d =$('select[name="sub_category_id"]').empty();
                    $.each(data, function(key, value){

                    $('select[name="sub_category_id"]').append('<option value="'+ value.id + '">' + value.sub_category_name + '</option>');

                    });
                    },
                });

                }else{
                alert('danger');
                }

                });

            });

    </script>

    <script>
        function readUrl(input)
        {
            console.log('in function');
            if(input.files && input.files[0]){
                console.log('in fille');
                let reader = new FileReader();
                reader.onload = function(e){
                    $('#one').attr('src',e.target.result).width(80).height(80);
                }
                reader.readAsDataURL(input.files[0])
            }
        }
        function readUrlTwo(input)
        {
            console.log('in function');
            if(input.files && input.files[0]){
                console.log('in fille');
                let reader = new FileReader();
                reader.onload = function(e){
                    $('#two').attr('src',e.target.result).width(80).height(80);
                }
                reader.readAsDataURL(input.files[0])
            }
        }
        function readUrlThree(input)
        {
            console.log('in function');
            if(input.files && input.files[0]){
                console.log('in fille');
                let reader = new FileReader();
                reader.onload = function(e){
                    $('#three').attr('src',e.target.result).width(80).height(80);
                }
                reader.readAsDataURL(input.files[0])
            }
        }
    </script>


    @endsection

    @endsection
