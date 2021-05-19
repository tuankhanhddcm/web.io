$(document).ready(function () {

    // lọc trang admin

    $("#list_product").html("<div class='loader'></div>");
    $("#list_hd").html("<div class='loader'></div>");
    fliter_admin(1);
    filter_hd(1);
    coupon(1);
    $("#search").keyup(function () {
        $("#list_product").html("<div class='loader'></div>");
        $("#list_hd").html("<div class='loader'></div>");
        $(".calendar").css("display", "none");
        var date = $("#result").val();
        setTimeout(function () {
            fliter_admin(1);
            filter_hd(1, date);
        }, 1000);
        coupon(1);
    });

    $(".select-loaisp").click(function () {
        $("#list_product").html("<div class='loader'></div>");
        setTimeout(function () {
            fliter_admin(1);
        }, 1000);
        coupon(1);
    });

    $('.select-nsx').click(function () {
        $("#list_product").html("<div class='loader'></div>");
        setTimeout(function () {
            fliter_admin(1);
        }, 1000);
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
    if (path == '' || path == 'Admin') {
        path = 'home';
    }
    var target = $('ul a[href="http://localhost/web_mvc/Admin/' + path + '"]');
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
        $(".calendar").css("display", "none");
        var date = $("#result").val();
        var date2 = $("#results").val();
        filter_hd(page, date);
        search_user($("#search").val(), page);
        detail_user(page);
        doanhso(date, date2, page);
        coupon(page);
    });


    // xóa sản phẩm admin
    $(document).on("click", ".btn-deletd", function () {
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
                Xóa: {
                    btnClass: "btn-red",
                    action: function (Xóa) {
                        $.ajax({
                            url: "http://localhost/web_mvc/Ajax/delete_sp/" + id,
                            method: "post",
                            success: function (data) {
                                $(document).ready(function () {
                                    page = $(".active a").data("page_number");
                                    fliter_admin(page);
                                    showdelete('delete', 'sản phẩm');
                                });

                            }
                        });
                    }
                },
                Hủy: {

                }

            }
        });

    });
    // xóa hóa đơn
    $(document).on("click", ".btn_delete", function () {
        var id = $(this).data("id");
        $.confirm({
            title: 'Thông báo!!!',
            content: 'Bạn có chắc muốn xóa hóa đơn',
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
                Xóa: {
                    btnClass: "btn-red",
                    action: function (Xóa) {
                        $.ajax({
                            url: "http://localhost/web_mvc/Ajax/delete_hoadon",
                            data: { id: id },
                            method: "post",
                            success: function (data) {
                                $(document).ready(function () {
                                    page = $(".active a").data("page_number");
                                    filter_hd(page);
                                    showdelete('delete', 'hóa đơn');
                                });

                            }
                        });
                    }
                },
                Hủy: {

                }

            }
        });

    });
    

    // xóa mã giảm giá
    $(document).on("click", ".btn-deleted", function () {
        var id = $(this).data("mydata");
        $.confirm({
            title: 'Thông báo!!!',
            content: 'Bạn có chắc muốn xóa mã giảm giá',
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
                Xóa: {
                    btnClass: "btn-red",
                    action: function (Xóa) {
                        $.ajax({
                            url: "http://localhost/web_mvc/Ajax/delete_coupon",
                            data: { id: id },
                            method: "post",
                            success: function (data) {
                                if(data=='true'){
                                    $(document).ready(function () {
                                        page = $(".active a").data("page_number");
                                        coupon(page);
                                        showdelete('delete', 'mã giảm giá');
                                    });
                                }
                               

                            }
                        });
                    }
                },
                Hủy: {

                }

            }
        });

    });


    // calendar
    $(document).on('click', '.rd-day-selected', function () {
        $(".calendar").css("display", "none");
        $(".calendar2").css("display", "none");
        $("#result").data('val', '0');
        $("#results").data('val', '0')
        var date = $("#result").val();
        var date2 = $("#results").val();
        filter_hd(1, date);
        if (date != '' && date2 != '') {
            doanhso(date, date2, 1);
        }

    })

    $(document).on('click', '.calendar_input', function () {
        var date = $("#result").val();
        var date2 = $("#results").val();
        filter_hd(1, date);
        data = $("#result").data('val');
        if (data == 0) {
            $(".calendar").css("display", "block");
            $("#result").data('val', '1');

        } else if (data == 1) {
            $(".calendar").css("display", "none");
            $("#result").data('val', '0');
        }
        $("#result").val('');
        if (date2 != '') {
            doanhso(date, date2, 1);
        }
    });
    $(document).on('click', '.calendar_input2', function () {
        var date = $("#result").val();
        var date2 = $("#results").val();
        data2 = $("#results").data('val');
        if (data2 == 0) {
            $(".calendar2").css("display", "block");
            $("#results").data('val', '1');
        } else if (data2 == 1) {
            $(".calendar2").css("display", "none");
            $("#results").data('val', '0');
        }
        $("#results").val('');
        if (date != '') {
            doanhso(date, date2, 1);
        }
    });

    // Tuần
    $(".btn_week").click(function () {
        var today = new Date();
        var day = today.getDate();
        var month = today.getMonth() + 1;
        var year = today.getFullYear();
        var date = year + '-0' + month + '-0' + day;
        var d = day + 6;
        if (d < 9) {
            var week = year + '-0' + month + '-0' + d;
        } else {
            var week = year + '-0' + month + '-' + d;
        }

        $("#result").val(date);
        $("#results").val(week);
        doanhso(date, week, 1);
    });
    // tháng
    $(".btn_month").click(function () {
        var today = new Date();
        var day = today.getDate();
        var month = today.getMonth() + 1;
        var year = today.getFullYear();
        var date = year + '-0' + month + '-01';
        switch (month) {
            case 1:
                day = 31;
                break;
            case 2:
                day = 28;
                break;
            case 3:
                day = 31;
                break;
            case 4:
                day = 30;
                break;
            case 5:
                day = 31;
                break;
            case 6:
                day = 30;
                break;
            case 7:
                day = 31;
                break;
            case 8:
                day = 31;
                break;
            case 9:
                day = 30;
                break;
            case 10:
                day = 31;
                break;
            case 11:
                day = 30;
                break;
            case 12:
                day = 31;
                break;
        }
        var thang = year + '-0' + month + '-' + (day);
        $("#result").val(date);
        $("#results").val(thang);
        doanhso(date, thang, 1);
    });
    // quý
    $(".btn_quy").click(function () {
        var today = new Date();
        var month = today.getMonth() + 1;
        var year = today.getFullYear();

        if (month < 4) {
            month = 3;
            date = year + '-01' + '-01';
        } else if (month < 7) {
            month = 6;
            date = year + '-04' + '-01';
        } else if (month < 10) {
            month = 9;
            date = year + '-07' + '-01';
        } else {
            month = 12;
            date = year + '-10' + '-01';
        }

        switch (month) {
            case 1:
                day = 31;
                break;
            case 2:
                day = 28;
                break;
            case 3:
                day = 31;
                break;
            case 4:
                day = 30;
                break;
            case 5:
                day = 31;
                break;
            case 6:
                day = 30;
                break;
            case 7:
                day = 31;
                break;
            case 8:
                day = 31;
                break;
            case 9:
                day = 30;
                break;
            case 10:
                day = 31;
                break;
            case 11:
                day = 30;
                break;
            case 12:
                day = 31;
                break;
        }
        var quy = year + '-0' + month + '-' + (day);
        $("#result").val(date);
        $("#results").val(quy);

        doanhso(date, quy, 1);
    });


    // show detail oder
    $(document).on("click", ".btn-oders", function () {
        var id = $(this).data('id');
        show_detail(id);
    });



    $(document).on('change', '.select-oders', function () {
        id = $(this).data('id');
        val = $(this).val();
        change_status_hd(val, id);
    });

    $(document).on('click', '.btn_huy', function () {
        id = $(this).data('id');
        change_status_hd(4, id, 1, 'btn');
    });

    // tìm kiếm khách hàng
    search_user('', 1);
    $("#search").keyup(function () {
        search_user($(this).val(), 1);
    });

    // detail khách hàng
    $("#list_detail_user").html("<div class='loader'></div>");
    detail_user(1);

    // doanh số
    doanhso('', '', 1);


    $(document).on("click",".loaisp_update",function(){
        var id =$(this).data('loai');
        $("#"+id).css("display","none");
        $("#update_"+id).css("display","table-row");
        
    });

    $(document).on("click",".loaisp_back",function(){
        var id =$(this).data('loai_back');
        $("#"+id).css("display","table-row");
        $("#update_"+id).css("display","none");
        if($("#input_"+id).val()==''){
            $("#input_"+id).val($(".item_"+id +" span").text());
        }
        
    });

    $(document).on("click",".loaisp_btn",function(){
        var id =$(this).data('loai_id');
        update_loaisp(id,"loaisp");
    });

    $(document).on("click",".nsx_update",function(){
        var id =$(this).data('nsx');
        $("#nsx_"+id).css("display","none");
        $("#update_nsx"+id).css("display","table-row");
        
    });

    $(document).on("click",".nsx_back",function(){
        var id =$(this).data('nsx_back');
        $("#nsx_"+id).css("display","table-row");
        $("#update_nsx"+id).css("display","none");
        if($("#input_"+id).val()==''){
            $("#input_"+id).val($(".item_"+id +" span").text());
        }
        
    });

    $(document).on("click",".nsx_btn",function(){
        var id =$(this).data('nsx_id');
        update_loaisp(id,"nsx");
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


function check_giagiam() {
    check('.giagiam_lb');
    if (check('.giaban_lb') == 'true' && check('.giagiam_lb') == 'true') {
        var gia = $('.giaban').val();
        var txt_giagiam = $('.giagiam').val();
        if (txt_giagiam.search('₫') > 0) {
            giagiam = txt_giagiam.slice(0, txt_giagiam.search('₫'));
            giagiam = giagiam.replaceAll('.', '');
        } else {
            giagiam = txt_giagiam;
        }
        if (Number(giagiam) > Number(gia)) {
            $('.giagiam').addClass('error_input');
            $(".giagiam_icon").css("display", "block");
            $(".error_giagiam").text("Giá khuyến mãi phải nhỏ hơn giá bán");
            $(".error_giagiam").css("display", "block");
            kq = "false";
        } else {
            $(".giagiam").removeClass('error_input');
            $(".giagiam_icon").css("display", "none");
            $(".error_giagiam").css("display", "none");

            kq = "true";
        }
        return kq;
    }

}


function show_hd_admin(trang) {
    $("#list_oder").html("<div class='loader'></div>");
    setTimeout(function () {
        $.ajax({
            url: "http://localhost/web_mvc/Ajax/show_hd_admin/5",
            method: "post",
            data: { trang: trang },
            success: function (data) {
                $('#list_oder').html(data);
            }
        });
    }, 1000);
}


function filter_hd(trang, date) {

    var search = $('#search').val();
    $.ajax({
        url: "http://localhost/web_mvc/Ajax/filter_hd_ad/8",
        method: "post",
        data: {
            trang: trang,
            search: search,
            date: date
        },
        success: function (data) {
            $("#list_hd").html(data);
        }
    });

}

function show_detail(id) {
    $("#detail_oder_ad").html("<div class='loader'></div>");
    $.ajax({
        url: "http://localhost/web_mvc/Ajax/show_detail_ad",
        method: "post",
        data: { id: id },
        success: function (data) {
            $('#detail_oder_ad').html(data);
        }
    })
}

function search_user(text, trang) {
    $("#list_user").html("<div class='loader'></div>");
    setTimeout(function () {
        $.ajax({
            url: "http://localhost/web_mvc/Ajax/search_user/10",
            method: "post",
            data: {
                trang: trang,
                text: text
            },
            success: function (data) {
                $("#list_user").html(data);
            }
        });
    }, 500);

}


function detail_user(trang) {
    var user_kh = $("#ma_kh").val();
    $.ajax({
        url: "http://localhost/web_mvc/Ajax/detail_khachhang/10",
        method: "post",
        data: {
            trang: trang,
            user_kh: user_kh
        },
        success: function (data) {
            $("#list_detail_user").html(data);
        }
    });
}

function doanhso(from, to, trang) {
   
    $.ajax({
        url: "http://localhost/web_mvc/Ajax/doanhso/10",
        method: "post",
        data: {
            from: from,
            to: to,
            trang: trang
        },
        dataType: "json",
        success: function (data) {
            $("#list_doanhso").html(data['html']);
            $("#so_don").text(data['so_don']);
            $("#doanh_so").text(data['doanhso'] + 'đ');
            $("#loinhuan").text(data['loinhuan'] + 'đ');
            $("#tien_von").text(data['von'] + 'đ');
        }
    });
}

function coupon(trang) {
    var text = $("#search").val();
    var sl = $('#loaisp option:selected').val();
    $.ajax({
        url: "http://localhost/web_mvc/Ajax/coupon/8",
        method: "post",
        data: {
            text: text,
            sl: sl,
            trang: trang
        },
        success: function (data) {
            $("#list_coupon").html(data);
        }
    });
}
function insert_coupon(val) {
    check(".sp_lb");
    check(".sl_lb");
    check(".gia_lb");
    if (check(".sp_lb") =='true' && check(".sl_lb")=='true' && check(".gia_lb")=='true'){
        var ma = $('.sp').val();
        var sl = $('.sl').val();
        var phan_tram = $('.gia').val();
        $.ajax({
            url: "http://localhost/web_mvc/Ajax/insert_coupon",
            method: "post",
            data: {
                ma:ma,
                sl:sl,
                phan_tram:phan_tram
            },
            success: function (data) {
                if(data =='true'){
                    showinsert('insert', 'mã giảm giá');
                    if(val ==0){
                        location.href ="http://localhost/web_mvc/Admin/coupon";
                    }else if(val==1){
                        $('input').val('');
                    }
                }
            }
        });
    }
    
}

function update_loaisp(id,table){
    var val = $("#input_"+id).val();
    if(val !=''){
        $.ajax({
            url:"http://localhost/web_mvc/Ajax/update_loai/"+table,
            method: "post",
            data:{
                val:val,
                ma_loai:id
            },
            success:function(data){
                if(data=='true'){
                    showupdate("update","nhóm hàng hóa");
                    $(document).ready(function(){
                        $("#"+id).css("display","table-row");
                        $("#update_"+id).css("display","none");
                        $("#nsx_"+id).css("display","table-row");
                        $("#update_nsx"+id).css("display","none");
                        $(".item_"+id +" span").text(val);
                        
                    });
                    
                }else{
                    showupdate_error("update","nhóm hàng hóa");
                }
            }
        })
    }else{
        
        showupdate_error("update","nhóm hàng hóa");
    }
}