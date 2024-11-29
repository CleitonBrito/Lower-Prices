window.onload = function() {
    $('#confirm-button').on('click', ()=> {
        $("input[type='number']").map((index, item)=> {
            if($(item).val() != ""){
                console.log($(item).val());
            }
        });
    });
}