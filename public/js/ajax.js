$(document).ready(function () {

    //click button sapxep
    $("#giacao").click(function () {
        filter_data($('#giacao').val(),0,8);
        filter_gia_search($('#giacao').val(),15);
        $(this).attr('data-order','1');
        $("#banchay").val('');
        $("#giathap").attr('data-order','0');
    });

    $("#giathap").click(function () {
        filter_data($('#giathap').val(),0,8);
        filter_gia_search($('#giathap').val(),15);
        $(this).attr('data-order','1');
        $("#banchay").val('');
        $("#giacao").attr('data-order','0');
    });
    filter_data('',0,8);
    // click button bán chạy
    $("#banchay").click(function () {
        $(this).val(6);
        filter_data('',6,8);
        $("#giathap").attr('data-order','0');
        $("#giacao").attr('data-order','0');
    });

    $(".form-check-input").click(function () {
        filter_data('',0,8);
    });

    filter_gia_search('',15);

    $("#btn_view_dm").click(function(){
        var banchay=$("#banchay").val();
        var giacao= $("#giacao").attr('data-order');
        var giathap=$("#giathap").attr('data-order');
        if(banchay==6){
            filter_data('',banchay,$(this).data('count'));
        }else if(giacao == '1'){
            
            filter_gia_search($('#giacao').val(),$(this).data('search'))
            filter_data($('#giacao').val(),0,$(this).data('count'));

        }else if(giathap=="1"){
            filter_gia_search($('#giathap').val(),$(this).data('search'))
            filter_data($('#giathap').val(),0,$(this).data('count')); 
        }else{
            filter_data('',0,$(this).data('count'));
            filter_gia_search('',$(this).data('search'))
        }

    });

    // search sản phẩm

    //sản phẩm cart khi hover
    sp_cart();

    //số lượng sp trên cart
    sl_cart();

    // ucheck thanh toán
    $("#tt").click(function () {
        checkuser_status();
    });

    //add cart va check login in btn mua ngay
    $("#paycart").click(function () {
        addcart();
        checkuser_status();
    });

    // more sản phẩm
    more_sp(18);

    //đăng ký user
    $("#dangky").click(function () {
        $(".dk").each(function () {
            id = '#' + $(this).attr("id")
            kq = check(id);
        })
        sdt();
        email('#email');
        check_pass();
        check_user();
        pass();
        if (check_user() == 'true' && pass() == 'true' && sdt() == 'true' && check_pass() == 'true' && email('#email') == 'true') {
            if (kq == 'true') {
                dangky();
                $("#form-sign").modal('hide');
                showsuccess();
                $(".dk").each(function () {
                    $(this).val('');
                })
            }
        }

    });

    // thanh toán
    $('#btn-tt').click(function () {
        check('.hoten');
        check('#tinh')
        if (email('.email') == 'true' && check('.hoten') == 'true' && check('#tinh') == 'true') {
            thanhtoan();
        }
    });
    // check địa chỉ
    $(".select").selectpicker();
    $('.select-tinh').click(function () {
        check('#tinh');
        district($('#tinh option:selected').val());
        if (district($('#tinh option:selected').val()) == 'true') {
            ward();
            street();
        }

    });

    $('#district').click(function(){
        $("#ward").val('');
        $("#ward").selectpicker("refresh");
    });

    $('.select-loaisp').click(function () {
        change_label($(".select-loaisp option:selected").val());
        if (check("#loaisp") == "false") {
            $("#thongso_sp").addClass("disabled");
            
        }
    });

    $('.select-loainsx').click(function () {
        check("#loainsx");
    });

    change_label($(".select-loaisp option:selected").val());
    $("#thongso_sp").click(function () {
        if (check("#loaisp") == 'true') {
            $(this).removeClass('disabled');
           
        }
    });

    // go to top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
    // scroll body to 0px on click
    $('#back-to-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 400);
        return false;
    });
    

});




function filter_data(order,sl=0,limit=0) {
    var action = 'fetch_data';
    var gia = get_filter("gia")
    var nsx = get_filter("hang");
    var kich_co = get_filter("kich_co");
    var loai_sp = get_filter('loai_sp');
    var kieu_tu = get_filter("k_tu");
    var ma_loai = $('#ma_loai').val();
    $.ajax({
        url: "http://localhost/web_mvc/Ajax/filter_data",
        method: "POST",
        data: {
            action: action,
            nsx: nsx,
            gia: gia,
            ma_loai: ma_loai,
            kich_co: kich_co,
            loai_sp:loai_sp,
            kieu_tu:kieu_tu,
            order: order,
            limit:limit,
            sl:sl
        },
        dataType: "json",
        success: function (data) {
            if(data[0]==0){
                $("#div_view_dm").css("display","none");
            }else{
                $("#div_view_dm").css("display","block");
                $('#view_dm').text(data[0]);
                $('#btn_view_dm').data('count',limit+8);
            }
            console.log(data[0]);
            $('#danhmuc_loai').html(data[1]);
        }
    });
}

