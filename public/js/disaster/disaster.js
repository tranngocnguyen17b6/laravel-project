//cho file model vào

$(document).ready(function() {
    //dragg dropp table
    $( "tbody.connectedSortable" )
        .sortable({
            connectWith: ".connectedSortable",
            // items: "> tr:not(:first)",
            helper:"clone",
            zIndex: 999990
    })  
//đẩy form lên create
    // $.ajax({
    //     type: "POST",
    //     url: "",
    //     data: "{disaster_title}",
    //     dataType: "dataType",
    //     success: function (response) {
            
    //     }
    // });
});