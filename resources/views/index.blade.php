@extends('layouts.app')

@section('content')
<div id="colorlib-page">
    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
    <aside id="colorlib-aside" role="complementary" class="js-fullheight">
        <nav id="colorlib-main-menu" role="navigation">

            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <h3>Categories</h3>
                        </div>
                        {{--                        <div class="card-body">--}}
                        {{--                            <ul class="list-group">--}}
                        {{--                                @foreach ($categories as $category)--}}
                        {{--                                    <li class="list-group-item">--}}
                        {{--                                        <div class="d-flex justify-content-between">--}}
                        {{--                                            <a  href="#">{{$category->name}}</a>--}}
                        {{--                                            <p id="children">{{$category->name}}</p>--}}
                        {{--                                            @if ($category->children)--}}
                        {{--                                                <ul class="list-group mt-2">--}}
                        {{--                                                    @foreach ($category->children as $child)--}}
                        {{--                                                        <div class="d-flex justify-content-between">--}}
                        {{--                                                            <a  href="#">{{ $child->name }}</a>--}}
                        {{--                                                            <button name="children" id="children" value="{{$child->id}}">{{$child->name}}</button>--}}

                        {{--                                                        </div>--}}
                        {{--                                                    @endforeach--}}
                        {{--                                                </ul>--}}
                        {{--                                            @endif--}}
                        {{--                                    </li>--}}
                        {{--                                @endforeach--}}
                        {{--                            </ul>--}}
                        {{--                        </div>--}}

                        <form action="">
                            <select class="browser-default custom-select" name="category" id="category">
                                <option selected>Select category</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>

                            <h4>Subcategory</h4>
                            <select class="browser-default custom-select" name="children" id="children">

                            </select>

                            <h4>Product</h4>
                            <select class="browser-default custom-select" name="product" id="product">

                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </aside> <!-- END COLORLIB-ASIDE -->


    <div id="colorlib-main">
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="container">


                <div class="widget-header">
                    <a href="{{ route('checkout.cart') }}" class="icontext">
                        <div class="icon-wrap icon-xs bg2 round text-secondary"><i
                                class="fa fa-shopping-cart"></i></div>
                        <div class="text-wrap">
                            <small>{{ $cartCount }} items</small>
                        </div>
                    </a>
                </div>

                <div class="row d-flex">
                    <div class="col-xl-8 py-5 px-md-5">
                        <div class="row pt-md-4">
                            <div class="col-md-12">


                                <div class="row" id="title">
                                    @foreach($products as $item)

                                        <div class="col-md-4 mt-4">
                                            <div class="card">

                                                <div class="card-header">

                                                    <h3>{{ $item->title }}</h3>
                                                    <p>{{ $item->country }}</p>
                                                    <p>{{ $item->age }}</p>
                                                    <p class="text-muted">{{ $item->category ? $item->category->name : 'Uncategorized' }}</p>
                                                    <img src="/images/{{$item->image}}"/>
                                                </div>
                                                <div class="card-body">
                                                    <p>{{ substr($item->description, 0, 100) }}</p>
                                                </div>

                                                <form action="{{ route('product.add.cart',$item->id) }}" method="POST"
                                                      role="form" id="addToCart">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <dl class="dlist-inline">
                                                                <dt>Quantity:</dt>
                                                                <dd>
                                                                    <input class="form-control" type="number" min="1"
                                                                           value="1" max="{{ $item->quantity }}"
                                                                           name="qty" style="width:70px;">
                                                                    <input type="hidden" name="price" id="finalPrice"
                                                                           value="{{ $item->sale_price != '' ? $item->sale_price : $item->price }}">
                                                                </dd>
                                                            </dl>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-success"><i
                                                            class="fas fa-shopping-cart"></i> Add To Cart
                                                    </button>
                                                </form>


                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div><!-- END COLORLIB-MAIN -->
</div><!-- END COLORLIB-PAGE -->

@endsection
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {

        $('#children').on('change', function (e) {

            var cat_id = e.target.value;

            $.ajax({

                url: "{{ route('getProduct') }}",
                type: "POST",
                data: {
                    cat_id: cat_id
                },

                success: function (data) {
                    console.log(data)


                    $('#title,#product').empty();

                    $.each(data.product, function (index, product) {

                        $('#title').append('<div class="card-header">' +
                            '<p>' + '<strong>Title-</strong>' + product.title + '</p>' +
                            '<p>' + '<strong>Price-</strong>' + product.price + '</p>' +
                            '<p>' + '<strong>Country-</strong>' + product.country + '</p>' +
                            '<p>' + '<strong>Age-</strong>' + product.age + '</p>' +
                            '<p>' + '<strong>Description-</strong>' + product.description + '</p>' +
                            '</div>');
                        $('<img />').attr({'src': 'images/' + product.image}).appendTo('#title');
                        $('#product').append('<option value="' + product.id + '">' + product.title + '</option>');

                    })

                }
            })
        });

    });
</script>


<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {

        $('#category').on('change', function (e) {

            var cat_id = e.target.value;

            $.ajax({

                url: "{{ route('subCategory') }}",
                type: "POST",
                data: {
                    cat_id: cat_id
                },

                success: function (data) {

                    $('#children').empty();

                    $.each(data.children[0].children, function (index, children) {

                        $('#children').append('<option value="' + children.id + '">' + children.name + '</option>');
                    })

                }
            })
        });

    });
</script>

<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('js/scrollax.min.js') }}"></script>


