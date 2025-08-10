@extends('admin.layout.app')

@section('title', 'Admin Page')

@section('style')
    <style>
        .table>tbody>tr>td {
            padding: 0px !important;
            margin-bottom: 2px;
        }

        .iconsize {
            font-size: 15px;
        }

        

       

        .headbg > tr > th{
        background-color: #3c5236;
        color: #fff;
        padding: 2px !important;
        margin-bottom: 2px;
    }
    </style>
@endsection

@section('pageside')
  @include('admin.layout.sidebar',['page' => 'area'])
@endsection

@section('bodyContent')

    <div class="container">

        <div class="page-inner">

            <div class="card">
                <div class="card-header pt-1 pb-0">
                    <h4 class="text-center">Create Area</h4>
                </div>
                <form method="post">
                    @csrf
                    <div class="card-body p-3 ">
                            <div class="row mb-2">
                                    <div class="col-md-1 col-12 p-1">
                                        <div class="">
                                            <label for="name">Name :</label>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-11 col-12">
                                        <input type="text" class="form-control p-1 @error('name') is-invalid
                                        @enderror"  name="name" value="" placeholder="Enter Area Name">
                                        @error('question')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                        <div class="d-flex justify-content-end">
                            <input type="submit" value="Submit" class="btn btn-primary me-3 p-2">
                        </div>
                    </div>
                </form>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <h5 class="card-title ">ALL Areas</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="basic-datatables"
                                                class="display table table-striped table-hover dataTable" role="grid"
                                                aria-describedby="basic-datatables_info">
                                                <thead class="headbg">
                                                    <tr role="row bg-dark">
                                                        <th style="width: 136.031px;">SL NO:</th>
                                                        <th>Name</th>
                                                     
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                               
                                                <tbody>
                                                    @forelse($datas as $msg)
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">{{ $loop->iteration }}</td>
                                                            <td>{{ $msg->name }}</td>
                                                           
                                                            <td class="d-flex justify-content-center">

                                                                <form
                                                                    action="{{ route('admin.area.delete', ['id' => $msg->id]) }}"
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
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>









        </div>

@endsection

    @push('script')
        <script>


            
        </script>

    @endpush