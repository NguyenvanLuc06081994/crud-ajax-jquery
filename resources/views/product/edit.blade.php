<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" id="form-edit" method="POST" role="form">
                <div class="modal-header">
                    <h4 class="modal-title">Cập nhật</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" class="form-control" name="name" id="name-edit" placeholder="Product Name">
                    </div>

                    <div class="form-group">
                        <label for="">Product Price</label>
                        <input type="text" name="price" id="price-edit" class="form-control" value="" placeholder="Product Price" required="required" title="">
                    </div>

                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" name="quantity" id="quantity-edit" placeholder="Product quantity">
                    </div>

                    <div class="form-group">
                        <label for="">Desc</label>
                        <input type="text" class="form-control" name="desc" id="desc-edit" placeholder="Product Desc">
                    </div>

                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="text" class="form-control" name="image" id="image-edit" placeholder="Product Image">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>

                </div>
            </form>
        </div>
    </div>
</div>
