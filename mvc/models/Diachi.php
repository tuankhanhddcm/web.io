<?php 
 class Diachi extends DB {

    public function select_tinh(){
        $sql ="SELECT * from province";
        return $this->_query($sql);
    }

    public function select_district($id){
        $sql ="SELECT * from district where _province_id = $id";
        return $this->_query($sql);
    }

    public function select_ward($distr){
        $sql ="SELECT * from ward where  _district_id=$distr ";
        return $this->_query($sql);
    }
    public function select_street($distr){
        $sql ="SELECT * from street where  _district_id=$distr ";
        return $this->_query($sql);
    }
 }

?>