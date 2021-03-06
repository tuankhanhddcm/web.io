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
            $("#btn-sale").attr("disabled", true);
            $('#code-sale').removeClass('error_input');
            $(".code-sale-icon").css("display", "none");
            $(".error-code").css("display", "none");
        } else {
            $("#btn-sale").removeAttr("disabled");
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
        navText: ["<div class='nav-btn prev-slide'><i class='bx bx-chevron-left'></i></div>", "<div class='nav-btn next-slide'><i class='bx bx-chevron-right'></i></div>"],
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

    $('.sl').inputFilter(function (value) {
        return /^\d*$/.test(value);
    });

  
    

    var path = window.location.pathname.split('/').pop(6);
    if (path == '' || path == 'Account') {
        path = 'edit';
    }
    var target = $('a[href="http://localhost/web_mvc/Account/' + path + '"]');
    target.addClass("user_active");


    $(".btn_hoten").click(function () {
        check('.ho_ten_lb');
        if (check('.ho_ten_lb') == 'true') {
            if (set_name() == 'true') {
                showupdate('addsp', 'h??? t??n');
            } else {
                showupdate_error("addsp", 'h??? t??n');
            }
        }
    });

    $(".btn_pass").click(function () {
        set_pass();
    });

    show_hd(1);
    $(document).on('click', '.page-link', function () {
        var page = $(this).data('page_number');
        show_hd(page);
    });


    // h???y h??a ????n user
    $(document).on("click", ".btn_huy", function () {
        var id = $(this).data('id');
        change_status_hd(3, id);

    });
    $(document).on("click", "#btn-sale", function () {
        check_coupon();
    })
});


