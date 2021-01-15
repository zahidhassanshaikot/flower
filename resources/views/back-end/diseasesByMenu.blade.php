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
                                    <div class="col-12 col-lg-5">
                                        {!!  Form::open(['route'=>'save-new-disease','method' => 'post','enctype'=>'multipart/form-data']) !!} 
                                            <div class="add-new-page  bg-white p-20 m-b-20">
                                                <div class="block-header">
                                                    <h4>Add Disease</h4>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="name" class="col-form-label">{{ __('Name') }}</label>
                                                        <input id="name" name="name" type="text" class="form-control" required>
                                                        <input name="menu_id" value="{{ $menu_id }}" type="hidden" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="description" class="col-form-label">{{ __('Type') }}</label>
                                                        <select class="form-control" name="type">
                                                            <option value="3">Common</option>
                                                            <option value="2">Balconies</option>
                                                            <option value="1">Garden</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="image" class="col-form-label">{{ __('Image') }}</label>
                                                        <input id="image" name="image" type="file" class="form-control">
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-12 m-t-20">
                                                        <div class="form-group form-float form-group-sm text-right">
                                                            <button type="submit" name="btnsubmit" class="btn btn-primary pull-right"><i class="m-r-10 mdi mdi-plus"></i>Add disease</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>  
                                        {!! Form::close() !!}
                                        </div>
                                    <!-- Main Content section end -->

                                    <!-- right sidebar start -->
                                    <div class="col-12 col-lg-7">
                                        <div class="row">
                                            <!-- ============================================================== -->
                                            <!-- data table multiselects  -->
                                            <!-- ============================================================== -->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">Disease List </h5>
                                                        
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table id="example4" class="table table-striped table-bordered" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Image</th>
                                                                        <th>Name</th>
                                                                        <th>Status</th>
                                                                        <th>Type</th>
                                                                        <th>Options </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($diseases as $disease)
                                                            <tr role="row" class="odd" id="row_{{ $disease->id }}">
                                                                <td>
                                                                    @if($disease->image != null)
                                                                        <img src=" {{ asset($disease->image) }} " style="height: 64px;width: 64px" alt="user" class="img-responsive ">
                                                                    @else
                                                                        <img src="{{ asset('default-image/default.jpg') }}" style="height: 64px;width: 64px" alt="user" class="img-responsive">
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('treatment-by-disease',['id'=>$disease->id]) }}">{{ $disease->name }}</a>
                                                                </td>
                                                                <td> @if($disease->status==1) Active @else Inactive @endif</td>
                                                                <td> @if($disease->type==1) Garden @elseif($disease->type==2) Balconies @else Common @endif</td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <button class="btn bg-primary dropdown-toggle btn-select-option" type="button" data-toggle="dropdown">...
                                                                            <span class="caret"></span>
                                                                        </button>
                                                                        <ul class="dropdown-menu options-dropdown">
                                                                            <li>
                                                                                <a href="{{ route('treatment-by-disease',['id'=>$disease->id]) }}"><i class="fa fa-trash option-icon"></i>Treatment</a>
                                                                            </li>
                                                                            {{-- <li>
                                                                                <a href="{{ route('edit-menu',['id'=>$disease->id]) }}"><i class="fa fa-trash option-icon"></i>Edit</a>
                                                                            </li> --}}
                                                                            <li>
                                                                                <a href="{{ route('disease-delete',['id'=>$disease->id]) }}"><i class="fa fa-trash option-icon"></i>Delete</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="{{ route('disease-status-change',['id'=>$disease->id]) }}"><i class="fa fa-trash option-icon"></i>Status Change</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr> 
                                                        @endforeach
                                                                    
                                                                </tbody>
                                                                
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ============================================================== -->
                                            <!-- end data table multiselects  -->
                                            <!-- ============================================================== -->
                                        </div>
                                    
                                    <!-- right sidebar end -->
                                </div>
                            </div>
                        </div>
                    <!-- page info end-->
                </div>
            </div>

@endsection
@section('script')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset("assets") }}/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset("assets") }}/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset("assets") }}/vendor/datatables/js/data-table.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>

@endsection