<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    ​
</head>
<body>
<div class="container">
    <a href="#" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">Add</a>
    <form class="form-inline">

        <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only">Search</label>
            <input id="search-product" name="keyword" type="search" class="form-control">
            {{--            data-url="{{route('products.search')}}"--}}

        </div>

    </form>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>STT</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Desc</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $key => $product)
                <tr>
                    <td id="{{$product->id}}">{{$product->id}}</td>
                    <td id="image-{{$product->id}}">{{$product->image}}</td>
                    <td id="name-{{$product->id}}">{{$product->name}}</td>
                    <td id="price-{{$product->id}}">{{$product->price}}</td>
                    <td id="quantity-{{$product->id}}">{{$product->quantity}}</td>
                    <td id="desc-{{$product->id}}">{{$product->desc}}</td>

                    <td>
                        <button data-url="{{ route('products.show',$product->id) }}" ​ type="button" data-target="#show"
                                data-toggle="modal" class="btn btn-info btn-show">Detail
                        </button>
                        <button data-url="{{ route('products.update',$product->id) }}" ​ type="button"
                                data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Edit
                        </button>
                        <button data-url="{{ route('products.destroy',$product->id) }}" ​ type="button"
                                data-target="#delete" data-toggle="modal" class="btn btn-danger btn-delete">Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>

@include('product.add')
@include('product.detail')
@include('product.edit')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript"
        charset="utf-8" async defer></script>
