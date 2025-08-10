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


        .headbg>tr>th {
            background-color: #3c5236;
            color: #fff;
            padding: 2px !important;
            margin-bottom: 2px;
        }
    </style>
@endsection

@section('pageside')
    @include('admin.layout.sidebar', ['page' => 'pending'])
@endsection




@section('bodyContent')

    <div class="container">

        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <h5 class="card-title ">
                                ALL Pending Dealers
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <div class="row">

                                        <div class="col-sm-12 col-md-6 offset-md-6">
                                            <div id="basic-datatables_filter" class="dataTables_filter">
                                                <label class="d-flex justify-content-end">Search:
                                                    <form>

                                                        <input type="search" value="{{ request()->query('search') }}"
                                                            name="search" class="form-control form-control-sm"
                                                            placeholder="" aria-controls="basic-datatables">
                                                    </form>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="min-height:350px">
                                        <div class="col-sm-12">
                                            <table id="basic-datatables"
                                                class="display table table-striped table-hover dataTable" role="grid"
                                                aria-describedby="basic-datatables_info">
                                                <thead class="headbg">
                                                    <tr role="row bg-dark">
                                                        <th style="width: 136.031px;">SL NO:</th>

                                                        <th style="width: 214.469px;">Name</th>
                                                        <th style="width: 214.469px;">Org. Name</th>
                                                        <th style="width: 214.469px;">Phone</th>
                                                        <th style="width: 214.469px;">Email</th>
                                                        <th style="width: 314.469px;">Area</th>
                                                        <th style="width: 314.469px;">Address</th>
                                                        <th style="width: 81.375px;">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    @forelse($alldelears as $dealer)
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">{{ $loop->iteration }}</td>
                                                            <td>{{ $dealer->name }}</td>
                                                            <td>{{ $dealer->company_name }}</td>
                                                            <td>{{ $dealer->phone }}</td>
                                                            <td>{{ $dealer->email }}</td>
                                                            <td>{{ $dealer->area->name }}</td>
                                                            <td>{{ $dealer->address }}</td>


                                                            <td class="d-flex justify-content-center">

                                                                <form method="post" action="{{ route('admin.p_delear.updated',['id'=>$dealer->id]) }}">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-info p-1 me-1"><i class="fas fa-check"></i></button>
                                                                </form>
                                                                    
                                                                <form
                                                                    action="{{ route('admin.delear.delete', ['id' => $dealer->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <!-- <input type="submit" value="Delete"> -->
                                                                    <button type="submit" class="btn btn-danger p-1"><i
                                                                            class="fas fa-trash-alt iconsize"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <p>there is no users</p>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end me-2">
                                            @if ($alldelears->previousPageUrl())
                                                <a href="{{ $alldelears->previousPageUrl() }}"
                                                    class="btn btn-primary mx-2 p-1"><i class="fas fa-hand-point-left"></i></a>
                                            @endif

                                            @if ($alldelears->nextPageUrl())
                                                <a href="{{ $alldelears->nextPageUrl() }}" class="btn btn-primary mx-2 p-1"><i
                                                        class="fas fa-hand-point-right "></i></a>
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

    