@extends('user.layout.layout')

@section('title')
    Home Page
@endsection

@section('style')
    <style>
        .bg-breadcrumb {
            position: relative;
            overflow: hidden;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('assets/user/images/banner-image-bg.jpg') }});
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            padding: 20px 0 27px 0;
        }
        .sub-title h2 {
            font-size: 22px;
            font-family: 'Roboto';
            text-transform: uppercase;
            font-weight: bold;
            color: #3D464D;
            background-color: #f1f1f1;
        }
        .btn-dark {
            padding: 0px 15px;
            background-color: #001d3d;
            border-radius: 0px;
            border: none;
            color: #fff;
            margin: 0 8px;
        }
        .main {
            background-color: #f1f1f1;
        }
        .section-9 .cart-summery {
            font-size: 18px;
            padding: 20px;
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }

        .section-9 .table thead tr th {
            background: #484812;
            color: #fff;
            text-align: center;
            font-weight: 700;
            font-size: 16px;
        }

        .section-9 .table tbody tr td {
            text-align: center;
        }
    </style>
@endsection

@section('content')

    <!-- navbar start hare  -->
    @include('user.layout.nav',['page'=>'cart'])
    <!-- navbar end hare  -->

    <div class="container-fluid bg-breadcrumb">
        <div class="bg-breadcrumb-single"></div>
        <div class="container text-center py-3" style="max-width: 900px;">
            <h1 class="text-white  mb-4 wow fadeInDown" data-wow-delay="0.1s"
                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInDown;">My Cart</h1>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s"
                style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInDown;">
                <li class="breadcrumb-item text-white"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-primary">Cart</li>
            </ol>
        </div>
    </div>
    <!--  -->
    <!--  -->
    <!--  -->

    <section class=" section-9 py-5 main ">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-8">
                    <table class="table strip-table">
                        <thead>
                            <tr>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody id="detailCardBody">
                            @foreach ($carts as $key => $cart)
                                <tr>
                                    <td>
                                        <img src="{{ $cart['image'] }}" alt="" style="height:20px">
                                    </td>
                                    <td>{{ $cart['name'] }}</td>
                                    <td>{{ $cart['price'] }}</td>
                                    <td>
                                        <button class="btn-dark" onclick="decrement({{ $key }})"><i
                                                class="fa fa-minus"></i></button>
                                        {{ $cart['qty'] }}
                                        <button class="btn-dark" onclick="increment({{ $key }})"><i
                                                class="fa fa-plus"></i></button>
                                    </td>
                                    <td>{{ $cart['price'] * $cart['qty'] }}</td>
                                    <td>
                                        <button class="btn-dark" onclick="removeItem({{ $key }})"><i
                                                class="fa fa-times"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <div class="card cart-summery">
                        <div class="sub-title">
                            <h2 class="bg-white">Cart Summery</h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between pb-2">
                                <div>Subtotal</div>
                                <div id="subtotal">${{ $cartDetail['totalPrice'] }}</div>
                            </div>
                            <div class="d-flex justify-content-between summery-end">
                                <div>Total</div>
                                <div id="total">${{ $cartDetail['totalPrice'] }}</div>
                            </div>
                            <div class="pt-5">
                                <a href="" class="btn-dark btn btn-block w-100">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="input-group apply-coupan mt-4">
                                <input type="text" placeholder="Coupon Code" class="form-control">
                                <button class="btn btn-dark" type="button" id="button-addon2">Apply Coupon</button>
                            </div>  -->
                </div>
            </div>
        </div>
    </section>

@endsection


@push('script')
    <script>

        function createTr(key, cart) {
            return `<tr>
                                        <td>
                                            <img src="${cart['image']}" alt="" style="height:20px">
                                        </td>
                                        <td>${cart['name']}</td>
                                        <td>${cart['price']}</td>
                                        <td>
                                            <button class="btn-dark" onclick="decrement(${key})"><i class="fa fa-minus"></i></button>
                                            ${cart['qty']}
                                            <button class="btn-dark" onclick="increment(${key})"><i class="fa fa-plus"></i></button>
                                        </td>

                                        <td>${cart['price'] * cart['qty']}</td>
                                        <td>
                                            <button class="btn-dark" onclick="removeItem(${key})"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>`
        }

        function increment(id) {

            let url = "{{ route('user.increase', ['id' => ':id']) }}";
            url = url.replace(':id', id);
            axios.get(url)
                .then(res => {
                    let response = res.data;
                    if (response.status) {
                        showToast(response.message, 'success');
                        let cartbooks = Object.entries(response.content);
                        let allCart = cartbooks.map(ele => {
                            return createTr(ele[0], ele[1])
                        })
                        document.getElementById('detailCardBody').innerHTML = allCart.join('');
                        document.getElementById('total').innerHTML = '$'+response.totalPrice;
                        document.getElementById('subtotal').innerHTML = '$'+response.totalPrice
                    }
                })
        }


        function decrement(id) {
            //
            let url = "{{ route('user.decrement', ['id' => ':id']) }}";
            url = url.replace(':id', id);
            axios.get(url)
                .then(res => {
                    let response = res.data;
                    if (response.status) {
                        showToast(response.message, 'success');
                        let cartbooks = Object.entries(response.content);
                        let allCart = cartbooks.map(ele => {
                            return createTr(ele[0], ele[1])
                        })
                        document.getElementById('detailCardBody').innerHTML = allCart.join('');
                        document.getElementById('total').innerHTML = '$'+response.totalPrice;
                        document.getElementById('subtotal').innerHTML = '$'+response.totalPrice
                    }
                })
        }
        function removeItem(id) {
            let url = "{{ route('user.removeCart', ['id' => ':id']) }}";
            url = url.replace(':id', id);
            axios.get(url)
                .then(res => {
                    let response = res.data;
                    if (response.status) {
                        showToast(response.message, 'success');
                        let cartbooks = Object.entries(response.content);
                        let allCart = cartbooks.map(ele => {
                            return createTr(ele[0], ele[1])
                        })
                        document.getElementById('detailCardBody').innerHTML = allCart.join('');
                        document.getElementById('total').innerHTML = '$'+response.totalPrice;
                        document.getElementById('subtotal').innerHTML = '$'+response.totalPrice
                    }
                })
        }

    </script>
@endpush