function tangsl(id,text='') {
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
    var so_luong = $("#" + id).val()
    if(text =='tt'){
        if(check_sl(id,so_luong)[0] == 'true'){
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
        }else{
            show_sl_error('');
        }
    }else{
        if(check_sl(id,so_luong)[0] == 'true' && check_sl(id,so_luong)[1] == 'true' ){
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
        }else{
            show_sl_error('');
        }
    }
    
    
    

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
        var type = files.type;
        if (type == match[0] || type == match[1] || type == match[2] || type == match[3] || type == match[4]) {
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
            $(".error_" + id).text('File kh??ng ????ng ?????nh d???ng');
        }
    } else {
        $(".error_" + id).text('Vui l??ng ch???n h??nh ???nh');
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







function set_name() {
    var hoten = $('.ho_ten').val();
    var kq = 'false';
    $.ajax({
        url: "http://localhost/web_mvc/Account/set_name",
        method: "post",
        data: { hoten: hoten },
        async: false,
        success: function (data) {
            kq = data;
        }
    });
    return kq;
}


function set_pass() {
    check('.old_pass_lb');
    check_set_pass();
    check_pass_again();
    if (check('.old_pass_lb') == 'true' && check_set_pass() == 'true' && check_pass_again() == 'true') {
        var old_pass = $(".old_pass").val();
        var new_pass = $('.new_pass').val();
        var new_pass_again = $(".new_pass_again").val();
        $.ajax({
            url: "http://localhost/web_mvc/Account/set_pass",
            method: "post",
            data: {
                old_pass: old_pass,
                new_pass: new_pass,
                new_pass_again: new_pass_again
            },
            success: function (data) {
                if (data == 'true') {
                    showupdate('', 'm???t kh???u');
                    $('.old_pass').removeClass('error_input');
                    $(".old_passs_icon").css("display", "none");
                    $(".error_old_pass").css("display", "none");

                } else {
                    showupdate_error('', 'm???t kh???u');
                    $('.old_pass').addClass('error_input');
                    $(".old_pass_icon").css("display", "block");
                    $(".error_old_pass").text("M???t kh???u c?? kh??ng ????ng");
                    $(".error_old_pass").css("display", "block");
                    
                }
            }
        });
    }

}

function check_set_pass() {
    check('.new_pass_lb');
    new_pass();
    if (check('.new_pass_lb') == 'true' && new_pass() == 'true') {
        kq = 'true';
    } else {
        kq = 'true';
    }
    return kq;
}

function check_pass_again() {
    check_new_pass();
    check('.new_pass_again_lb');
    if (check_new_pass() == 'true' && check('.new_pass_again_lb') == 'true') {
        kq = 'true';

    } else {
        kq = 'true';
    }
    return kq;
}

function new_pass() {
    if (check('.new_pass_lb') == 'true') {
        var pass = $(".new_pass").val();
        if (pass.length < 8) {
            $('.new_pass').addClass('error_input');
            $(".new_pass_icon").css("display", "block");
            $(".error_new_pass").text("M???t kh???u bao g???m ??t nh???t 8 k?? t??? !!!");
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
            $(".error_new_pass_again").text("M???t kh???u kh??ng kh???p!!!");
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

function show_hd(trang) {
    $.ajax({
        url: "http://localhost/web_mvc/Ajax/show_hd/5",
        method: "post",
        data: { trang: trang },
        success: function (data) {
            $('#hoa_don').html(data);
        }
    });
}
function txtmoney(val) {
    if (val != '') {
        var text = new Intl.NumberFormat().format(val)
        return text;
    }
}

function check_coupon() {
    var ma = $('#code-sale').val();
    var temp_total = $("#temp_total").val();
    var total = 0;
    var sl =0;
    if (ma != "") {
        $.ajax({
            url: "http://localhost/web_mvc/Ajax/check_coupon",
            method: "post",
            data: { ma: ma },
            dataType: 'json',
            success: function (data) {
                if (data[0] == 'false') {
                    $('#code-sale').addClass('error_input');
                    $(".code-sale-icon").css("display", "block");
                    $(".error-code").text("M?? gi???m gi?? kh??ng t???n t???i !!!");
                    $(".error-code").css("display", "block");
                } else if (data[1] == 'false' && data[0] == 'true') {
                    $('#code-sale').addClass('error_input');
                    $(".code-sale-icon").css("display", "block");
                    $(".error-code").text("M?? gi???m ???? h???t l???n nh???p !!!");
                    $(".error-code").css("display", "block");
                }
                if (data[0] == 'true' && data[1] == 'true' && data[2] != 0) {
                    $('#code-sale').removeClass('error_input');
                    $(".code-sale-icon").css("display", "none");
                    $(".error-code").css("display", "none");

                    $(document).ready(function () {
                        total = temp_total - (temp_total * data[2] / 100);
                        $("#text_sale").text(data[2] + '%');
                        $("#total").val(total)
                        $("#text_total").text(txtmoney(total) + "??");
                        if(data[3] !=0){
                            sl = data[3]-1;
                            $.ajax({
                                url: "http://localhost/web_mvc/Ajax/update_sl_coupon",
                                method: "post",
                                data: { ma: ma,sl:sl },
                                
                            })
                        }
                    });
                }
            }
        });
        
      
    }

}

function sosanh_sp(id,id_sosanh){
    $.ajax({
        url:"http://localhost/web_mvc/Detail/ma_sp/",
        method:"post",
        data:{
            id:id,
            id_sosanh:id_sosanh
        },
        success:function(data){
            location.href ="http://localhost/web_mvc/Detail/sosanh";
        }
    });
    
}

$(document).ready(function(){
    $(document).on("click",".btn_sosanh",function(){
        var id = $(this).data('sp');
        var id_sosanh = $(this).data('sosanh');
        sosanh_sp(id,id_sosanh);
    });
    $(document).on("click",".btn_sosanh_them",function(){
        var id = $(this).data('idsp');
        addcart(id,1);
    });
    $(document).on("click",".btn_sosanh_mua",function(){
        var id = $(this).data('idsp');
        addcart(id,1);
        checkuser_status();
    });

    $("#check_tskt").click(function(){
        var check = $("#check_tskt:checked").val();
        if(check !=undefined){
            sosanh('loai');
            sosanh('kich_co_tv');
            sosanh('phan_giai');
            sosanh('hdh');
            sosanh('cong_nghe');
            sosanh('tinh_nang');
            sosanh('ket_noi');
            sosanh('loa');
            sosanh('chat_lieu');
            sosanh('cong_suat');
            sosanh('dung_tich');
            sosanh('kieu_tu');
            sosanh('so_canh_cua');
            sosanh('kich_thuoc');
            sosanh('khoi_luong');
            sosanh('bao_hanh');
            sosanh('nam_sx');
            sosanh('noi_san_xuat');
            sosanh('ung_dung');
            

        }else{
            $(".detail_ts").css("display","block");
            $(".span_ts").removeClass('khac');
        }
        

    });
});


function sosanh(ht){
    if($('.'+ht+'_ht').text() !== $('.'+ht+'_ss').text()){
        $('.'+ht+'_ht').addClass('khac');
    }else{
        $('.'+ht+'_ht').removeClass('khac');
        $('.'+ht).css("display","none");
    }
}


