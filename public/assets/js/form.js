$(document).ready(function() {
    // $("#history").wysibb();
    // $("#content").wysibb();
    $("#add-boat").click(function() {
        var template =$("#template-boat").html();
        var i = ($(".master-boat").length-1);
        template = template.replaceAll('crew[0]', 'crew['+i+']');
        template = template.replaceAll('aria="0"', 'aria="'+i+'"');
        $("#content-boat").append(template);
    });
    
    $("#add-person").click(function() {
        console.log("In");
    });
});


function buttonClick() {
    console.log("in");
    var i = $(this).attr("aria");
    console.log(i);
    var template = $("#template-person").html();
    template = template.replaceAll('name="crew[0]', 'name="crew['+i+']');
    template = template.replaceAll('aria="0"', 'aria="'+i+'"');
    console.log($("#content-person [aria=\""+i+"]"));
    $("#content-person [aria=\"+i+\"]").append(template);
}