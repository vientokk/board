<?php
//Member Class file

class Member
{
    private $conn;
    //생성자
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //아이디 중복체크용 
    public function id_exists($id)
    {
        $sql = "Select * From member Where id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        //조회된 데이터가 1개라도 있음면 
        //echo $stmt->rowCount();
        return $stmt->rowCount() ? true : false;
    }


    //이메일 중복체크용 
    public function email_exists($email)
    {
        $sql = "Select * From member Where email=:email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        //조회된 데이터가 1개라도 있음면 
        //echo $stmt->rowCount();
        return $stmt->rowCount() ? true : false;
    }

    //회원정보 입력
    public function input($marray)
    {

        var_dump($marray);
    }
}
