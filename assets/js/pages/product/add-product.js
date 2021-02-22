$(function(){
    ('#add-product').validate({
        rules: {
            'supplier_id[]': {
                required: true
            },

        }
    });
});