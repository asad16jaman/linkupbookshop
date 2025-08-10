@extends('admin.layout.app')

@section('title', 'Admin Page')

@section('style')
    <style>
        .table > tbody > tr > td{
            padding: 0px !important;
            margin-bottom: 2px;
        }
        .iconsize{
            font-size: 15px;
        }
        .profileImg{
            width: auto;
            height: 100px; 
            object-fit: cover;
            border: 2px dashed #ccc;
            border-radius: 6px;
        }
        .tablepicture{
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

        .productimages {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .preview-img {
        position: relative;
        display: inline-block;
    }
    .preview-img img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .preview-img .remove-btn {
        position: absolute;
        top: -5px;
        right: -5px;
        background: red;
        color: white;
        border: none;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        font-size: 12px;
        cursor: pointer;
    }

    </style>
@endsection

@section('pageside')
      @include('admin.layout.sidebar', ['page' => 'bestsel'])
@endsection

@section('bodyContent')
    <div class="container">
        <div class="page-inner">
           


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <h5 class="card-title ">Best Sell Books</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <div class="row">

                                        <div class="col-sm-12 col-md-6 offset-md-6">
                                            <div id="basic-datatables_filter" class="dataTables_filter">
                                                <!-- <label class="d-flex justify-content-end">Search:
                                                    <form>

                                                        <input type="search" value=" request()->query('search') }}" name="search" class="form-control form-control-sm"
                                                            placeholder="" aria-controls="basic-datatables">
                                                    </form>
                                                </label> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="basic-datatables"
                                                class="display table table-striped table-hover dataTable" role="grid"
                                                aria-describedby="basic-datatables_info">
                                                <thead class="headbg">
                                                    <tr role="row bg-dark" >
                                                        <th style="width: 136.031px;">SL NO:</th>
                                                        <th style="width: 35.875px;">Image</th>
                                                        <th style="width: 214.469px;">Name</th>
                                                        <th style="width: 214.469px;">Author</th>
                                                        <th style="width: 214.469px;">Price</th>
                                                         <th style="width: 214.469px;">Discount</th>
                                                        <th style="width: 101.219px;">Category</th>
                                                        <th style="width: 101.219px;">BestSell</th>
                                                        
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                @forelse($bestsells as $bestsel)
                                                    @php
                                                        $product = $bestsel->book;
                                                    @endphp
                                                    <tr role="row" class="odd" >
                                                        <td class="sorting_1">{{ $loop->iteration }}</td>
                                                        <td>
                                                            <a href="">
                                                                <img class="tablepicture" src="{{ $product->picture ? asset('storage/' . $product->picture) : asset('assets/admin/img/demoProfile.png') }}" alt="user profile picture">
                                                            </a>
                                                        </td>
                                                        <td>{{ $product->name }}</td>
                                                        <td>{{ $product->author }}</td>
                                                        
                                                        <td>{{ $product->price }}</td>
                                                        <td>{{ $product->discount ?? 0  }}</td>
                                                        <td>{{ $product->category->name }}</td>
                                                        <td class="">
                                                           
                                                                <a href="{{ route('admin.removeBestSelling',['id'=>$product->id]) }}" class="btn btn-danger p-0 px-1">Remove</a>
                                                            
                                                            
                                                        </td>
                                                        
                                                    </tr>
                                                @empty
                                                    <p>there is no users</p>
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
    

@endpush