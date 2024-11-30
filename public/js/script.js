window.onload = function() {
    var token =  $("meta[name='csrf-token']").attr('content'); 
    $('#confirm-button').on('click', ()=> {
        $("#itemsNotInsertedCollapse input[type='number']").map((index, item)=> {
            let qtd_produts_inserted = 0
            if($(item).val() != ""){
                $(item).parents().eq(4).clone().appendTo('#all-products');
                $(item).parents().eq(4).remove();
                qtd_produts_inserted += 1
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
                });
            }
            let qtd_not_inserted_old = $('#count-items-not-inserted').html().split(": ")
            let qtd_not_inserted_new = parseInt(qtd_not_inserted_old[1])-qtd_produts_inserted
            $('#count-items-not-inserted').html('Items Not Inserted: '+qtd_not_inserted_new)

            let qtd_inserted_old = $('#all-items-market').html()
            let qtd_inserted_new = parseInt(qtd_inserted_old)+qtd_produts_inserted
            $('#all-items-market').html(qtd_inserted_new)
        });
    });
}