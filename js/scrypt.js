$(".plus").click(function (){
    gid = $(this).parent().children("input[type = hidden]").val();
    gnum = $(this).parent().children("input[type = number]").val();
    $.post("cartupdate.php",{
        "goodId":gid,
        "goodNum":gnum
    },function (data){

    });
});

$(".minus").click(function (){
    gid = $(this).parent().children("input[type = hidden]").val();
    gnum = $(this).parent().children("input[type = number]").val();
    alert(gid)
    alert(gnum)
});