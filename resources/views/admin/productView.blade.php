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
      @include('admin.layout.sidebar', ['page' => 'product'])
@endsection

@section('bodyContent')
    <div class="container">
        <div class="page-inner">
            <div class="card mb-1">
                <div class="card-header pt-1 pb-0">
                    <h4 class="text-center">Create Book</h4>
                </div>
                <form method="post" id="productForm" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body p-3 ">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="">Name :</label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <input type="text" class="form-control p-1 @error('name') is-invalid
                                        @enderror"  name="name" value="{{ old('name',optional($editItem)->name)}}"
                                            placeholder="Enter Book Name">
                                        @error('name')
                                            <p class="text-danger">{{  $message }}</p>
                                        @enderror

                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="price">Price :</label>

                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <input type="text" class="form-control p-1 @error('price') is-invalid @enderror"  name="price" value="{{ old('price',optional($editItem)->price)}}"
                                            placeholder="Enter Book Price">
                                        @error('price')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="description">Author :</label>

                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <input type="text" class="form-control p-1 @error('author') is-invalid @enderror"  name="author" value="{{ old('author',optional($editItem)->author)}}"
                                            placeholder="Enter Author Name">
                                        @error('author')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="description">Total Page :</label>

                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <input type="text" class="form-control p-1 @error('totalpage') is-invalid @enderror"  name="totalpage" value="{{ old('totalpage',optional($editItem)->totalpage)}}"
                                            placeholder="Enter Book Total Page">
                                        @error('totalpage')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="">Publisher :</label>

                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <input type="text" class="form-control p-1 @error('publisher') is-invalid @enderror"  name="publisher" value="{{ old('publisher',optional($editItem)->publisher)}}"
                                            placeholder="Enter Book Total Page">
                                        @error('publisher')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        
                                    </div>
                                </div>

                                <!-- <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="description">Discription :</label>

                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <textarea name="description" class="form-control" rows="2" id=""></textarea>
                                        
                                    </div>
                                </div> -->
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="email2">Catagory :</label>

                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <select name="category_id" id="" class="form-control p-1 @error('category_id') is-invalid
                                        @enderror">
                                            <!-- <option value="1">dkslk</option>
                                            <option value="1">dkslk</option> -->
                                            <option value="">-- Select Category --</option>
                                            @if($editItem != null)
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @selected(old('category_id', optional($editItem)->category_id) == $category->id)>{{ $category->name }}</option>
                                                @endforeach
                                            @else

                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @selected((old('category_id') == $category->id))>{{ $category->name }}</option>
                                                @endforeach

                                            @endif

                                        </select>
                                    </div>
                                </div> 

                                 <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="">Book QTY :</label>

                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <input type="text" class="form-control p-1 @error('total') is-invalid @enderror"  name="total" value="{{ old('total',optional($editItem)->total)}}"
                                            placeholder="Enter Books Quentity">
                                        @error('total')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="price">Discount :</label>

                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <input type="text" class="form-control p-1"  name="discount" value="{{ old('discount',optional($editItem)->discount)}}"
                                            placeholder="Discount in % ">
                                        

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-12 d-flex justify-content-center mt-1">
                                                    <label for="imageInput" style="cursor: pointer;">
                                                        <!-- (placeholder) -->
                                                        <img id="previewImage" 
                                                            src="{{ ($editItem && $editItem->picture) ? asset('storage/' . $editItem->picture) : asset('assets/admin/img/demoUpload.jpg') }}" 
                                                            alt="Demo Image" 
                                                            class="profileImg"
                                                            style="">
                                                    </label>

                                                    <!-- hidden input -->
                                                    <input type="file" name="picture" id="imageInput" accept="image/*" style="display: none;">
                                                </div>
                                                @error('picture')
                                                    <p class="text-danger text-center">{{ $message }}</p>
                                                 @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                    <div class="">
                                        <label for="long_Description">Long Discription :</label>
                                        <textarea name="long_description" class="form-control" rows="6" id="description">{{ old('long_description',optional($editItem)->long_description) }}</textarea>
                                    </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-3">
                           <input type="submit" value="Submit" class="btn btn-primary me-3 p-2">
                        </div>
                    </div>
                </form>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <h5 class="card-title ">ALL Books</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <div class="row">

                                        <div class="col-sm-12 col-md-6 offset-md-6">
                                            <div id="basic-datatables_filter" class="dataTables_filter">
                                                <label class="d-flex justify-content-end">Search:
                                                    <form>

                                                        <input type="search" value="{{ request()->query('search') }}" name="search" class="form-control form-control-sm"
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
                                                    <tr role="row bg-dark" >
                                                        <th style="width: 136.031px;">SL NO:</th>
                                                        <th style="width: 35.875px;">Image</th>
                                                        <th style="width: 214.469px;">Name</th>
                                                        <th style="width: 214.469px;">Author</th>
                                                        <th style="width: 214.469px;">Price</th>
                                                         <th style="width: 214.469px;">Discount</th>
                                                        <th style="width: 101.219px;">Category</th>
                                                        <th style="width: 101.219px;">BestSell</th>
                                                        <th style="width: 81.375px;">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                @forelse($products as $product)
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
                                                            @if($product->bestsell != null)
                                                                <a href="{{ route('admin.removeBestSelling',['id'=>$product->id]) }}" class="btn btn-danger p-0 px-1">Remove</a>
                                                            @else
                                                                <a href="{{ route('admin.bestsell',['id'=>$product->id]) }}" class="btn btn-primary p-0 px-1">ADD</a>
                                                            @endif
                                                            
                                                        </td>
                                                        <td class="d-flex justify-content-center">

                                                            <a href="{{ route('admin.book', ['id' => $product->id, 'page' => request()->query('page'), 'search' => request()->query('search')]) }}" class="btn btn-info p-1 me-1">
                                                                <i class="fas fa-edit iconsize"></i>
                                                            </a>

                                                            <form action="{{ route('admin.book.delete', ['id' => $product->id]) }}" method="post">
                                                                @csrf
                                                                <!-- <input type="submit" value="Delete"> -->
                                                                 <button type="submit" class="btn btn-danger p-1"><i class="fas fa-trash-alt iconsize"></i></button>
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
                                            @if ($products->previousPageUrl())
                                                <a href="{{ $products->previousPageUrl() }}"
                                                    class="btn btn-primary mx-2 p-1"><i class="fas fa-hand-point-left"></i></a>
                                            @endif

                                            @if ($products->nextPageUrl())
                                                <a href="{{ $products->nextPageUrl() }}" class="btn btn-primary mx-2 p-1"><i
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

@push('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        const imageInput = document.getElementById('imageInput');
        const previewImage = document.getElementById('previewImage');

        imageInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        })


        

       
    ClassicEditor
        .create(document.querySelector('#description'), {
          
        })
        .catch(error => {
            console.error('CKEditor Error:', error);
        });





    </script>

@endpush