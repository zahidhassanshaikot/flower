@extends('back-end.layouts.master')

@section('message')
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
                                    <!-- right sidebar start -->
                                    <div class="col-12 col-lg-12">
                                        <div class="row">
                                            <!-- ============================================================== -->
                                            <!-- data table multiselects  -->
                                            <!-- ============================================================== -->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">Sender List </h5>
                                                        
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table id="example4" class="table table-striped table-bordered" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Email</th>
                                                                        <th>Last Message</th>
                                                                        <th>Send At</th>
                                                                        <th>Options </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($users as $user)
                                                            <tr role="row" class="odd" id="row_{{ $user->id }}">
                                                                
                                                                <td><a href="#">{{ $user->sender_name }}</a> </td>
                                                                <td> {{ $user->email }}</td>
                                                                <td> {{ $user->message }}</td>
                                                                <td> {{ $user->created_at }}</td>
                                                                <td>
                                                                    <a href="{{ route('view-message-details',['user_id'=>$user->sender_id]) }}" class="btn btn-xs btn-primary"><i class="fas fa-reply "></i> Reply</a>
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