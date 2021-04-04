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

    $(".nav-items").click(function () {
        $(this).addClass("nav-active").siblings().removeClass("nav-active");
    });
    
    $(".removebtn ").click(function () {
        $(".sapxep").siblings().removeClass("btn--primary");
    });

    $("#code-sale").keyup(function () {
        console.log($("#code-sale").val());
        if ($("#code-sale").val() == '') {
            $("#btn-sale").addClass('btn-code');
            $("#btn-sale").removeClass('btn-active');
        } else {
            $("#btn-sale").addClass("btn-active");
            $("#btn-sale").removeClass('btn-code');
        }

    });
    $("#search").keyup(function () {
        fliter_admin('');
    });

    $(".select-loaisp").click(function () {
        fliter_admin();
    });

    $('.select-nsx').click(function () {
        fliter_admin();
    });

    $(".display-img").click(function () {
        $("#file_upload").click();
    });

    $('.sl').inputFilter(function (value) {
        return /^\d*$/.test(value);
    });

    $('.gia').inputFilter(function (value) {
        return /^\d*$/.test(value);
    });
    
    $('.giaban').inputFilter(function (value) {
        return /^\d*$/.test(value);
    });
    
    $('.gia').change(function(){
        var text =txtmoney($(this).val());
        $(this).val(text);
    });
    $('.giaban').change(function(){
        var text =txtmoney($(this).val());
        $(this).val(text);
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


function fliter_admin() {
    var text = $("#search").val();
    var ma_loai = $('#loaisp option:selected').val();
    var nsx = $('#nsx option:selected').val();
    $.ajax({
        url: "../Ajax/filter_admin",
        method: "post",
        data: {
            text: text,
            ma_loai: ma_loai,
            nsx: nsx
        },
        success: function (data) {
            $("#list_product").html(data);
        }
    });
}

function readURL(input) {
    var file = input.files;
    var kq = '';
    if (file.length > 0 && file != "") {
        kq = 'true';
        var reader = new FileReader();
        var files = input.files[0];
        var filename = file['name'];
        reader.onload = function (e) {
            $('#img_temp').attr('src', e.target.result);
        }
        $(".label-img").css("display", 'none');
        reader.readAsDataURL(input.files[0]);
        $(".file_upload_icon").css("display", 'none');
        $(".error_file_upload").text('');
    } else {
        $(".error_file_upload").text('Vui lòng chọn hình ảnh');
        $(".error_file_upload").css("display", 'block');
        $(".label-img").css("display", 'block');
        $(".file_upload_icon").css("display", 'block');
        $('#img_temp').attr('src', '');
    }

}


(function ($) {
    $.fn.inputFilter = function (inputFilter) {
        return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function () {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
                this.value = "";
            }
        });
    };
}(jQuery));

function txtmoney(val){
    if(val !=''){
        var text =new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(val)
        return text;
    }
}

