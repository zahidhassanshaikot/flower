<!-- msater layout -->
@extends('back-end.layouts.master')
<!-- active menu -->

@section('user-list')
    active
@endsection

@section('main-content')

    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- page info start-->
            
                <div class="admin-section">
                    <div class="row clearfix m-t-30">
                        <div class="col-12">
                            <div class="navigation-list bg-white p-20">
                                <div class="add-new-header clearfix m-b-20">
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
                                    </div>
                                    <div class="row">
                                        <div class="block-header col-6">
                                            <h2>{{ __('users') }}</h2>
                                        </div>
                                        {{-- @can('Write')
                                            <div class="col-6 text-right">
                                                <a href="{{route('user-create')}}" class="btn btn-primary btn-sm"><i class="m-r-10 mdi mdi-account-plus"></i>{{__('add_user')}}</a>  
                                            </div>
                                        @endcan --}}
                                    </div>
                                </div>
                                <div class="table-responsive all-pages">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>{{ __('name') }}</th>
                                            <th>{{ __('email') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($users as $user)
                                       
                                            <tr role="row" id="row_{{ $user->id }}" class="odd">
                                                <td class="sorting_1">{{ $user->id}}</td>
                                                
                                                <td>{{ $user->name}}</td>
                                                <td>
                                                    {{$user->email}}</br>
                                                        @if($user->email_verified_at==null)
                                                            <small class="text-warning">({{ __('unconfirmed') }})</small>
                                                        @else
                                                            <small class="text-success">({{ __('confirmed') }})</small>
                                                        @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
            <!-- page info end-->
        </div>
    </div>
@endsection
