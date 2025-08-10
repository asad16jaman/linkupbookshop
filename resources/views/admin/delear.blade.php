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
    @include('admin.layout.sidebar', ['page' => 'approve'])
@endsection




@section('bodyContent')

    <div class="container">

        <div class="page-inner">

            <div class="card mb-1">
                <div class="card-header pt-1 pb-0">
                    <h4 class="text-center">Create Dealers</h4>
                </div>
                <form method="post">
                    @csrf
                    <div class="card-body p-3 ">
                        <div class="row">

                            <div class="col-md-6 col-12">
                                <!-- name  -->
                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="email2">Name :</label>

                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <input type="text" class="form-control p-1 @error('name') is-invalid
                                        @enderror" name="name" value="{{ old('name', optional($editItem)->name) }}"
                                            placeholder="Enter Product Name">
                                        @error('name')
                                            <p class="text-danger">{{  $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                                <!-- organization name  -->
                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="email2">Org. Name :</label>

                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <input type="text" class="form-control p-1 @error('company_name') is-invalid
                                        @enderror" name="company_name"
                                            value="{{ old('company_name', optional($editItem)->company_name) }}"
                                            placeholder="Enter Product Company Name">
                                        @error('company_name')
                                            <p class="text-danger">{{  $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                                <!-- phone -->
                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="email2">Phone :</label>

                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <input type="text" class="form-control p-1 @error('phone') is-invalid
                                        @enderror" name="phone" value="{{ old('phone', optional($editItem)->phone) }}"
                                            placeholder="Enter Phone Number">
                                        @error('phone')
                                            <p class="text-danger">{{  $message }}</p>
                                        @enderror

                                    </div>
                                </div>

                                <!-- phone2 -->
                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="">Phone2 :</label>

                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <input type="text" class="form-control p-1 @error('phone2') is-invalid
                                        @enderror" name="phone2"
                                            value="{{ old('phone2', optional($editItem)->phone2) }}"
                                            placeholder="Enter Phone Number">
                                        @error('phone2')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- status -->
                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="">Status :</label>

                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">


                                        <select name="status" class="form-control p-1" id="">
                                            <option value="a">Approve</option>
                                            <option value="p">Pending</option>
                                            <!-- <option value="r">Reject</option> -->
                                        </select>


                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6 col-12">
                                <!-- email -->
                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="">Email :</label>

                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <input type="email" class="form-control p-1 @error('email') is-invalid
                                        @enderror" name="email" value="{{ old('email', optional($editItem)->email) }}"
                                            placeholder="Enter Your Email">
                                        @error('email')
                                            <p class="text-danger">{{  $message }}</p>
                                        @enderror

                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="">Website :</label>

                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <input type="text" class="form-control p-1" name="website"
                                            value="{{ old('website', optional($editItem)->website) }}"
                                            placeholder="Enter Website Link">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="email2">Area :</label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <select name="area_id" class="form-control p-1" id="">
                                            @if($editItem)
                                                @foreach ($areas as $area)

                                                    <option value="{{ $area->id }}" @selected($editItem->area_id == $area->id)>
                                                        {{ $area->name }}
                                                    </option>
                                                @endforeach

                                            @else

                                                @foreach ($areas as $area)

                                                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                                                @endforeach

                                            @endif


                                        </select>
                                        @error('area')
                                            <p class="text-danger">{{  $message }}</p>
                                        @enderror

                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="email2">Address :</label>

                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <textarea name="address" class="form-control @error('address') is-invalid
                                        @enderror" rows="1" id=""
                                            placeholder="Enter Address">{{ old('address', optional($editItem)->address)}}</textarea>
                                        @error('address')
                                            <p class="text-danger">{{  $message }}</p>
                                        @enderror

                                    </div>
                                </div>
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
                            <h5 class="card-title ">
                                ALL Approved Dealers
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
                                    <div class="row">
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

                                                                    <a href="{{ route('admin.delear', ['id' => $dealer->id, 'page' => request()->query('page'), 'search' => request()->query('search')]) }}"
                                                                        class="btn btn-info p-1 me-1">
                                                                        <i class="fas fa-edit iconsize"></i>
                                                                    </a>
                                                                
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
