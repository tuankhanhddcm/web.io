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

    $(".page_items").click(function () {
        $(this).addClass("active").siblings().removeClass("active");
    });

    $(".removebtn ").click(function () {
        $(".sapxep").siblings().removeClass("btn--primary");
    });

    $("#code-sale").keyup(function () {
        if ($("#code-sale").val() == '') {
            $("#btn-sale").addClass('btn-code');
            $("#btn-sale").removeClass('btn-active');
        } else {
            $("#btn-sale").addClass("btn-active");
            $("#btn-sale").removeClass('btn-code');
        }

    });

    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 5,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
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



function readURL(input, id_img, img) {
    var file = input.files;
    var kq = '';
    var id = id_img.slice(1);
    if (file.length > 0 && file != "") {
        kq = 'true';
        var reader = new FileReader();
        reader.onload = function (e) {
            $(img).attr('src', e.target.result);
        }
        $(".label-" + id).css("display", 'none');
        reader.readAsDataURL(input.files[0]);
        $('.' + id + '_icon').css("display", 'none');
        $(".error_" + id).text('');
    } else {
        $(".error_" + id).text('Vui lòng chọn hình ảnh');
        $(".error_" + id).css("display", 'block');
        $(".label-" + id).css("display", 'block');
        $('.' + id + '_icon').css("display", 'block');
        $(img).attr('src', '');

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

function txtmoney(val) {
    if (val != '') {
        var text = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(val)
        return text;
    }
}





