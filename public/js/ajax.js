$(document).ready(function () {
    //click button sapxep
    $("#giacao").click(function () {
        filter_data($('#giacao').val());
    })
    $("#giathap").click(function () {
        filter_data($('#giathap').val());
    })

    // click button bán chạy
    $("#banchay").click(function () {
        filter_banchay();
    })

    $(".form-check-input").click(function () {
        filter_data('');
    })

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

    $('.select-loaisp').click(function () {
        check("#loaisp");
    });

    $('.select-loaisp').click(function () {
        check("#loaisp");
    });

    $(".btn-save").click(function () {
        check("#loaisp");
        check("#loainsx");
        check(".sp");
        check(".sl");
        check(".gia");
        check(".giaban");
        check('#file_upload');
        if (check("#loaisp") == 'true' && check("#loainsx") == 'true'
            && check(".sl") == 'true' && check(".sp") == 'true'
            && check(".gia") == 'true' && check(".giaban") == 'true' && check("#file_upload") == 'true') {
            insert_sp();
            showinsert_pr();
        }
        

    });


    $('.href_sp').click(function(){
        location.href=' http://localhost/web_mvc/Admin/list_sp';
        
    });

});




function filter_data(order) {
    var action = 'fetch_data';
    var gia = get_filter("gia")
    var nsx = get_filter("hang");
    var kich_co = get_filter("removebtn");
    var ma_loai = $('#ma_loai').val();
    $.ajax({
        url: "../Ajax/filter_data",
        method: "POST",
        data: {
            action: action,
            nsx: nsx,
            gia: gia,
            ma_loai: ma_loai,
            kich_co: kich_co,
            order: order
        },
        success: function (data) {
            $('#danhmuc').html(data);
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

// lọc theo giá
function filter_gia(gia) {
    var ma_loai = $('#ma_loai').val();
    var order = gia;
    $.ajax({
        url: "../Ajax/loctheogia",
        method: "POST",
        data: {
            ma_loai: ma_loai,
            order: order
        },
        success: function (data) {
            $('#danhmuc').html(data);
        }
    });
}
function filter_gia_search(gia) {
    var sort = gia;
    $.ajax({
        url: "../Ajax/filter_search",
        method: "POST",
        data: {
            sort: sort
        },
        success: function (data) {
            $('#danhmuc').html(data);
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
            console.log(data);
        }
    });

}

//check input rỗng
function check(id) {
    var dk = id.slice(1);
    switch (dk) {
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
        case 'sp': text = 'nhập tên sản phẩm';
            break;
        case 'sl': text = 'nhập số lượng';
            break;
        case 'gia': text = 'nhập giá vốn';
            break;
        case 'giaban': text = 'nhập giá bán';
            break;
        case 'loaisp': text = 'chọn nhóm hàng hóa';
            break;
        case 'loainsx': text = 'chọn thương hiệu';
            break;
        case 'file_upload': text = 'chọn hình ảnh';
            break;
        case 'pass_again': text = 'nhập lại mật khẩu';
            break;
    }
    if ($(id).val() == "") {
        $(id).addClass('error_input');
        $("." + dk + "_icon").css("display", "block");
        $(".error_" + dk).text("Vui lòng  " + text);
        $(".error_" + dk).css("display", "block");
        return "false";
    } else {
        $(id).removeClass('error_input');
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
    if (check('#pass')) {
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
    load =''
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
            if(load =='insert'){
                location.href ="http://localhost/web_mvc/Admin/list_sp";
            }
            if(load == 'addsp'){
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
        load:'addsp'
    });
    setTimeout(function () {
        location.reload();
    }, 3500);
}

function showinsert_pr(){
    toast({
        title: 'Thành công !',
        message: "Bạn tạo sản phẩm thành công",
        type: "success",
        duration: 2000,
        load:'insert'
    });
    setTimeout(function () {
        location.href='http://localhost/web_mvc/Admin/list_sp';
    }, 2500);
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
                } else {
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
                    } else {
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
                    } else {
                        $('#street').prop('disabled', true);
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


function insert_sp() {
    var tensp = $('.sp').val();
    var sl = $('.sl').val();
    var txt_gia = $('.gia').val();
    var txt_giaban = $('.giaban').val();
    var maloai = $('#loaisp option:selected').val();
    var mansx = $('#loainsx option:selected').val();
    var file = $('#file_upload').prop('files')[0];
    var sp_mota = $("#mota").val();
    var match = ["image/gif", "image/png", "image/jpg", "image/jfif", "image/jpeg"];
    var gia = txt_gia.slice(0, txt_gia.search('₫'));
    gia = gia.replaceAll('.', '');
    var giaban = txt_giaban.slice(0, txt_giaban.search('₫'));
    giaban = giaban.replaceAll('.', '');
    if (tensp != '' && sl != '' && gia != '' && giaban != '' && maloai != '' && mansx != '') {
        var type = file.type;
        var name = file.name;
        var form_data = new FormData();
        if (type == match[0] || type == match[1] || type == match[2] || type == match[3] || type == match[4]) {
            form_data.append('file', file);
            $.ajax({
                url: "../Ajax/upload_file",
                method: "post",
                processData: false,
                contentType: false,
                mimeType: "multipart/form-data",
                data: form_data,

            });
        }
        $.ajax({
            url: '../Ajax/insert_sp',
            method: 'post',
            data: {
                tensp: tensp,
                sl: sl,
                gia: gia,
                giaban: giaban,
                maloai: maloai,
                mansx: mansx,
                img: name,
                sp_mota: sp_mota
            },
        });

    }

}