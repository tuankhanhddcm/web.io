$(document).ready(function () {

    $("#btn-dangky").click(function () {
        $("#dangky_tab").tab('show')

    });
    $("#btn-dangnhap").click(function () {
        $("#dangnhap_tab").tab('show');

    });

    //add class btn--primary
    $(".sapxep").click(function () {
        $(this).addClass("btn--primary").siblings().removeClass("btn--primary");
    });

    $(".removebtn ").click(function () {
        $(".sapxep").siblings().removeClass("btn--primary");
    });

    $("#code-sale").keyup(function(){
        console.log($("#code-sale").val());
        if($("#code-sale").val()==''){
            $("#btn-sale").addClass('btn-code');
            $("#btn-sale").removeClass('btn-active');
        }else{
            $("#btn-sale").addClass("btn-active");
            $("#btn-sale").removeClass('btn-code');
        }
        
    });
    $("#search").keyup(function(){
        fliter_admin('');
    });

    $(".select-loaisp").click(function(){
        fliter_admin();
    });

    $('.select-nsx').click(function(){
        fliter_admin();
    });
});


function tangsl(id) {
    var mang = [];
    var qty = {};
    $(".sl").each(function () {
        mang.push($(this).attr("id"));
    });

    for (i = 0; i < mang.length; i++) {
        sl = Number($("#" + mang[i]).val());
        if (id == mang[i]) {
            sl += 1;
            qty[mang[i]] = sl;
            $("#" + mang[i]).val(sl);
        }
    }
    $.ajax({
        url: "./Ajax/updatecart",
        method: "POST",
        data: {
            id: id,
            qty: qty
        },
        dataType: "json",
        success: function (data) {
            $("#tt_" + id + " span").text(String(data[0]));
            $(".cart-pay__pay span").text(String(data[1]));
        }
    });

}


function giamsl(id) {
    var qty = {};
    var mang = [];
    $(".sl").each(function () {
        mang.push($(this).attr("id"));
    });

    for (i = 0; i < mang.length; i++) {
        sl = Number($("#" + mang[i]).val());
        if (id == mang[i]) {
            sl -= 1;
            if (sl > 1) {
                $("#" + mang[i]).val(sl);
                qty[mang[i]] = sl;
            } else {
                $("#" + mang[i]).val(1);
                qty[mang[i]] = 1;
            }
        }

    }
    $.ajax({
        url: "./Ajax/updatecart",
        method: "POST",
        data: {
            id: id,
            qty: qty
        },
        dataType: "json",
        success: function (data) {
            $("#tt_" + id + " span").text(String(data[0]));
            $(".cart-pay__pay span").text(String(data[1]));
        }
    });

}


function fliter_admin(){
    var text = $("#search").val();
    var ma_loai = $('#loaisp option:selected').val();
    var nsx =$('#nsx option:selected').val();
        $.ajax({
            url: "../Ajax/filter_admin",
            method: "post",
            data: {
                text:text,
                ma_loai:ma_loai,
                nsx:nsx
            },
            success: function(data){
                $("#list_product").html(data);
            }
        });
}

