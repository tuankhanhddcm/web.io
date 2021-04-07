<?php 
class Usermodel extends DB {

    public $tableUser = 'user';
    public $tableuser_group = 'user_group';


    public function select_all_user($column =["*"],$orderbys = [],$limit=18){

        $data = $this->selectall($this->tableUser,$column,$orderbys,$limit);
        return $data;
    }

    public function inseruser($username,$pass,$hoten,$sdt,$email,$diachi,$fb_id,$gg_id, $avatar, $user_group_id,$updated){
        $sql ="INSERT INTO user (id, username, password, ho_ten, sdt, email, diachi, fb_id,gg_id,avatar,user_group_id,created,updated) 
        VALUES ('', '$username', '$pass','$hoten', '$sdt', '$email','$diachi', '$fb_id', '$gg_id', '$avatar', ' $user_group_id', current_timestamp(), '$updated')";
        $query = mysqli_query($this->conn,$sql);
        if($query){
            $kq = "true";
        }else{
            $kq = "false";
        }
        return $kq;
    }
    
    public function checkuser($user){
        $sql = "SELECT * from user where username ='$user'";
        $query = mysqli_query($this->conn,$sql);
        if(mysqli_num_rows($query)>0){
            $kq = "false";
        }else{
            $kq = "true";
        }
        return $kq;
    }
    
    public function checksdt($sdt){
        $sql = "SELECT * from user where sdt ='$sdt'";
        if(mysqli_num_rows(mysqli_query($this->conn,$sql))>0){
            $result = "false";
        }else{
            $result = "true";
        }
        return $result;
    }

    public function check_login($user){
        $sql = "SELECT * from user where username ='$user'";
        return $this->fristquery($sql);
    }

    public function update_user($user,$pass,$hoten,$sdt,$email,$diachi,$avatar,$updated){
        $sql ="UPDATE `user` SET `password`='$pass',`ho_ten`='$hoten',
                `sdt`='$sdt',`email`='$email',`diachi`='$diachi',`avatar`='$avatar',`updated`='$updated' WHERE username ='$user'";
        if(mysqli_query($this->conn,$sql)){
            $kq = 'true';
        }else{
            $kq = 'false';
        }
        return $kq;
    }
}

?>