function get_filter(class_name) {
    var filter = [];
    $('.' + class_name + ":checked").each(function () {
        filter.push($(this).val());
    });
    return filter;
}


function filter_gia_search(gia,limit) {
    var sort = gia;
    $.ajax({
        url: "../Ajax/filter_search",
        method: "POST",
        data: {
            sort: sort,
            limit:limit
        },
        dataType: "json",
        success: function (data) {
            if(data[0]==0){
                $("#div_view_search").css("display","none");
            }else{
                $("#div_view_search").css("display","block");
                $('#view_search').text(data[0]);
                $('#btn_view_dm').data('search',limit+15);
            }
            
            $('#danhmuc_search').html(data[1]);
        }
    });
}


// ban chay
function filter_banchay() {
    var ma_loai = $('#ma_loai').val();
    var banchay = 2;
    $.ajax({
        url: "../Ajax/banchay",
        method: "POST",
        data: {
            ma_loai: ma_loai,
            banchay: banchay,
        },
        success: function (data) {
            $('#danhmuc').html(data);
        }
    });
}

// sản phẩm cart hover

function sp_cart() {
    var sp1 = 'sp_cart';
    $.ajax({
        url: "http://localhost/web_mvc/Ajax/sp_cart",
        method: "POST",
        data: {
            sp1: sp1,
        },
        success: function (data) {
            $("#sp_cart").html(data);
        }
    });

}

function sl_cart() {
    $.ajax({
        url: "http://localhost/web_mvc/Ajax/sl_cart",
        method: "POST",
        data: {},
        success: function (data) {
            $("#num_order span").text(data);
        }
    });
}

