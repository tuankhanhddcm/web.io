$(document).ready(function () {


    // lọc trang admin
    fliter_admin(1);
    $("#search").keyup(function () {
        fliter_admin(1);
    });

    $(".select-loaisp").click(function () {
        fliter_admin(1);
    });

    $('.select-nsx').click(function () {
        fliter_admin(1);
    });
    //end lọc

    //check img
    $("#img_group").click(function () {
        $("#img_dm").click();
    });

    $("#thuong_hieu").click(function () {
        $("#img_nsx").click();
    });

    $("#img_pro").click(function () {
        $("#img_temp").click();
    });


    // add class active
    var path = window.location.pathname.split('/').pop(6);
    if(path =='' || path=='Admin'){
        path='home';
    }
    var target = $('ul a[href="http://localhost/web_mvc/Admin/'+path+'"]');
    target.addClass("nav-active");
    

    $('.sl').inputFilter(function (value) {
        return /^\d*$/.test(value);
    });

    $('.gia').inputFilter(function (value) {
        return /^\d*$/.test(value);
    });

    $('.giaban').inputFilter(function (value) {
        return /^\d*$/.test(value);
    });

    $('.giagiam').inputFilter(function (value) {
        return /^\d*$/.test(value);
    });

    $('.giagiam').change(function () {
        var text = txtmoney($(this).val());
        $(this).val(text);
    });

    $('.gia').change(function () {
        var text = txtmoney($(this).val());
        $(this).val(text);
    });
    $('.giaban').change(function () {
        var text = txtmoney($(this).val());
        $(this).val(text);
    });



    show_hd_admin(1);
    $(document).on('click', '.page-link', function () {
        var page = $(this).data('page_number');
        phan_trang_nsx(page);
        phan_trang_loai(page);
        fliter_admin(page);
        show_hd_admin(page);
    });

    $(document).on("click",".btn-deletd",function(){
        var id = $(this).data("mydata");
        $.confirm({
            title: 'Thông báo!!!',
            content: 'Bạn có chắc muốn xóa sản phẩm',
            draggable: true,
            dragWindowBorder: false,
            boxWidth: "30%",
            useBootstrap: false,
            type: 'red',
            icon: 'fa fa-warning',
            typeAnimated: true,
            dragWindowGap: 50,
            alignMiddle: true,
            offsetTop: 0,
            offsetBottom: 500,
            buttons: {
                Xóa:{
                    btnClass: "btn-red",
                    action: function(Xóa){
                        $.ajax({
                            url: "http://localhost/web_mvc/Ajax/delete_sp/"+id,
                            method: "post",
                            success: function(data){
                                fliter_admin(1);
                            }
                        });
                    }
                },
                Hủy: {

                }
                
            }
        });
        
    });
    

  

});

function fliter_admin(trang) {
    var text = $("#search").val();
    var ma_loai = $('#loaisp option:selected').val();
    var nsx = $('#nsx option:selected').val();
    $.ajax({
        url: "http://localhost/web_mvc/Ajax/filter_admin",
        method: "post",
        data: {
            text: text,
            ma_loai: ma_loai,
            nsx: nsx,
            trang: trang
        },
        success: function (data) {
            $("#list_product").html(data);
        }
    });
}


function readURL(input, id_img, img) {
    var file = input.files;
    var id = id_img.slice(1);
    var match = ["image/gif", "image/png", "image/jpg", "image/jfif", "image/jpeg"];
    if (file.length > 0 && file != ""  ) {
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




function phan_trang_nsx(trang) {
    $.ajax({
        url: "http://localhost/web_mvc/Ajax/page/nhasanxuat/8",
        method: "post",
        data: {
            trang: trang
        },
        success: function (data) {
            $("#list_nsx").html(data);
        }
    });
}

function phan_trang_loai(trang) {
    $.ajax({
        url: "http://localhost/web_mvc/Ajax/page/loaisanpham/8",
        method: "post",
        data: {
            trang: trang
        },
        success: function (data) {
            $("#list_loai").html(data);
        }
    });
}


function check_giagiam(){
    check('.giagiam_lb');
    if(check('.giaban_lb')=='true' && check('.giagiam_lb')=='true'){
        var gia = $('.giaban').val();
        var txt_giagiam = $('.giagiam').val();
        if(txt_giagiam.search('₫') >0){
            giagiam = txt_giagiam.slice(0, txt_giagiam.search('₫'));
            giagiam = giagiam.replaceAll('.', '');
        }else{
            giagiam = txt_giagiam;
        }
        if(Number(giagiam) > Number(gia)){
            $('.giagiam').addClass('error_input');
            $(".giagiam_icon").css("display", "block");
            $(".error_giagiam").text("Giá khuyến mãi phải nhỏ hơn giá bán");
            $(".error_giagiam").css("display", "block");
            kq = "false";
        }else{
            $(".giagiam").removeClass('error_input');
            $(".giagiam_icon").css("display", "none");
            $(".error_giagiam").css("display", "none");

            kq = "true";
        }
        return kq;
    }
    
}


function show_hd_admin(trang){
    $.ajax({
        url: "http://localhost/web_mvc/Ajax/show_hd_admin/5",
        method: "post",
        data:{trang:trang},
        success: function(data){
            $('#list_oder').html(data);
        }
    });
}