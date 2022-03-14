$(function () {
    function showCart(cart) {
        $('#cart-modal .modal-cart-content').html(cart);
        $('#cart-modal').modal();

        let cartQty = $('#modal-cart-qty').text() ? $('#modal-cart-qty').text() : 0;
        $('.mini-cart-qty').text(cartQty);
    }

    $('.addtocart').on('click', function (e) {
        e.preventDefault();
        $('#content .modal').css('display', 'block');
        let id = $(this).data('id');
        //console.log(id);

        $.ajax({
            url: 'cart.php',
            type: 'GET',
            data: {
                cart: 'add',
                id: id
            },
            dataType: 'json',
            success: function (res) {
                if(res.code == 'ok') {
                    showCart(res.answer);
                    console.log(res.answer);
                }else{
                    alert ('error');
                }
            },
            error: function () {
                alert ('error');
            }
        });
    });

    $('.modal-footer .modal-footer-close').on('click', function() {
        $('#content .modal').css('display', 'none');
    })

    $('.modal .modal-close').on('click', function() {
        $('#content .modal').css('display', 'none');
    })
});