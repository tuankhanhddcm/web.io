<?php 
class Thongsokythuat extends DB {

    public $table = 'thongsokythuat';
    // lấy sản phẩm với tham số cột , sắp xếp, limit

    public function get_thongso_byId( $id){
        $sql = "SELECT * FROM thongsokythuat join sanpham on thongsokythuat.ma_sp=sanpham.sp_ma where ma_sp = '$id'";  
        return $this->fristquery($sql);
    }


    
    public function _insert($val1,$val2,$val3,$val4,$val5,$val6,$val7,$val8,$val9,$val10,$val11,$val12,$val13,$val14,$val15,$val16,$val17,$val18,$val19,$val20,$val21){
        $sql = "INSERT into thongsokythuat (`id`, `ma_sp`, `kieu_tu`, `so_canh_cua`, `dung_tich`, `cong_nghe`, `chat_lieu`,
        `noi_san_xuat`, `nam_sx`, `loai_sp`, `kich_co_tv`, `do_phan_giai`, `kich_thuoc`, `tinh_nang`, `ung_dung`, `ket_noi`, `cong_suat`, `loa`, `he_dieu_hanh`, `khoi_luong`, `bao_hanh`, `created`, `updated`)
        values('','$val1','$val2','$val3','$val4','$val5','$val6','$val7','$val8','$val9','$val10','$val11','$val12','$val13','$val14','$val15','$val16','$val17','$val18','$val19','$val20',current_timestamp(),'$val21')";
        if(mysqli_query($this->conn,$sql)){
            return 'true';
        }
    }
    public function _update($ma_sp,$val1,$val2,$val3,$val4,$val5,$val6,$val7,$val8,$val9,$val10,$val11,$val12,$val13,$val14,$val15,$val16,$val17,$val18,$val19,$val20){
        $sql = "UPDATE thongsokythuat set `kieu_tu`='$val1', `so_canh_cua`='$val2', `dung_tich`='$val3', `cong_nghe`='$val4', `chat_lieu`='$val5',
        `noi_san_xuat`='$val6', `nam_sx`='$val7', `loai_sp`='$val8', `kich_co_tv`='$val9', `do_phan_giai`='$val10', `kich_thuoc`='$val11', `tinh_nang`='$val12', `ung_dung`='$val13', `ket_noi`='$val14', `cong_suat`='$val15', `loa`='$val16', `he_dieu_hanh`='$val17', `khoi_luong`='$val18', `bao_hanh`='$val19',  `updated`='$val20'
            where ma_sp='$ma_sp'";
        echo $sql;
        if(mysqli_query($this->conn,$sql)){
            
            return 'true';
        }
    }
}

?>