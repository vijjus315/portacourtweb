@extends('Superadmin.utils.master')
@section('title', 'Add Product')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .border-addproduct {
        border: 1px solid #ced4da;
        border-radius: .25rem;
        padding: 14px 7px;
        margin: 23px 7px;
    }

    .cross-icon {
        position: absolute;
        top: -15px;
        right: -7px;
        font-size: 20px;
        cursor: pointer;
    }

    .addmore {
        background: transparent;
        font-size: 14px;
        font-weight: 600;
        border-radius: 5px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between">
                    <h1>Add Product</h1>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    @if (session()->has('message'))
    <div class="alert alert-success message">
        {{ session()->get('message') }}
    </div>
    @endif

    @if (session()->has('error'))
    <div class="alert alert-danger error">
        {{ session()->get('error') }}
    </div>
    @endif
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center ">
                <div class="col-md-12">
                    <div class="profilepage_show ">
                        <div class="card-body">
                            <div class="d-flex">

                                <div class="col-md-12">
                                    <div class="card card-primary card-outline p-3">
                                        <form class="form-horizontal" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-12 control-label">Category</label>
                                                <select class="custom-select" name="cat_id" required>
                                                    <option value="">Please select category</option>
                                                    @foreach($category as $singlecat)
                                                    <option value="{{$singlecat->id}}">{{$singlecat->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-12 control-label">Title</label>
                                                <div class="col-sm-12">
                                                    <input class="form-control" placeholder="Enter title" required type="text" name="title" value="">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center gap-3 my-2">
                                                <label for="inputName" class="control-label mb-0">Variant</label>
                                                <button class="addmore" type="button">Add More</button>
                                            </div>
                                            <div class="multipleattr">
                                                <div class="border-addproduct position-relative">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="inputName" class="col-sm-12 control-label">Length (ft)</label>
                                                                <div class="col-sm-12">
                                                                    <input class="form-control" placeholder="Enter length" required type="text" name="length[]" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="inputName" class="col-sm-12 control-label">Width (ft)</label>
                                                                <div class="col-sm-12">
                                                                    <input class="form-control" placeholder="Enter width" required type="text" name="width[]" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="inputName" class="col-sm-12 control-label">Thickness (mm)</label>
                                                                <div class="col-sm-12">
                                                                    <input class="form-control" placeholder="Enter thickness" required type="text" name="thickness[]" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="inputName" class="col-sm-12 control-label">Price</label>
                                                                <div class="col-sm-12">
                                                                    <input class="form-control" placeholder="Enter price" required type="number" name="price[]" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="inputName" class="col-sm-12 control-label">Discount(%)</label>
                                                                <div class="col-sm-12">
                                                                    <input class="form-control" placeholder="Enter discount" required type="number" name="discount[]" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="inputName" class="col-sm-12 control-label">Quantity</label>
                                                                <div class="col-sm-12">
                                                                    <input class="form-control" placeholder="Enter quantity" required type="text" name="quantity[]" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="cross-icon">
                                                        <i class="fa fa-times-circle-o removevarient" aria-hidden="true"></i>
                                                    </div> -->
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-12 control-label">Description</label>
                                                <div class="col-sm-12">
                                                    <textarea class="summernote" required type="text" name="description"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail" class="col-sm-12 control-label">Photos</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="images[]" required multiple accept="image/*">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                            </div>
                                   
                                            <div class="form-group">
                                                <label for="inputEmail" class="col-sm-12 control-label">Video</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="video" accept="video/*">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-12 control-label">Status</label>
                                                <select class="custom-select" name="status" required>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-12 control-label">Is Featured</label>
                                                <div class="col-sm-12">
                                                    <input class="" type="checkbox" name="is_featured" value="1"> Yes
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary btnsign_green toastrDefaultSuccess">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $(".addmore").click(function() {
            $('.multipleattr').append('<div class="border-addproduct position-relative"> <div class="row"> <div class="col-6"> <div class="form-group"> <label for="inputName" class="col-sm-12 control-label">Length (ft)</label> <div class="col-sm-12"> <input class="form-control" placeholder="Enter length" required type="text" name="length[]" value=""> </div> </div> </div> <div class="col-6"> <div class="form-group"> <label for="inputName" class="col-sm-12 control-label">Width (ft)</label> <div class="col-sm-12"> <input class="form-control" placeholder="Enter width" required type="text" name="width[]" value=""> </div> </div> </div> <div class="col-6"> <div class="form-group"> <label for="inputName" class="col-sm-12 control-label">Thickness (mm)</label> <div class="col-sm-12"> <input class="form-control" placeholder="Enter thickness" required type="text" name="thickness[]" value=""> </div> </div> </div> <div class="col-6"> <div class="form-group"> <label for="inputName" class="col-sm-12 control-label">Price</label> <div class="col-sm-12"> <input class="form-control" placeholder="Enter price" required type="number" name="price[]" value=""> </div> </div> </div> <div class="col-6"> <div class="form-group"> <label for="inputName" class="col-sm-12 control-label">Discount(%)</label> <div class="col-sm-12"> <input class="form-control" placeholder="Enter discount" required type="number" name="discount[]" value=""> </div> </div> </div> <div class="col-6"> <div class="form-group"> <label for="inputName" class="col-sm-12 control-label">Quantity</label> <div class="col-sm-12"> <input class="form-control" placeholder="Enter quantity" required type="text" name="quantity[]" value=""> </div> </div> </div> </div> <div class="cross-icon"> <i class="fa fa-times-circle-o removevarient" aria-hidden="true"></i> </div> </div>');
        });

        $(document).on("click", ".removevarient", function() {
            $(this).parent().parent().remove();
        });
    });
</script>
@endsection