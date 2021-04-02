<?php
class sanpham extends DB {
    
    public $table ="sanpham";
    // lấy sản phẩm với tham số cột , sắp xếp, limit
    public function getSP($column =["*"],$orderbys = [],$limit=18){
        
        $data = $this->selectall($this->table,$column,$orderbys,$limit);
        return $data;

    }

    public function find_sp_byID($column,$id){
        $data = $this->find($this->table,$column, $id);
        return $data;
    }
    public function get_sp_byId($col,$column ,$id){

        $data = $this->get_col($this->table,$col,$column,$id);
        return $data;
    }

    public function sptheoloai($column,$val){
        $qr = "SELECT sanpham.*,loaisanpham.ten_loai as ten_loai from sanpham 
                join loaisanpham on sanpham.ma_loai = loaisanpham.ma_loai where sanpham.$column = '$val'";
        $kq = $this->_query($qr);
        return $kq;
    }

    public function filter_data($ma_loai,$gias =[],$hangs=[],$kichco =[],$order){
        $dk = 0;
        $qr ="SELECT * FROM $this->table join thongsokythuat on sanpham.sp_ma = thongsokythuat.ma_sp  WHERE ma_loai =$ma_loai";
        if(!empty($hangs)){
            $dk+=1;
            $hang = implode(',',$hangs);
            $qr .=" ". "and ma_nsx in($hang)";
        }

        if(!empty($kichco)){
            $v = implode(',',$kichco);
            $temp = array_values(explode(",",$v));
            $dem =0;
            $dk +=1;
            for ($i=0; $i < count($temp) ; $i++) { 
                if($temp[$i] == "43"){
                        $qr .=" ". "and kich_co_tv < $temp[$i]";
                        $dem ++;
                }
                if($temp[$i] == "54" && $temp[$i] > 43 ){
                    $dem++;
                    
                    if($dem>1  ){
                        $qr .=" ". "or kich_co_tv between 43 and $temp[$i]";
                    }else{
                        $qr .=" ". "and kich_co_tv between 43 and $temp[$i]";
                    }
                    
                }

                if($temp[$i] == "64" && $temp[$i] > 54){
                    $dem++;
                    if($dem>1){
                        $qr .=" ". "or kich_co_tv between 54 and $temp[$i]";
                    }else{
                        $qr .=" ". "and kich_co_tv between 54 and $temp[$i]";
                    }
                }

                if($temp[$i] == "74" && $temp[$i] > 64){
                    $dem++;
                    if($dem>1){
                        $qr .=" ". "or kich_co_tv between 64 and $temp[$i]";
                    }else{
                        $qr .=" ". "and kich_co_tv between 64 and $temp[$i]";
                    }
                }

                if($temp[$i] == "75"){
                    $dem++;
                    if($dem >1){
                        $qr .=" ". "or kich_co_tv > $temp[$i]";
                    }else{
                        $qr .=" ". "and kich_co_tv > $temp[$i]";
                    }
                }            
            }
            
        }
        if(!empty($hangs)){
            $dk+=1;
            $hang = implode(',',$hangs);
            $qr .=" ". "and ma_nsx in($hang)";
        }
        if(!empty($gias)){
            $gia = implode(',',$gias);
            $mang = array_values(explode(",",$gia));
            $dem = 0;
            for ($i=0; $i < count($mang) ; $i++) { 
                if($mang[$i] == "5000000"){
                        $qr .=" ". "and sp_giaban < $mang[$i]";
                        $dem ++;
                }

                if($mang[$i] == "7000000" && $mang[$i] > 5000000 ){
                    $dem++;
                    if($dem>1){
                        $qr .=" ". "or sp_giaban between 5000000 and $mang[$i]";
                    }else{
                        $qr .=" ". "and sp_giaban between 5000000 and $mang[$i]";
                    }
                
                }

                if($mang[$i] == "12000000" && $mang[$i] > 7000000 ){
                    $dem++;
                    if($dem>1){
                        $qr .=" ". "or sp_giaban between 7000000 and $mang[$i]";
                    }else{
                        $qr .=" ". "and sp_giaban between 7000000 and $mang[$i]";
                    }
                
                }

                if($mang[$i] == "15000000" && $mang[$i] > 12000000 ){
                    $dem++;
                    if($dem>1){
                        $qr .=" ". "or sp_giaban between 12000000 and $mang[$i]";
                    }else{
                        $qr .=" ". "and sp_giaban between 12000000 and $mang[$i]";
                    }
                
                }

                if($mang[$i]=="19999999" && $mang[$i] > 15000000 && $mang[$i]<20000000 ){
                    $dem++;
                    if($dem>1){
                        $qr .=" ". "or sp_giaban between 15000000 and $mang[$i]";
                    }else{
                        $qr .=" ". "and sp_giaban between 15000000 and $mang[$i]";
                    }
                    
                }
                
                if($mang[$i] == "20000000"){
                    $dem++;
                    if($dem>1){
                        $qr .=" ". "or and sp_giaban > $mang[$i]";
                    }else{
                        $qr .=" ". "and sp_giaban > $mang[$i]";
                    }
                
                }
            }
        }
        if(!empty($order)){
            $qr .=" ". "order by sp_giaban $order";
        }

        $kq = null;
        if(mysqli_num_rows(mysqli_query($this->conn,$qr)) >0){
            $kq = $this->_query($qr);
        }
        return $kq;

    }

