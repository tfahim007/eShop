$(document).ready(function () {

    loadCart();
    loadWishlist();

    //ADD TO CART BUTTON
    $('.addToCartBtn').click(function(e){
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id' : product_id,
                'product_qty': product_qty,
            },
            success: function (response){
                swal(response.status);
                loadCart();
            }
        });
    });

    //ADD TO WISHLIST BUTTON
    $('.addToWishlistBtn').click(function(e){
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                'product_id' : product_id,
            },
            success: function (response){
                swal(response.status);
                loadWishlist();
            }
        });
    });


    //INCREMENT BUTTON OF PRODUCTS
    $('.increment-btn').click(function(e){
        e.preventDefault();

        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value,10);
        value = isNaN(value)? 0 : value;
        if(value < 10){
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    //DECREMENT BUTTON OF PRODUCTS
    $('.decrement-btn').click(function(e){
        e.preventDefault();

        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value,10);
        value = isNaN(value)? 0 : value;
        if(value >1){
            value-- ;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    //DELETE CART ITEM
    $('.delete-cart-item').click(function(e){
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_data').val();

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/delete-cart-item",
            data: {
                'prod_id' : prod_id,
                
            },
            success: function (response){
                window.location.reload();
                swal("",response.status,"success");
            }
        
        });

        
    });

    $('.delete-wishlist-item').click(function(e){
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_data').val();

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/delete-wishlist-item",
            data: {
                'prod_id' : prod_id,
                
            },
            success: function (response){
                window.location.reload();
                swal("",response.status,"success");
            }
        
        });

        
    });

    //CHANGE QUANTITY
    $('.changeQuantity').click(function(e){
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_data').val();
        var prod_qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/update-cart",
            data: {
                'prod_id' : prod_id,
                'prod_qty': prod_qty,
                
            },
            success: function (response){
              
                window.location.reload();
                
            }
        
        });

        

        
    });


    //NAV WISHLIST AND CART COUNT
    function loadCart(){
        $.ajax({
            method: "GET",
            url: "/load-cart-data",
            success: function (response){
              $('.cart-navcount').html(response.count);
                
            }
        
        });
    }
    function loadWishlist(){
        $.ajax({
            method: "GET",
            url: "/load-wishlist-data",
            success: function (response){
              $('.wishlist-navcount').html(response.count);
                
            }
        
        });
    }
});