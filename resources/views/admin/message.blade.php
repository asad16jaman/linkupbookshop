@extends('admin.layout.app')

@section('title', 'Admin Page')

@section('pageside')
  @include('admin.layout.sidebar',['page' => 'contact'])
@endsection

@section('style')
    <style>
        .table>tbody>tr>td {
            padding: 0px !important;
            margin-bottom: 2px;
        }

        .iconsize {
            font-size: 15px;
        }

        .profileImg {
            width: auto;
            height: 100px;
            object-fit: cover;
            border: 2px dashed #ccc;
            border-radius: 6px;
        }

        .tablepicture {
            width: 30px;
            height: 30px;
            object-fit: fill;
        }

        
        .headbg > tr > th{
        background-color: #3c5236;
        color: #fff;
        padding: 2px !important;
        margin-bottom: 2px;
    }
    </style>
@endsection

@section('bodyContent')

    <div class="container">
        <div class="page-inner" style="padding:0px 10px!important">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <h5 class="card-title ">ALL Messages</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                    <div class="row " style="min-height:350px">
                                        <div class="col-sm-12">
                                            <table id="basic-datatables"
                                                class="display table table-striped table-hover dataTable" role="grid"
                                                aria-describedby="basic-datatables_info">
                                                <thead class="headbg">
                                                    <tr role="row bg-dark">
                                                        <th style="width: 136.031px;">SL NO:</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Subject</th>
                                                        <th>Message</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @forelse($message as $msg)
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">{{ $loop->iteration }}</td>
                                                            <td>{{ $msg->name }}</td>
                                                            <td>{{ $msg->email }}</td>
                                                            <td>{{ $msg->subject }}</td>
                                                            <td>{{ $msg->message }} </td>
                                                            <td>{{ $msg->created_at->format('d-m-Y h:ia') }}</td>
                                                            <td class="d-flex justify-content-center">

                                                                <form
                                                                    action="{{ route('admin.message.delete', ['id' => $msg->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <!-- <input type="submit" value="Delete"> -->
                                                                    <button type="submit" class="btn btn-danger p-1"><i
                                                                            class="fas fa-trash-alt iconsize"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <p>there is no Message</p>

                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-center">
                                            

                                            @if($message->previousPageUrl())
                                                <a href="{{$message->previousPageUrl()}}" class="btn btn-primary mx-2 p-1"><i class="fas fa-hand-point-left"></i></a>
                                            @endif

                                            @if($message->nextPageUrl())
                                                <a href="{{ $message->nextPageUrl() }}" class="btn btn-primary p-1"><i class="fas fa-hand-point-right "></i></a>
                                            @endif
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

    @push('script')


    @endpush