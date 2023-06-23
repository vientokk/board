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
}
