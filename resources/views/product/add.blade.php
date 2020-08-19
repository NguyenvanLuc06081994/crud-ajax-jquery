{{--<form method="post" action="" id="form-add" data-url="" enctype="multipart/form-data">--}}
{{--    @csrf--}}
{{--    <div class="form-group">--}}
{{--        <label>Product Name</label>--}}
{{--        <input type="text" class="form-control" name="name"  id="product-name" placeholder="Product Name" required>--}}
{{--    </div>--}}
{{--    <div class="form-group">--}}
{{--        <label>Product Price</label>--}}
{{--        <input type="number" class="form-control" name="price" id="product-price" placeholder="Product Price" required>--}}
{{--    </div>--}}
{{--    <div class="form-group">--}}
{{--        <label>Product Quantity</label>--}}
{{--        <input type="number" class="form-control" name="quantity" id="product-quantity" placeholder="Product Quantity" required>--}}
{{--    </div>--}}
{{--    <div class="form-group">--}}
{{--        <label>Product Description</label>--}}
{{--        <br>--}}
{{--        <textarea rows="3" cols="140" name="description" id="product-desc"></textarea>--}}
{{--    </div>--}}
{{--    <div class="form-group">--}}
{{--        <label>Product Image</label>--}}
{{--        <input type="file" class="form-control" name="image" id="product-image" required>--}}
{{--    </div>--}}
{{--    <div class="form-group">--}}
{{--        <input type="submit" value="ADD" class="btn btn-primary">--}}
{{--        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>--}}
{{--    </div>--}}
{{--</form>--}}

<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" data-url="{{ route('products.store') }}" id="form-add" method="POST" role="form">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Name</label>
                        <input name="name" type="text" class="form-control" id="name-add" placeholder="product name">
                    </div>

                    <div class="form-group">
                        <label for="">Price</label>
                        <input name="price" type="text"  id="price-add" class="form-control" value="" required="required" placeholder="product price" title="">
                    </div>

                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input name="quantity" type="number" class="form-control" id="quantity-add" placeholder="product quantity">
                    </div>

                    <div class="form-group">
                        <label for="">desc</label>
                        <input name="desc" type="text" class="form-control" id="desc-add" placeholder="desc">
                    </div>

                    <div class="form-group">
                                <label>Product Image</label>
                                <input type="text" class="form-control" name="image" id="image-add" required>
                            </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