    public function filter_gia($ma_loai,$order){
        $qr ="SELECT * FROM $this->table  WHERE ma_loai =$ma_loai order by sp_giaban $order ";
        $kq = $this->_query($qr);
        return $kq;
    }

    public function filter_banchay($ma_loai){
        $qr ="SELECT * FROM $this->table  WHERE ma_loai =$ma_loai and sp_sl > 6 ";
        $kq = $this->_query($qr);
        return $kq;
    }



    public function sortSP_theogia($ma_loai,$orderbys){
        $qr ="SELECT * FROM $this->table  WHERE ma_loai = $ma_loai order by sp_giaban $orderbys";
        $kq = $this->_query($qr);
        return $kq;
    }

    public function loc_sp($dk,$val,$column){
        $data = $this->loc($this->table,$dk,$val,$column);
        return $data;

    }

    public function update_sl($masp,$sl){
        $sql = "UPDATE sanpham set sp_sl='$sl' where sp_ma = '$masp'";
        if(mysqli_query($this->conn,$sql)){
            $kq ='true';
        }else{
            $kq = 'false';
        }
        return $kq;
    }
    

    public function search($text,$count=5){
        $sql = "SELECT * from sanpham where sp_name like '%$text%' limit $count";
        
        return $this->_query($sql);
    }

    public function search_home($text,$count=5,$sort,$banchay){
        $sql = "SELECT * from sanpham where sp_name like '%$text%'  ";
        if(!empty($banchay)){
            $sql .=' and sp_sl >'.$banchay;
        }

        if(!empty($sort)){
            $sql .=' order by sp_giaban '.$sort;
        }
        
        $sql .=' limit '. $count;
        return $this->_query($sql);
    }


    public function list_product($text='',$ma_loai='',$ma_nsx='',$count=15){
        $sql ="SELECT * FROM `sanpham` JOIN loaisanpham on sanpham.ma_loai=loaisanpham.ma_loai JOIN nhasanxuat on sanpham.ma_nsx = nhasanxuat.ma_nsx where 1";
        if($text !==''){
            $sql .= " and sanpham.sp_ma like '%$text%' or sanpham.sp_name like '%$text%' ";
        }

        if($ma_loai !==""){
            $sql .= " and sanpham.ma_loai=$ma_loai";
        }
        if(!empty($ma_nsx)){
            $sql .= " and sanpham.ma_nsx=$ma_nsx";
        }
        $sql .= " limit ".$count;
        return $this->_query($sql);
    }
}


?>