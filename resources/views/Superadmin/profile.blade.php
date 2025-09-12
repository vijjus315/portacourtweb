@extends('Superadmin.utils.master')
@section('title', 'Profile')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 d-flex justify-content-between">
                        <h1>Profile</h1>
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
                                    
                                    <div class="col-md-4">
                                        <div class="card card-primary card-outline p-3">
                                            <form class="form-horizontal"
                                                action="{{ route('updateprofile', auth::id()) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-12 control-label">Profile</label>
                                                    <div class="col-sm-12">
                                                        <input hidden id="file" name="profile" />
                                                        <div class="dropzone dropzone-file-area pt-4 pb-4 dotted-upload"
                                                            id="fileUpload" style="display:flex;justify-content:center">
                                                            <div class="dz-default dz-message">
                                                                {{-- <span>Drop A passport size image of user</span> --}}
                                                                <div class="position:relative top_icobs-encil"><img
                                                                        src="{{ asset('storage/' . $user->profile) }}"
                                                                        class="upload-imgshow">
                                                                    <span><input type="file" name="profile"
                                                                            class="upload_profile_data" /><i
                                                                            class="fas fa-pencil-alt edit_upload"
                                                                            aria-hidden="true"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-12 control-label">Name</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control" placeholder="Name" type="text"
                                                            name="name" value="{{ $user->name }}">
                                                    </div>
                                                </div>
                                                  <div class="form-group">
                                                    <label for="inputName" class="col-sm-12 control-label">Mobile</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control" placeholder="Mobile" type="text"
                                                            name="phone_no" value="{{ $user->phone_no }}" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)' maxlength="16">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail" class="col-sm-12 control-label">Email</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control" id="inputEmail" placeholder="Email"
                                                            type="email" value="{{ $user->email }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit"
                                                            class="btn btnsign_green toastrDefaultSuccess">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card card-primary card-outline p-3">
                                            <form class="form-horizontal" action="{{ route('changepass', auth::id()) }}"
                                                method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-12 control-label">Current
                                                        Password*</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control" required="" name="password"
                                                            placeholder="Enter Your current password" type="password">
                                                    </div>
                                                    <span style="color:red;">
                                                        @if ($errors->first('password'))
                                                            {{ $errors->first('password') }}
                                                        @endif
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail" class="col-sm-12 control-label">New
                                                        Password*</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control" required="" name="new_password"
                                                            placeholder="Enter Your new password" type="password">
                                                    </div>
                                                    <span style="color:red;">
                                                        @if ($errors->first('new_password'))
                                                            {{ $errors->first('new_password') }}
                                                        @endif
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit"
                                                            class="btn btn-primary btnsign_green toastrDefaultSuccess">Submit</button>
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
