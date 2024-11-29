window.onload = function() {
    var token =  $("meta[name='csrf-token']").attr('content'); 
    console.log(token);
    $('#confirm-button').on('click', ()=> {
        $("input[type='number']").map((index, item)=> {
            if($(item).val() != ""){
                $(item).parents().eq(4).clone().appendTo('#all-products');
                $(item).parents().eq(4).remove();

                market = window.location.href.split('/s/')

                $.ajax({
                    method: "POST",
                    url: '/prices/store',
                    data: {
                        _token: token,
                        id_market : market[1],
                        id_product: $(item).parents().eq(4).attr('data-id'),
                        price: parseInt($(item).val())
                    }
                })
                .done(() => {
                    console.log("Consegui!");
                })
            }
        });
    });
}