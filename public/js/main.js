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
        nav: true,
        navText:["<div class='nav-btn prev-slide'><i class='bx bx-chevron-left'></i></div>","<div class='nav-btn next-slide'><i class='bx bx-chevron-right'></i></div>"],
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

    var path = window.location.pathname.split('/').pop(6);
    if(path =='' ||path=='Account'){
        path='edit';
    }
    var target = $('a[href="http://localhost/web_mvc/Account/'+path+'"]');
    target.addClass("user_active");
    

    $(".btn_hoten").click(function(){
        check('.ho_ten_lb');
        if(check('.ho_ten_lb') =='true'){
            if(set_name()=='true'){
                showupdate('addsp','họ tên');
            }else{
                showupdate_error("addsp",'họ tên');
            }
        }
    });

    $(".btn_pass").click(function(){
        set_pass();
    });
    show_hd(1);
    $(document).on('click', '.page-link', function () {
        var page = $(this).data('page_number');
        show_hd(page);
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
    var id = id_img.slice(1);
    var match = ["image/gif", "image/png", "image/jpg", "image/jfif", "image/jpeg"];
    if (file.length > 0 && file != "") {
        var files = $(id_img).prop('files')[0];
        var type =files.type;
        if(type == match[0] || type == match[1] || type == match[2] || type == match[3] || type == match[4]){
            kq = 'true';
            var reader = new FileReader();
            reader.onload = function (e) {
                $(img).attr('src', e.target.result);
            }
            $(".label-" + id).css("display", 'none');
            reader.readAsDataURL(input.files[0]);
            $('.' + id + '_icon').css("display", 'none');
            $(".error_" + id).text('');
        }else{
            $(".error_" + id).text('File không đúng định dạng');
        }
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







function set_name(){
    var hoten = $('.ho_ten').val();
    var kq = 'false';
    $.ajax({
        url: "http://localhost/web_mvc/Account/set_name",
        method: "post",
        data: {hoten:hoten},
        async: false,
        success:function(data){
            kq=data;
        }
    });
    return kq;
}

function set_pass(){
    check('.old_pass_lb');
    check_pass();
    check_pass_again();
    if(check('.old_pass_lb')=='true' && check_pass()=='true' && check_pass_again()=='true'){
        var old_pass = $(".old_pass").val();
        var new_pass = $('.new_pass').val();
        var new_pass_again = $(".new_pass_again").val();
        $.ajax({
            url: "http://localhost/web_mvc/Account/set_pass",
            method: "post",
            data: {
                old_pass:old_pass,
                new_pass:new_pass,
                new_pass_again:new_pass_again
            },
            success:function(data){
               if(data=='true'){
                   showupdate('addsp','mật khẩu');
                   $('.old_pass').removeClass('error_input');
                   $(".old_passs_icon").css("display", "none");
                   $(".error_old_pass").css("display", "none");
                   setTimeout(function(){
                        location.reload();
                   },3000)
               }else{
                   showupdate_error('addsp','mật khẩu');
                   $('.old_pass').addClass('error_input');
                   $(".old_pass_icon").css("display", "block");
                   $(".error_old_pass").text("Mật khẩu cũ không đúng");
                   $(".error_old_pass").css("display", "block");
               }
            }
        });
    }
    
}

function check_pass(){
    check('.new_pass_lb');
    new_pass();
    if(check('.new_pass_lb')=='true' && new_pass()=='true'){
        kq ='true';
    }else{
        kq='true';
    }
    return kq;
}

function check_pass_again(){
    check_new_pass();
    check('.new_pass_again_lb');
    if(check_new_pass()=='true' && check('.new_pass_again_lb')=='true'){
        kq ='true';

    }else{
        kq ='true';
    }
    return kq;
}

function new_pass() {
    if (check('.new_pass_lb')=='true') {
        var pass = $(".new_pass").val();
        if (pass.length < 8) {
            $('.new_pass').addClass('error_input');
            $(".new_pass_icon").css("display", "block");
            $(".error_new_pass").text("Mật khẩu bao gồm ít nhất 8 ký tự !!!");
            $(".error_new_pass").css("display", "block");
            kq = "false";
        } else {
            $('.new_pass').removeClass('error_input');
            $(".new_pass_icon").css("display", "none");
            $(".error_new_pass").css("display", "none");
            kq = "true";
        }
        return kq;
    }
}

function check_new_pass() {
    if (check('.new_pass_again_lb') == "true") {
        var pass = $(".new_pass").val();
        var pass_again = $(".new_pass_again").val();
        if (pass_again !== pass) {
            $('.new_pass_again').addClass('error_input');
            $(".new_pass_again_icon").css("display", "block");
            $(".error_new_pass_again").text("Mật khẩu không khớp!!!");
            $(".error_new_pass_again").css("display", "block");
            kq = "false";
        } else {
            $('.new_pass_again').removeClass('error_input');
            $(".new_pass_again_icon").css("display", "none");
            $(".error_new_pass_again").css("display", "none");
            kq = "true";
        }
        return kq;
    }


}

function show_hd(trang){
    $.ajax({
        url: "http://localhost/web_mvc/Ajax/show_hd/5",
        method: "post",
        data:{trang:trang},
        success: function(data){
            $('#hoa_don').html(data);
        }
    });
}