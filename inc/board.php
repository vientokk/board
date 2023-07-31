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


    //게시판 생성
    public function create($arr)
    {
        $sql = "Insert Into board_manage (name, bcode, btype, create_at) values (
        :name, :bcode, :btype, NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $arr['name']);
        $stmt->bindParam(':bcode', $arr['bcode']);
        $stmt->bindParam(':btype', $arr['btype']);
        $stmt->execute();
    }

    //게시판idx로 게시판 정보 가져오기
    public function getBcode($idx)
    {
        $sql = "Select bcode From board_manage  where idx=:idx";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':idx', $idx);
        $stmt->setFetchMode(PDO::FETCH_COLUMN, 0);
        $stmt->execute();
        return $stmt->fetch();
    }

    //게시판 삭제
    public function delete($idx)
    {

        $bcode = $this->getBcode($idx);

        $sql = "Delete From board_manage Where idx=:idx";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':idx', $idx);
        $stmt->execute();

        $sql = "Delete From board_manage Where bcode=:bcode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':bcode', $bcode);
        $stmt->execute();
    }

    //게시판 코드 생성
    public function bcode_create()
    {
        $letter = range('a', 'z');
        $bcode = '';
        for ($i = 0; $i < 6; $i++) {
            $r = rand(0, 25);
            $bcode .= $letter[$r];
        }
        return $bcode;
    }
}
