$(document).ready(function () {
    loadcart();
    loadwishlist();
    function loadcart(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method:"GET",
            url: "/load-cart-data",
            success:function (response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
            }
        });

    }
    function loadwishlist(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method:"GET",
            url: "/load-wishlist-data",
            success:function (response) {
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);
            }
        });

    }

    $('.addToCartBtn').click(function(e){
        e.preventDefault();
        var product_id=$(this).closest('.product_data').find('.prod_id').val();
        var product_qty=$(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method:"POST",
            url: "/add-to-cart",
            data:{
                'product_id':product_id,
                'product_qty':product_qty,
            },

            success:function (response) {

                swal("",response.status,"success");
                loadcart();
            }
        });
    });
    $('.addToWishListBtn').click(function(e){

        e.preventDefault();
        var product_id=$(this).closest('.product_data').find('.prod_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method:"POST",
            url: "/add-to-wishList",
            data:{
                'product_id':product_id,
            },

            success:function (response) {

                swal("",response.status,"success");
                loadwishlist();
            }
        });
    });

    $(document).on('click','.increment-btn',function(e){
        e.preventDefault();
        var inc_value= $(this).closest('.product_data').find('.qty-input').val();
        var value=parseInt(inc_value,10);
        value = isNaN(value) ? 0 :value;
        if(value<10){
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    $(document).on('click','.decrement-btn',function(e){
        e.preventDefault();

        var dec_value= $(this).closest('.product_data').find('.qty-input').val();
        var value=parseInt(dec_value,10);
        value = isNaN(value) ? 0 :value;
        if(value>1){
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    $(document).on('click','.deleteCartItem',function(e){
        e.preventDefault();
        var prod_id= $(this).closest('.product_data').find('.prod_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method:"POST",
            url: "delete-cart-item",
            data:{
                'prod_id':prod_id,
            },
            success:function (response) {
                loadcart();
                $('.cartData').load(location.href + " .cartData");
                swal("",response.status,"success");
            }
        });
    });

    $(document).on('click','.remove-wishlist-item',function(e){
        e.preventDefault();
        var prod_id= $(this).closest('.product_data').find('.prod_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method:"POST",
            url: "delete-wishlist-item",
            data:{
                'prod_id':prod_id,
            },
            success:function (response) {
                loadwishlist();
                $('.wishListData').load(location.href + " .wishListData");
                swal("",response.status,"success");
            }
        });
    });

    $(document).on('click','.changeQuantity',function(e){
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();
        data = {
            'prod_id': prod_id,
            'prod_qty': qty,
        };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
            success: function (response) {
                $('.cartData').load(location.href + " .cartData");
            }

        });
    });
});