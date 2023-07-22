<?php
//게시판 클래스

class Board
{
    private $conn;
    //생성자
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //게시판목록
    public function list()
    {

        $sql = "Select idx , name, bcode, btype, cnt, date_format(create_at,'%Y-%m-%d %H:%i') create_at 
            From board_manage 
            Order by idx asc ";

        $stmt = $this->conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
