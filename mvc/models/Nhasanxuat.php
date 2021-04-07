<?php 
class Nhasanxuat extends DB {

    public $table = 'nhasanxuat';
    // lấy sản phẩm với tham số cột , sắp xếp, limit
    public function select_all_nsx($column =["*"],$orderbys = [],$limit=18){

        $data = $this->selectall($this->table,$column,$orderbys,$limit);
        return $data;
    }

    public function get_nsx_byId($col,$column ,$id){

        $data = $this->get_col($this->table,$col,$column,$id);
        return $data;
    }

    public function num_rows(){
        return $this->num_row('nhasanxuat');
    }

    public function insert_nsx($ma_nsx,$ten_nsx, $nsx_img,$updated){
        $sql =" INSERT INTO nhasanxuat (`id`, `ma_nsx`, `ten_nsx`, `nsx_img`, `created`, `updated`) 
        values ('', '$ma_nsx', '$ten_nsx', '$nsx_img', current_timestamp(),'$updated')";
        $kq ='';
        if(mysqli_query($this->conn, $sql)){
            $kq = 'true';
        }else {
            $kq = 'false';
        }
        return $kq;
    }
    public function check_nsx($ten){
        $sql = "SELECT * from nhasanxuat where ten_nsx ='$ten'";
        $query = mysqli_query($this->conn,$sql);
        if(mysqli_num_rows($query)>0){
            $kq = "false";
        }else{
            $kq = "true";
        }
        return $kq;
    }
}

?>