function updatecart(id) {
    var mang = [];
    var qty = {};
    $(".sl").each(function () {
        mang.push($(this).attr("id"));
    });

    for (i = 0; i < mang.length; i++) {
        sl = Number($("#" + mang[i]).val());
        if (id == mang[i]) {
            qty[mang[i]] = sl;

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

//check có login hay chưa
function checkuser_status() {
    $.ajax({
        url: "http://localhost/web_mvc/Payment/checkuser_status",
        method: "POST",
        success: function (kq) {
            if (kq == 'false') {
                $("#form-sign").modal("show");
            } else {
                window.location = 'http://localhost/web_mvc/Payment';

            }
        }
    });
}

//thêm sản phẩm
function addcart() {
    var productID = $("#productID").val();
    var soluong = $('.sl').val();
    $.ajax({
        url: "../cart/addcart",
        method: "POST",
        data: {
            productID: productID,
            soluong: soluong
        },
        success: function (data) {
        }
    });
}


function dangky() {
    var dangky = "dangky";
    var hoten = $("#hoten").val();
    var username = $("#username").val();
    var email = $("#email").val();
    var sdt = $("#sdt").val();
    var pass = $("#pass").val();
    var pass_again = $("#pass_again").val();

    $.ajax({
        url: "http://localhost/web_mvc/Ajax/dangky",
        method: "POST",
        data: {
            dangky: dangky,
            hoten: hoten,
            username: username,
            email: email,
            sdt: sdt,
            pass: pass,
            pass_again: pass_again
        },
        success: function (data) {
            // console.log(data);
        }
    });

}

//check input rỗng
function check(id) {
    var lop = '';
    var end = id.search("_lb");
    if (end > 0) {
        var t = id.slice(end + 1);

    } else {
        var t = id.slice(1);
    }

    if (end == -1) {

        var dk = id.slice(1);
        lop = id;

    } else {

        var dk = id.slice(1, end);
        lop = id.slice(0, end);
    }
    var val = $(id).text();
    val = val.toLowerCase().replaceAll(":", "");
    switch (t) {
        case 'lb': text = 'nhập ' + val;
            break;
        case 'hoten': text = 'nhập họ tên';
            break;
        case 'username': text = ' nhập tên đăng nhập';
            break;
        case 'user': text = 'nhập tên đăng nhập';
            break;
        case 'email': text = 'nhập email';
            break;
        case 'sdt': text = 'nhập số điện thoại';
            break;
        case 'pass': text = 'nhập mật khẩu';
            break;
        case 'passs': text = 'nhập mật khẩu';
            break;
        case 'tinh': text = 'chọn tỉnh';
            break;
        case 'loaisp': text = 'chọn nhóm hàng hóa';
            break;
        case 'loainsx': text = 'chọn thương hiệu';
            break;
        case 'img_temp': text = 'chọn hình ảnh';
            break;
        case 'img_dm': text = 'chọn hình ảnh';
            break;
        case 'img_nsx': text = 'chọn hình ảnh';
            break;
        case 'pass_again': text = 'nhập lại mật khẩu';
            break;

    }
    if ($(lop).val() == "") {
        $(lop).addClass('error_input');
        $("." + dk + "_icon").css("display", "block");
        $(".error_" + dk).text("Vui lòng  " + text);
        $(".error_" + dk).css("display", "block");
        return "false";
    } else {
        $(lop).removeClass('error_input');
        $("." + dk + "_icon").css("display", "none");
        $(".error_" + dk).css("display", "none");
        return "true";
    }
}

//kiểm tra tên đăng nhập
function check_user() {
    if (check('#username') == "true") {
        var username = $('#username').val();
        if (username.length < 3 || username.length > 12) {
            $('#username').addClass('error_input');
            $(".username_icon").css("display", "block");
            $(".error_username").text("Tên đăng nhập bao gồm 3-12 ký tự !!!");
            $(".error_username").css("display", "block");
            kq = 'false';
        } else {
            $('#username').removeClass('error_input');
            $(".username_icon").css("display", "none");
            $(".error_username").css("display", "none");
            $.ajax({
                url: "http://localhost/web_mvc/Ajax/check_user",
                method: "post",
                data: {
                    username: username,
                },
                async: false,
                success: function (data) {
                    if (data == "false") {
                        $("#username").addClass('error_input');
                        $(".username_icon").css("display", "block");
                        $(".error_username").text("Tên đăng nhập đã tồn tại!!!");
                        $(".error_username").css("display", "block");
                    } else {
                        $("#username").removeClass('error_input');
                        $(".username_icon").css("display", "none");
                        $(".error_username").css("display", "none");
                    }
                    kq = data;
                }
            });
        }
        return kq;
    }
}

function sdt() {
    if (check('#sdt') == "true") {
        var regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
        var sdt = $('#sdt').val();
        if (regex.test(sdt) == false) {
            $('#sdt').addClass('error_input');
            $(".sdt_icon").css("display", "block");
            $(".error_sdt").text("Số điện thoại bao gồm 10 chữ số và không có ký tự đặc biệt!!!");
            $(".error_sdt").css("display", "block");
            kq = false;
        } else {
            $('#sdt').removeClass('error_input');
            $(".sdt_icon").css("display", "none");
            $(".error_sdt").css("display", "none");
            $.ajax({
                url: "http://localhost/web_mvc/Ajax/check_sdt",
                method: "post",
                data: {
                    sdt: sdt
                },
                async: false,
                success: function (data) {
                    if (data == "false") {
                        $("#sdt").addClass('error_input');
                        $(".sdt_icon").css("display", "block");
                        $(".error_sdt").text("Số điện thoại đã tồn tại!!!");
                        $(".error_sdt").css("display", "block");
                    } else {
                        $("#sdt").removeClass('error_input');
                        $(".sdt_icon").css("display", "none");
                        $(".error_sdt").css("display", "none");
                    }
                    kq = data;
                }
            });

        }
        return kq;
    }

}


function email(email) {
    var e = email.slice(1);
    if (check(email) == 'true') {
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var val = $(email).val();
        if (filter.test(val) == false) {
            $(email).addClass('error_input');
            $("." + e + "_icon").css("display", "block");
            $(".error_" + e).text("Email không hợp lệ (Example@gmail.com)!!!");
            $(".error_" + e).css("display", "block");
            kq = "false";
        } else {
            $(email).removeClass('error_input');
            $("." + e + "_icon").css("display", "none");
            $(".error_" + e).css("display", "none");

            kq = "true";
        }
        return kq;
    }

}


function pass() {
    if (check('#pass')=='true') {
        var pass = $("#pass").val();
        if (pass.length < 8) {
            $('#pass').addClass('error_input');
            $(".pass_icon").css("display", "block");
            $(".error_pass").text("Mật khẩu bao gồm ít nhất 8 ký tự !!!");
            $(".error_pass").css("display", "block");
            kq = "false";
        } else {
            $('#pass').removeClass('error_input');
            $(".pass_icon").css("display", "none");
            $(".error_pass").css("display", "none");
            kq = "true";
        }
        return kq;
    }
}

function check_pass() {
    if (check('#pass_again') == "true") {
        var pass = $("#pass").val();
        var pass_again = $("#pass_again").val();
        if (pass_again !== pass) {
            $('#pass_again').addClass('error_input');
            $(".pass_again_icon").css("display", "block");
            $(".error_pass_again").text("Mật khẩu không khớp!!!");
            $(".error_pass_again").css("display", "block");
            kq = "false";
        } else {
            $('#pass_again').removeClass('error_input');
            $(".pass_again_icon").css("display", "none");
            $(".error_pass_again").css("display", "none");
            kq = "true";
        }
        return kq;
    }


}

//đăng nhập

function login() {
    var user = $('.user').val();
    var pass = $('.passs').val();
    check('.user');
    check('.passs');
    if (check('.user') == 'true' && check('.passs') == 'true') {
        $.ajax({
            url: "http://localhost/web_mvc/Ajax/login",
            method: 'post',
            data: {
                user: user,
                pass: pass,
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                if (data[0] == "false") {
                    $('.user').addClass('error_input');
                    $(".user_icon").css("display", "block");
                    $(".error_user").text("Tên đăng nhập không tồn tại!!!");
                    $(".error_user").css("display", "block");
                } else {
                    $('.user').removeClass('error_input');
                    $(".user_icon").css("display", "none");
                    $(".error_user").css("display", "none");
                }
                if (data[1] == "false") {
                    $('.passs').addClass('error_input');
                    $(".passs_icon").css("display", "block");
                    $(".error_passs").text("Mật khẩu không đúng");
                    $(".error_passs").css("display", "block");
                } else {
                    $('.passs').removeClass('error_input');
                    $(".passss_icon").css("display", "none");
                    $(".error_passs").css("display", "none");
                }
                if (data[0] == 'true' && data[1] == 'true') {
                    location.reload();
                }

            }
        });
    }
}


//tạo thông báo
function toast({
    title = '',
    message = "",
    type = "",
    duration = 3000,
    load = ''
}) {
    const main = document.getElementById("toast");
    if (main) {
        const toast = document.createElement('div');

        const autoremove = setTimeout(function () {
            main.removeChild(toast);
        }, duration + 1000);

        toast.onclick = function (e) {
            if (e.target.closest('.toast__close')) {
                main.removeChild(toast);
                clearTimeout(autoremove);

            }
            if (load == 'insert'|| load=='update') {
                location.href = "http://localhost/web_mvc/Admin/list_sp";
            }
            if (load == 'insert_loai') {
                location.href = "http://localhost/web_mvc/Admin/create_sp";
            }
            if (load == 'addsp') {
                location.reload();
            }
        }

        const delay = (duration / 1000).toFixed(2);

        toast.classList.add('toast', `toast--${type}`);
        toast.style.animation = `slideleft ease .3s, fadeout linear 1s ${delay}s forwards`;
        toast.innerHTML = `
                    <div class="toast__icon">
                    <i class='bx bxs-check-circle'></i>
                    </div>
                    <div class="toast__body">
                    <h3 class="toast__title">${title} !</h3>
                    <p class="toast__msg">${message}</p>
                    </div>
                    <div class="toast__close">
                    <i class='bx bx-x'></i>
                    </div>
                `;
        main.appendChild(toast);
    }
}
//hiện thông báo thành công
function showsuccess() {
    toast({
        title: 'Thành công',
        message: "Bạn đã tạo tài khoản thành công",
        type: "success",
        duration: 3000
    });
}


//hiện thông thêm sản phẩm thành công

function showproduct() {
    toast({
        title: 'Thành công !',
        message: "Bạn thêm sản phẩm thành công",
        type: "success",
        duration: 3000,
        load: 'addsp'
    });
    setTimeout(function () {
        location.reload();
    }, 3500);
}

function showdelete(text,mess){
    toast({
        title: 'Thành công !',
        message: "Bạn xóa " + mess + " thành công",
        type: "success",
        duration: 2000,
        load: text
    });
}


function showinsert(text, mess) {
    toast({
        title: 'Thành công !',
        message: "Bạn thêm " + mess + " thành công",
        type: "success",
        duration: 2000,
        load: text
    });
}
function showupdate(text, mess) {
    toast({
        title: 'Thành công !',
        message: "Bạn sửa " + mess + " thành công",
        type: "success",
        duration: 2000,
        load: text
    });
}
function showupdate_error(text, mess) {
    toast({
        title: 'Thất bại !',
        message: "Cập nhật " + mess + " thất bại",
        type: "error",
        duration: 2000,
        load: text
    });
}
function showerror(text) {
    toast({
        title: 'Thất bại !',
        message: "Vui lòng nhập " + text,
        type: "error",
        duration: 3000
    });
}

function thanhtoan() {
    var hoten = $('.hoten').val();
    var email = $('.email').val();
    var sdt = $(".sdt").val();
    var note = $('#note').val();
    var total = $('#total').val();
    var diachi = '';
    var provi = $('#tinh option:selected').text();
    var district = $('#district option:selected').text();
    var ward = $('#ward option:selected').text();
    var street = $('#street option:selected').text();
    if (street !== '') {
        diachi += street + ', ';
    }
    if (ward !== '') {
        diachi += ward + ', ';
    }
    if (district !== '') {
        diachi += district + ', ';
    }
    if (provi !== '') {
        diachi += provi;
    }
    console.log(diachi);
    $.ajax({
        url: "./Payment/thanhtoan",
        method: "post",
        data: {
            hoten: hoten,
            sdt: sdt,
            email: email,
            note: note,
            total: total,
            diachi: diachi
        },
        success: function (data) {
            location.href = 'http://localhost/web_mvc/Payment/camon';
        }

    });
}

function logout() {
    $.ajax({
        url: "http://localhost/web_mvc/Login/logout",
        method: "POST",
        data: {
        },
        success: function (data) {
            location.href = 'http://localhost/web_mvc/home';
        }
    });
}


function district(val) {
    
    var kq = '';
    if (val !== 'undefined' && val !== ' ') {
        var provi = val;
        kq = "true";
        $.ajax({
            url: "./Payment/district",
            method: 'post',
            data: {
                provi: provi
            },
            success: function (data) {
                if (data !== '') {
                    $('#district').html(data);
                    $('#district').prop('disabled', false);
                    $('.select').selectpicker('refresh');
                }else {
                    $('#district').prop('disabled', true);
                    $('.select').selectpicker('refresh');
                }
            }

        });
    } else {
        kq = 'false';
    }
    return kq;

}
function ward() {
    $('#district').change(function () {
        var dis = $(this).val();
        if (dis !== ' ') {
            $.ajax({
                url: "./Payment/ward",
                method: 'post',
                data: {
                    dis: dis,
                },
                success: function (data) {
                    if (data !== "") {
                        $('#ward').html(data);
                        $('#ward').prop('disabled', false);
                        $('.select').selectpicker('refresh');
                    }else {
                        $('#ward').prop('disabled', true);
                        $('#street').prop('disabled', true);
                        $('.select').selectpicker('refresh');
                    }

                }
            });

        }

    });


}
function street() {
    $('#district').change(function () {
        var dis = $(this).val();
        if (dis !== '') {
            $.ajax({
                url: "./Payment/street",
                method: 'post',
                data: {
                    dis: dis,
                },
                success: function (data) {
                    if (data !== "") {
                        $('#street').html(data);
                        $('#street').prop('disabled', false);
                        $('.select').selectpicker('refresh');
                    }else {
                        // $('#street').prop('disabled', true);
                        $('.select').selectpicker('refresh');
                    }

                }
            });

        }
    });

}

function search_header() {
    var text = $("#input-search").val();
    if (text !== ' ') {
        $.ajax({
            url: "http://localhost/web_mvc/Ajax/search_product",
            method: "post",
            data: {
                text: text
            },
            success: function (data) {
                $('#list-search').html(data);
            }
        });
    }
}

function check_sp() {
    check("#loaisp");
    check("#loainsx");
    check(".sp_lb");
    check(".sl_lb");
    check(".gia_lb");
    check(".giaban_lb");
    check_giagiam();
    check("#img_temp") ;
    var kq = 'false';
    var img = $("#img_insert").attr('src');
    if (check("#loaisp") == 'true' && check("#loainsx") == 'true'
        && check(".sl_lb") == 'true' && check(".sp_lb") == 'true'
        && check(".gia_lb") == 'true' && check(".giaban_lb") == 'true' &&  check_giagiam()=='true' ) {
            if(img!='#'|| check("#img_temp") == 'true'){
                kq = 'true';
            }
        
    }
    return kq;
}

function insert_sp(val,url,ma_sp) {
    var tensp = $('.sp').val();
    var sl = $('.sl').val();
    var txt_gia = $('.gia').val();
    var txt_giaban = $('.giaban').val();
    var txt_giagiam = $('.giagiam').val();
    var maloai = $('#loaisp option:selected').val();
    var mansx = $('#loainsx option:selected').val();
    var file = $('#img_temp').prop('files')[0];
    var sp_mota = $("#mota").val();
    var match = ["image/gif", "image/png", "image/jpg", "image/jfif", "image/jpeg"];
    var gia ='';
    var giaban ='';
    var giagiam ='';
    
    if(txt_giagiam.search('₫') >0){
        giagiam = txt_giagiam.slice(0, txt_giagiam.search('₫'));
        giagiam = giagiam.replaceAll('.', '');
    }else{
        
        giagiam = txt_giagiam;
    }
    if(txt_gia.search('₫') >0 ){
        gia = txt_gia.slice(0, txt_gia.search('₫'));
        gia = gia.replaceAll('.', '');
        
    }else{
        gia = txt_gia;
    }
    if( txt_giaban.search('₫') >0){
        giaban = txt_giaban.slice(0, txt_giaban.search('₫'));
        giaban = giaban.replaceAll('.', '');
    }else{
        giaban = txt_giaban;
    }
    console.log(giagiam);
    if (tensp != '' && sl != '' && gia != '' && giaban != '' && maloai != '' && mansx != '') {
        if(file !==undefined){
            var type = file.type;
            var name = file.name;
            var form_data = new FormData();
            if (type == match[0] || type == match[1] || type == match[2] || type == match[3] || type == match[4]) {
                form_data.append('file', file);
                $.ajax({
                    url: "http://localhost/web_mvc/Ajax/upload_file/upload",
                    method: "post",
                    processData: false,
                    contentType: false,
                    mimeType: "multipart/form-data",
                    data: form_data,
    
                });
            }
            
        }
       
        var masp ='';
        $.ajax({
            url: 'http://localhost/web_mvc/Ajax/sp/'+url,
            method: 'post',
            data: {
                tensp: tensp,
                sl: sl,
                gia: gia,
                giaban: giaban,
                maloai: maloai,
                mansx: mansx,
                img: name,
                sp_mota: sp_mota,
                ma_sp:ma_sp,
                giagiam:giagiam
            },
            async: false,
            success: function(data){
                masp = data;
            }
        });

        if (val == 0) {
            if(url =='insert'){
                showinsert(url, 'sản phẩm');
            }else{
                showupdate(url,'sản phẩm');
            }
            
            setTimeout(function () {
                location.href = 'http://localhost/web_mvc/Admin/list_sp';
            }, 2000)
        }
        if (val == 1) {
            if(url =='insert'){
                showinsert('', 'sản phẩm');
            }else{
                showupdate('','sản phẩm');
            }
            $('textarea').val('');
            $("#img_insert").attr('src','');
            $(".label-img_temp").css('display', 'block');
            $(".select").val('');
            $(".select").selectpicker("refresh");
        }
        
        return masp;

    }
}

function check_name(text, table) {
    var name = $('.prd_' + text + '_name').val();
    var kq = '';
    check(".prd_" + text + "_name_lb");
    if (check(".prd_" + text + "_name") == 'true') {
        $.ajax({
            url: "../Ajax/check_name/" + table,
            method: "post",
            data: {
                name: name
            },
            async: false,
            success: function (data) {
                if (data == 'false') {
                    $(".prd_" + text + "_name").addClass('error_input');
                    $(".prd_" + text + "_name_icon").css("display", "block");
                    $(".error_prd_" + text + "_name").text("Tên đã tồn tại!!!");
                    $(".error_prd_" + text + "_name").css("display", "block");
                } else {
                    $(".prd_" + text + "_name").removeClass('error_input');
                    $(".prd_" + text + "_name_icon").css("display", "none");
                    $(".error_prd_" + text + "_name").css("display", "none");
                }

                kq = data;
            }
        });
        return kq;
    }

}


function insert_loai(val) {
    check("#img_dm");
    if (check_name('group', 'danhmuc') == 'true' && check("#img_dm") == 'true') {
        var name = $('.prd_group_name').val();
        var file = $('#img_dm').prop('files')[0];
        var img = file.name;
        var match = ["image/gif", "image/png", "image/jpg", "image/jfif", "image/jpeg"];
        var type = file.type;
        var form_data = new FormData();
        if (type == match[0] || type == match[1] || type == match[2] || type == match[3] || type == match[4]) {
            form_data.append('file', file);
            $.ajax({
                url: "http://localhost/web_mvc/Ajax/upload_file/danhmuc",
                method: "post",
                processData: false,
                contentType: false,
                mimeType: "multipart/form-data",
                data: form_data,
                success: function (data) {
                    console.log(data);
                }
            });
        }
        $.ajax({
            url: "http://localhost/web_mvc/Ajax/insert_group/danhmuc",
            method: 'post',
            data: {
                ten: name,
                img: img,

            },



        });
        if (val == 0) {
            showinsert('insert_loai', 'nhóm hàng hóa');
            setTimeout(function () {
                location.href = 'http://localhost/web_mvc/Admin/create_sp';
            }, 2000)
        }
        if (val == 1) {
            showinsert('', 'nhóm hàng hóa');
            $('.prd_group_name').val('');
            $("#img_loai").attr('src', '');
            $(".label-img_dm").css('display', 'block');
        }
    }
}

function insert_nsx(val) {
    check("#img_nsx");
    if (check_name('nsx', 'nsx') == 'true' && check("#img_nsx") == 'true') {
        var name = $('.prd_nsx_name').val();
        var file = $('#img_nsx').prop('files')[0];
        var img = file.name;
        var match = ["image/gif", "image/png", "image/jpg", "image/jfif", "image/jpeg"];
        var type = file.type;
        var form_data = new FormData();
        if (type == match[0] || type == match[1] || type == match[2] || type == match[3] || type == match[4]) {
            form_data.append('file', file);
            $.ajax({
                url: "http://localhost/web_mvc/Ajax/upload_file/nsx",
                method: "post",
                processData: false,
                contentType: false,
                mimeType: "multipart/form-data",
                data: form_data,
            });
        }
        $.ajax({
            url: "http://localhost/web_mvc/Ajax/insert_group/nsx",
            method: 'post',
            data: {
                ten: name,
                img: img,

            },

        });

        if (val == 0) {
            showinsert('insert_loai', 'thương hiệu');
            setTimeout(function () {
                location.href = 'http://localhost/web_mvc/Admin/create_sp';
            }, 2000)
        }
        if (val == 1) {
            showinsert('', 'thương hiệu');
            $('.prd_nsx_name').val('');
            $("#img_nsx_temp").attr('src', '');
            $(".label-img_nsx").css('display', 'block');
        }
    }

}

function change_label(val) {
    if (val != '') {
        loaisp=val;
        $.ajax({
            url: "http://localhost/web_mvc/Ajax/thongsokythuat",
            method: "post",
            data: { loaisp: loaisp },
            success: function (data) {
                $("#input_tskt").html(data);
            }
        });
    }
   
}

function check_thongso_loai() {
    var kq = 'false';
    check('.tv_ich_lb');
    check('.phan_giai_lb');
    check('.hdh_lb');
    check('.ket_noi_lb');
    check('.tv_loa_lb');
    check('.kieu_tu_lb');
    check('.so_canh_lb');
    check('.dung-tich_lb');
    check('.chat_lieu_lb');
    check('.cn_kk_lb');

    //tv
    if (check('.tv_ich_lb') == 'true' && check('.phan_giai_lb') == 'true' && check('.hdh_lb') == 'true'
        && check('.cn_kk_lb') == 'true' && check('.ket_noi_lb') == 'true' && check('tv_loa') == 'true'
    ) {
        kq = 'true';
    }
    //tủ lạnh
    if (check('.kieu_tu_lb') == 'true' && check('.co_canh_lb') == 'true' && check('.dung-tich_lb') == 'true'
        && check('.chat_lieu_lb') == 'true' && check('.cn_kk_lb') == 'true') {
        kq = 'true';
    }
    //máy lạnh
    if (check('.kieu_tu_lb') == 'true' && check('.ket_noi_lb') == 'true' && check('.dung-tich_lb') == 'true'
        && check('.chat_lieu_lb') == 'true' && check('.cn_kk_lb') == 'true') {
        kq = 'true';
    }
    //máy giặt
    if (check('.kieu_tu_lb') == 'true' && check('.co_canh_lb') == 'true' && check('.dung-tich_lb') == 'true'
        && check('.chat_lieu_lb') == 'true' && check('.cn_kk_lb') == 'true' && check('.ket_noi_lb') == 'true') {
        kq = 'true';
    }

    if ( check('.hdh_lb') == 'true' && check('.ket_noi_lb') == 'true') {
        kq = 'true';
    }

    return kq;
}
function check_thongso() {
    check('.cong_suat_lb');
    check('.loai_sp_lb');
    check('.kich_thuoc_lb');
    check('.kl_lb');
    check('.noi_sx_lb');
    check('.bh_lb');
    check('.nam_lb');
    check('.cong_nghe_lb');
    check('.tien_ich_lb');
    var kq = 'false'
    if (check('.loai_sp_lb') == 'true' && check('.kich_thuoc_lb') == 'true' && check('.kl_lb') == 'true' && check('.noi_sx_lb') == 'true'
        && check('.bh_lb') == 'true'
        && check('.nam_lb') == 'true'
        && check('.cong_nghe_lb') == 'true'
        && check('.tien_ich_lb') == 'true'
        && check('.cong_suat_lb') == 'true') {
        kq = 'true';
    }
    return kq;
}


function insert_tskt(masp,url){
    var loai_sp = $('.loai_sp').val() || '';
    var kich_thuoc= $('.kich_thuoc').val() || '';
    var kl = $('.kl').val() || '';
    var noi_sx = $('.noi_sx').val() || '';
    var bh = $('.bh').val() || '';
    var cong_nghe = $('.cong_nghe').val() || '';
    var nam = $('.nam').val() || '';
    var tien_ich = $('.tien_ich').val() || '';
    var cong_suat = $('.cong_suat').val() || '';
    var tv_ich =$('.tv_ich').val() || '';
    var phan_giai = $('.phan_giai').val() || '';
    var hdh = $('.hdh').val() || '';
    var ket_noi = $('.ket_noi').val() || '';
    var tv_loa =$('.tv_loa').val() || '';
    var kieu_tu = $('.kieu_tu').val() || '';
    var so_canh = $('.so_canh').val() || '';
    var dung_tich = $('.dung-tich').val() || '';
    var chat_lieu = $('.chat_lieu').val() || '';
    var cn_kk =$('.cn_kk').val() || '';
    var kieu_tu = $('.kieu_tu').val() || '';
    $.ajax({
        url: "http://localhost/web_mvc/Ajax/tskt/"+url,
        method: 'post',
        data: {
            masp: masp,
            loai_sp:loai_sp,
            kich_thuoc:kich_thuoc,
            kl:kl,
            noi_sx:noi_sx,
            bh:bh,
            cong_nghe:cong_nghe,
            nam:nam,
            tien_ich:tien_ich,
            cong_suat:cong_suat,
            tv_ich:tv_ich,
            phan_giai:phan_giai,
            hdh:hdh,
            ket_noi:ket_noi,
            tv_loa:tv_loa,
            kieu_tu:kieu_tu,
            so_canh:so_canh,
            dung_tich:dung_tich,
            cn_kk:cn_kk,
            chat_lieu:chat_lieu
        },
        success:function(data){
            // console.log(data);
            $('input').val('');
        }
    });

}

function insert_sp_tskt(val){
    check_thongso_loai();
 
        if (check_sp() == 'true' && check_thongso() == 'false') {
            showerror('thông số kỹ thuật');
        }
        if(check_sp() == 'false' && check_thongso() == 'true' && check_thongso_loai()=='true') {
            showerror('thông tin sản phẩm');
        }

        if (check_thongso() == 'true' && check_sp() == 'true' && check_thongso_loai() =='true') {
            if(masp = insert_sp(val,'insert')){
                insert_tskt(masp,'insert');
            }
            
        }
}
function update_sp_tskt(val){
    ma_sp= $("#ma_sp").val();
    check_thongso_loai();

        if (check_sp() == 'true' && check_thongso() == 'false') {
            showerror('thông số kỹ thuật');
        }
        if(check_sp() == 'false' && check_thongso() == 'true' && check_thongso_loai()=='true') {
            showerror('thông tin sản phẩm');
        }

        if (check_thongso() == 'true' && check_sp() == 'true' && check_thongso_loai() =='true') {
            insert_tskt(ma_sp,'update');
            insert_sp(val,'update',ma_sp);
              
        }
}


function more_sp(limit){
    $.ajax({
        url: "http://localhost/web_mvc/Ajax/more_sp",
        method: "post",
        data: {limit:limit},
        dataType: 'json',
        success: function(data){
            if(data[0]==0){
                $("#div_view").css("display","none");
            }else{
                $("#div_view").css("display","block");
                $('#view_home').text(data[0]);
                $('.viewmore').data('sl',limit+18);
                
            }
            $("#home_sp").html(data[1]);
        }
    });
}


// thay đổi trạng thái
function change_status_hd(val,id,dk=0){
    id_td = '#'+id;
    txt =".txt_"+id;
    span =".span_"+id;
    btn_td = "#td_ad_"+id;
    $.ajax({
        url: "http://localhost/web_mvc/Ajax/set_status",
        method: "post",
        data:{
            val:val,
            id:id,
            dk:dk
        },
        dataType: "json",
        success: function(data){
            $(id_td).html(data[0]);
            if(data[1]=='true'){
                $(span).text('Đơn hàng đã hủy');
                $(btn_td).html("<button class='btn_cus btn_delete' data-id='"+id+"' >Xóa đơn</button>");
            }
            $(txt).text('Chờ xử lý');
            $(txt).css('background-color','gray');
        }
    });
}