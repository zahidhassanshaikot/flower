@extends('back-end.layouts.master')

@section('menu-list')
    active
@endsection


@section('main-content')

            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- page info start-->
                        <div class="row clearfix">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        @if(session('error'))
                                            <div id="error_m" class="alert alert-danger">
                                                {{session('error')}}
                                            </div>
                                        @endif
                                        @if(session('success'))
                                            <div id="success_m" class="alert alert-success">
                                                {{session('success')}}
                                            </div>
                                        @endif
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- Main Content section start -->
                                    <div class="col-12 col-lg-12">
                                        {!!  Form::open(['route'=>'update-menu','method' => 'post','enctype'=>'multipart/form-data']) !!} 
                                            <div class="add-new-page  bg-white p-20 m-b-20">
                                                <div class="block-header">
                                                    <h4>Add menu</h4>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="name" class="col-form-label">{{ __('Name') }}</label>
                                                        <input id="name" name="name" value="{{ $menu->name }}" type="text" class="form-control" required>
                                                        <input id="id" name="id" value="{{ $menu->id }}" type="hidden" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="description" class="col-form-label">{{ __('Description') }}</label>
                                                        <input id="description" name="description" value="{{ $menu->description }}" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group text-center"> 
                                                        @if($menu->image != Null)
                                                           <img src="{{ asset($menu->image) }}" data-index="0" style="height: 64px;width: 64px" alt="img">
                                                        @else 
                                                           <img src="{{ asset('default-image/default.jpg') }}" style="height: 64px;width: 64px" data-index="0" alt="user" class="img-responsive ">
                                                       @endif
                                                   </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="image" class="col-form-label">{{ __('Image') }}</label>
                                                        <input id="image" name="image" type="file" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row p-l-15">
                                                    <div class="col-12 col-md-4">
                                                        <div class="form-title">
                                                            <label for="status">{{ __('Status') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 col-md-2">
                                                        <label class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" name="status"
                                                                    value="1"
                                                                   class="custom-control-input"
                                                                   @if ($menu->status==1)
                                                                   checked="checked"
                                                                @endif
                                                            >
                                                            <span class="custom-control-label">{{ __('Active') }}</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-3 col-md-2">
                                                        <label class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" name="status"
                                                                   value="0"
                                                                   class="custom-control-input"
                                                                   @if ($menu->status==0)
                                                                   checked="checked"
                                                                @endif
                                                            >
                                                            <span class="custom-control-label">{{ __('Inactive')}}</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-12 m-t-20">
                                                        <div class="form-group form-float form-group-sm text-right">
                                                            <button type="submit" name="btnsubmit" class="btn btn-primary pull-right"><i class="m-r-10 mdi mdi-plus"></i>Add Menu</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>  
                                        {!! Form::close() !!}
                                        </div>
                                    <!-- Main Content section end -->
                                </div>
                            </div>
                        </div>
                    <!-- page info end-->
                </div>
            </div>

@endsection