<script type="text/javascript" charset="utf-8">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#form-add').submit(function (e) {
            e.preventDefault();
            var url = $(this).attr('data-url');
            $.ajax({
                type: 'post',
                url: url,
                data: {
                    image: $('#image-add').val(),
                    name: $('#name-add').val(),
                    price: $('#price-add').val(),
                    quantity: $('#quantity-add').val(),
                    desc: $('#desc-add').val(),
                },
                success: function (response) {
                    toastr.success(response.message)
                    $('#modal-add').modal('hide');
                    console.log(response.data)
                    $('tbody').append('<tr><td id="' + response.data.id + '">' + response.data.id + '</td>' +
                        '<td id="image-' + response.data.id + '">' + response.data.image + '</td>' +
                        '<td id="name-' + response.data.id + '">' + response.data.name + '</td>' +
                        '<td id="price-' + response.data.id + '">' + response.data.price + '</td>' +
                        '<td id="quantity-' + response.data.id + '">' + response.data.quantity + '</td>' +
                        '<td id="desc-' + response.data.id + '">' + response.data.desc + '</td>' +
                        '<td><button data-url="{{asset('')}}products/' + response.data.id + '"​ type="button" data-target="#show" data-toggle="modal" class="btn btn-info btn-show">Detail</button>' +
                        '<button style="margin-left: 5px;" data-url="{{asset('')}}products/' + response.data.id + '"​ type="button" data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Edit</button>' +
                        '<button style="margin-left: 5px;" data-url="{{asset('')}}products/' + response.data.id + '"​ type="button" data-target="#delete" data-toggle="modal" class="btn btn-danger btn-delete">Delete</button>' +
                        '</td>' +
                        '</tr>');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //xử lý lỗi tại đây
                }
            })
        })
        $('.btn-show').click(function () {
            var url = $(this).attr('data-url');
            $.ajax({
                type: 'get',
                url: url,
                success: function (response) {
                    console.log(response)
                    $('#id').text(response.data.id)
                    $('#image').text(response.data.image)
                    $('#name').text(response.data.name)
                    $('#price').text(response.data.price)
                    $('#quantity').text(response.data.quantity)
                    $('#desc').text(response.data.desc)
                    $('#created_at').text(response.data.created_at)
                    $('#update_at').text(response.data.update_at)
                },
                error: function (jqXHR, textStatus, errorThrown) {

                }
            })
        })
        // _token: $('meta[name="_token"]').attr('content');
        $('.btn-delete').click(function () {
            let url = $(this).attr('data-url');
            let _this = $(this);
            if (confirm('are you sure?')) {
                $.ajax({
                    type: 'delete',
                    url: url,
                    success: function (response) {
                        toastr.success('Delete product success!')
                        console.log(response);
                        _this.parent().parent().remove();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        //xử lý lỗi tại đây
                    }
                })
            }
        })
        $('.btn-edit').click(function (e) {
            var url = $(this).attr('data-url');
            $('#modal-edit').modal('show');
            e.preventDefault();
            $.ajax({
                //phương thức get
                type: 'get',
                url: url,
                success: function (response) {
                    //đưa dữ liệu controller gửi về điền vào input trong form edit.
                    $('#image-edit').val(response.data.image);
                    $('#name-edit').val(response.data.name);
                    $('#price-edit').val(response.data.price);
                    $('#quantity-edit').val(response.data.quantity);
                    $('#desc-edit').val(response.data.desc);
                    //thêm data-url chứa route sửa todo đã được chỉ định vào form sửa.
                    $('#form-edit').attr('data-url', '{{ asset('products/') }}/' + response.data.id)
                },
                error: function (error) {

                }
            })
        })
        $('#form-edit').submit(function (e) {
            e.preventDefault();
            let url = $(this).attr('data-url');
            $.ajax({
                type: 'put',
                url: url,
                data: {
                    image: $('#image-edit').val(),
                    name: $('#name-edit').val(),
                    price: $('#price-edit').val(),
                    quantity: $('#quantity-edit').val(),
                    desc: $('#desc-edit').val(),
                },
                success: function (response) {
                    console.log(response.productId)
                    toastr.success(response.message)
                    $('#modal-edit').modal('hide');
                    $('#image-' + response.productId).text(response.product.image)
                    $('#name-' + response.productId).text(response.product.name)
                    $('#price-' + response.productId).text(response.product.price)
                    $('#quantity-' + response.productId).text(response.product.quantity)
                    $('#desc-' + response.productId).text(response.product.desc)
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //xử lý lỗi tại đây
                }
            })
        })

        $('#search-product').on('keyup', function () {
            let url = $(this).attr('data-url');
            let origin = location.origin;
            let value = $(this).val();
            console.log(value)
            $.ajax({
                url: origin + '/products/search',
                type: 'GET',
                dataType: 'json',
                data: {
                    keyword: value
                },
                success: function (response) {
                    console.log(response.data)
                    {{--$('tbody').append('<tr><td id="' + response.data.id + '">' + response.data.id + '</td>' +--}}
                    {{--    '<td id="image-' + response.data.id + '">' + response.data.image + '</td>' +--}}
                    {{--    '<td id="name-' + response.data.id + '">' + response.data.name + '</td>' +--}}
                    {{--    '<td id="price-' + response.data.id + '">' + response.data.price + '</td>' +--}}
                    {{--    '<td id="quantity-' + response.data.id + '">' + response.data.quantity + '</td>' +--}}
                    {{--    '<td id="desc-' + response.data.id + '">' + response.data.desc + '</td>' +--}}
                    {{--    '<td><button data-url="{{asset('')}}products/' + response.data.id + '"​ type="button" data-target="#show" data-toggle="modal" class="btn btn-info btn-show">Detail</button>' +--}}
                    {{--    '<button style="margin-left: 5px;" data-url="{{asset('')}}products/' + response.data.id + '"​ type="button" data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Edit</button>' +--}}
                    {{--    '<button style="margin-left: 5px;" data-url="{{asset('')}}products/' + response.data.id + '"​ type="button" data-target="#delete" data-toggle="modal" class="btn btn-danger btn-delete">Delete</button>' +--}}
                    {{--    '</td>' +--}}
                    {{--    '</tr>');--}}
                }
            })

        })
    })
</script>
</body>
</html>​
