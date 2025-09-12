@extends('web.utils.master')
@section('content')
@section('head')
<title>{{$blog->meta_title}}</title>
<link rel="canonical" href="https://www.portacourts.com/blog-detail/{{ Request::segment(2) }}" />
<meta name="description" content="{{$blog->meta_description}}">
<?php echo $blog->schema;?> 
@endsection
<style>
    .author-section {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .author-info {
        display: flex;
        align-items: center;
    }

    .author-img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        margin-right: 10px;
        object-fit: cover;
        position: relative;
        border: 1px solid #ebebeb;
    }

    .shares-reads {
        text-align: center;
    }

    .shares-reads h5 {
        color: #6cbf2c;
        font-weight: bold;
        margin: 0;
    }

    .shares-reads small {
        font-size: 0.8rem;
        font-weight: 600;
    }
    .blogdetail-fluid {
    object-fit: inherit;
}
</style>
<section class="blog-detail-wrapper py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="fw-400 mb-4">{{$blog->title}}</h2>
                <!-- <div class="blog-icon-detail d-flex align-items-center justify-content-between mb-4">
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-flex mb-0 align-items-center gap-2 light-grey font-Yantramanav fw-400 f16">
                            <img src="{{url('/')}}/webassets/img/user-blue.svg"><span>{{$blog->author}}</span>
                        </div>
                        <div class="d-flex mb-0 align-items-center gap-2 light-grey font-Yantramanav fw-400 f16">
                            <img src="{{url('/')}}/webassets/img/calender-blue.svg"><span>{{date('M d, Y',strtotime($blog->created_at))}}</span>
                        </div>
                        <div class="d-flex mb-0 align-items-center gap-2 light-grey font-Yantramanav fw-400 f16">
                            <img src="{{url('/')}}/webassets/img/sport-blue.svg"><span>Sports</span>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex mb-0 align-items-center gap-2 light-grey font-Yantramanav fw-400 f16">
                            <img src="{{url('/')}}/webassets/img/comment-blue.svg"><span>{{count($comment)}}
                                Comments</span>
                        </div>
                    </div>
                </div> -->
                <div class="author-section mb-4">
                    <!-- Author Info -->
                    <div class="author-info">
                        <div class="position-relative">
                            <img src="{{url('/')}}/webassets/img/user-blue.svg" alt="Author Image" class="author-img">
                        </div>
                        <div>
                            <!-- <span class="text-success fw-bold"></span> -->
                            <h4 class="mb-0 fw-bold">{{$blog->author}}</h4>
                            <p class="text-muted mb-0">{{date('M d, Y',strtotime($blog->created_at))}}</p>
                        </div>
                    </div>

                    <!-- Shares and Reads -->
                    <div class="d-flex">
                        <div class="shares-reads me-4">
                            <h5>{{count($comment)}}</h5>
                            <small>Comments</small>
                        </div>
                        <!-- <div class="shares-reads">
                            <h5>2.2K</h5>
                            <small>Reads</small>
                        </div> -->
                    </div>
                </div>
                <div class="blog-detailbanner mb-4">
                    <img src="{{ asset('storage/' . $blog->image_url) ?? '' }}" class="blogdetail-fluid" alt="{{$blog->title}}" >
                </div>
                <div class="my-3">
                    <div class="row">
                        <div class="col-lg-4">
                            <!-- table content -->
                            <nav class="table-of-contents">
                                <h4 class="text-black">Table of Contents</h4>
                                <ul>
                                    <li><a href="#The Joy of Playing Tennis at Home">The Joy of Playing Tennis at Home</a>
                                        <ul>
                                            <li><a href="#font-families-used">Convenience and Accessibility</a></li>
                                            <li><a href="#font-families-used"> Consistent Practice</a></li>
                                            <li><a href="#font-families-used">Family Fun and Fitness</a></li>
                                            <li><a href="#font-families-used">Social Gatherings</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#The Joy of Playing Tennis at Home">The Joy of Playing Tennis at Home</a></li>
                                    <ul>
                                        <li><a href="#font-families-used">Convenience and Accessibility</a></li>
                                        <li><a href="#font-families-used"> Consistent Practice</a></li>
                                        <li><a href="#font-families-used">Family Fun and Fitness</a></li>
                                        <li><a href="#font-families-used">Social Gatherings</a></li>
                                    </ul>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <p class="fw-400"><?php echo  $blog->description; ?>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-9 mb-3">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="border-line"></div>
                        <h2 class="text-capitalize">COMMENTS</h2>
                    </div>
                    <div class="col-6 text-end">
                        <div class="sort-drop text-end gap-2">
                            <p class="fw-400 mb-0">Sort by :</p>

                            <div class="dropdown">
                                <button class="btn dropdown-toggle drop-btn-sort fw-500  border-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Newest
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item ">Recomended</a></li>
                                    <li><a class="dropdown-item ">What's New</a></li>
                                    <li><a class="dropdown-item ">Price: High to
                                            Low</a></li>
                                    <li><a class="dropdown-item ">Price: Low to
                                            High</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @foreach($comment as $singlecomment)
            <div class="col-lg-9">
                <div class="comment-section">
                    <div class="comment-inner-box">
                        <div>
                            <img src="{{ $singlecomment->user->profile ? asset('storage/' . $singlecomment->user->profile) : asset('/dummy.png') }}" class="profile-comment">
                        </div>
                        <div class="profile-name-comment">
                            <p class="f16 fw-500 text-black mb-0 lh-0  ">{{$singlecomment->user->name}}</p>
                            <p class="mb-0 fw-400 lh-0 mt-4">{{date('M, d Y',strtotime($singlecomment->created_at))}}</p>
                        </div>
                    </div>
                    <p class="mb-0 fw-400  pt-2 pt-sm-3 line-24 f16 description-div3 ">
                        {{$singlecomment->comment}}
                        <!-- <span class=" py-2"><a class="f16 fw-500 text-capitalize sky-blue-text read-more-btn3">read
                                more</a></span> -->
                    </p>

                    <hr>
                </div>
            </div>
            @endforeach
            <div class="col-lg-3">
                <div class="leavecomment bg-white p-4">
                    <h3>Leave A Comment</h3>
                    <form id="commentForm">
                        @csrf
                        <input type="hidden" id="blog_id" value="{{$blog->id}}">
                        <div class="form-group mb-4">
                            <label class="pb-2">Comment</label>
                            <textarea id="comment" name="comment" class="h-130 pt-2 form-control common-input resize-none" placeholder="Enter here"></textarea>
                            <span class="text-danger" id="comment-error"></span>
                        </div>
                        <div class="pt-4 pb-3">
                            <button type="button" class="btn green-btn w-100 box-shadow" id="submitComment">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#submitComment').on('click', function(e) {
            e.preventDefault();

            // Clear previous error messages
            $('.text-danger').text('');

            var formData = {
                comment: $('#comment').val(),
                blog_id: $('#blog_id').val(),
                _token: $('input[name="_token"]').val()
            };

            $.ajax({
                url: '{{ route("comment.submit") }}', // Replace with your route to submit the comment
                method: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message);
                        $('#commentForm')[0].reset(); // Clear the form
                        location.reload()
                    } else {
                        if (response.errors) {
                            // Display validation errors
                            $.each(response.errors, function(key, value) {
                                $('#' + key + '-error').text(value[0]);
                            });
                        } else {
                            toastr.error(response.message);
                        }
                    }
                },
                error: function() {
                    toastr.error('An error occurred. Please try again.');
                }
            });
        });
    });
</script>
@endsection