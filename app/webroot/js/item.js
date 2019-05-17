$(document).ready(function(){
    $('.nav-list li').on('click', function () {
        var itemID = $(this).attr('id');
        console.log(itemID);
        $.ajax({
            type:"POST",
            url: "/items/loadItems",
            data : {
                "itemID" : itemID
            },
            success: function (data_success) {
                console.log('aaa');
            }
        });
    });
});