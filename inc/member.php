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

    //이메일 형식체크
    public function email_format_check($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
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
    public function input($marr)
    {
        //단방향 암호화
        $new_hash_password = password_hash($marr['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO member(id, name, password, email, zipcode, addr1, addr2, photo, create_at, ip) VALUES
        (:id, :name, :password, :email, :zipcode, :addr1, :addr2,  :photo,NOW(), :ip)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $marr['id']);
        $stmt->bindParam(':name', $marr['name']);
        $stmt->bindParam(':password', $new_hash_password);
        $stmt->bindParam(':email', $marr['email']);
        $stmt->bindParam(':zipcode', $marr['zipcode']);
        $stmt->bindParam(':addr1', $marr['addr1']);
        $stmt->bindParam(':addr2', $marr['addr2']);
        $stmt->bindParam(':photo', $marr['photo']);
        $stmt->bindParam(':ip', $_SERVER['REMOTE_ADDR']);
        $stmt->execute();
    }

    //로그인
    public function login($id, $pw)
    {

        //password_verify($password, $new_password)


        $sql = "SELECT password FROM member WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        //$stmt->bindParam(':password', $pw);
        $stmt->execute();

        if ($stmt->rowCount()) {
            $row = $stmt->fetch();
            if (password_verify($pw, $row['password'])) {
                $sql = "Update member Set login_dt = now() Where id = :id";

                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
        //조회된 데이터가 1개라도 있음면 
        //echo $stmt->rowCount();
        //return $stmt->rowCount() ? true : false;
    }


    public function logout()
    {
        session_start();
        session_destroy();
        die('<script>self.location.href = "../index.php";</script>');
    }

    public function getInfoFormIdx($idx)
    {
        $sql = "Select * From member Where idx = :idx";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':idx', $idx);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function getInfo($id)
    {
        $sql = "Select * From member Where id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function edit($marr)
    {
        $sql = "Update member Set  name=:name, email=:email, zipcode=:zipcode, addr1=:addr1, addr2=:addr2 , photo=:photo ";
        $params = [
            ':name' => $marr['name'],
            ':email' => $marr['email'],
            ':zipcode' => $marr['zipcode'],
            ':addr1' => $marr['addr1'],
            ':addr2' => $marr['addr2'],
            ':photo' => $marr['photo']
        ];
        if ($marr['password'] != '') {
            //단방향 암호화
            $new_hash_password = password_hash($marr['password'], PASSWORD_DEFAULT);
            $params[':password'] = $new_hash_password;
            $sql .= ", password=:password";
        }

        if ($_SESSION['ses_level'] == 10 && isset($marr['idx']) && $marr['idx'] != '') {
            $params[':level'] = $marr['level'];
            $params[':idx'] = $marr['idx'];
            $sql .= ', level=:level';
            $sql .= "Where idx =:idx";
        } else {
            $params[':id'] = $marr['id'];
            $sql .= " Where id=:id ";
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
    }


    public function list($page, $limit, $paramArr)
    {
        $start = ($page - 1) * $limit;
        $where = "";
        if ($paramArr['sn'] != '' && $paramArr['sf'] != '') {
            switch ($paramArr['sn']) {
                case '1':
                    $sn_str = 'name';
                    break;
                case '2':
                    $sn_str = 'id';
                    break;
                case '3':
                    $sn_str = 'email';
                    break;
            }
            $where = "Where " . $sn_str . '=:sf ';
        }

        $sql = "Select idx, id, name, email, date_format(create_at,'%Y-%m-%d %H:%i') create_at 
            From member " . $where . "
            Order by idx desc Limit " . $start . "," . $limit;

        $stmt = $this->conn->prepare($sql);

        if ($where != '') {
            $stmt->bindParam(':sf', $paramArr['sf']);
        }
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function total($paramArr)
    {
        $where = "";
        if ($paramArr['sn'] != '' && $paramArr['sf'] != '') {
            switch ($paramArr['sn']) {
                case '1':
                    $sn_str = 'name';
                    break;
                case '2':
                    $sn_str = 'id';
                    break;
                case '3':
                    $sn_str = 'email';
                    break;
            }
            $where = " Where " . $sn_str . '=:sf ';
        }

        $sql = "Select Count(*) cnt From member " . $where;
        $stmt = $this->conn->prepare($sql);
        if ($where != '') {
            $stmt->bindParam(':sf', $paramArr['sf']);
        }
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row['cnt'];
    }


    public function getAllData()
    {
        $sql = "Select * From member Order by idx desc ";

        $stmt = $this->conn->prepare($sql);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function member_del($idx)
    {
        $sql = "Delete From member Where idx=:idx";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':idx', $idx);
        $stmt->execute();
    }



    //프로필이미지 업로드
    public function profile_upload($id, $new_photo, $old_photo = '')
    {
        if ($old_photo != '') {
            unlink(PROFILE_DIR . $old_photo); //삭제
        }

        $tmparr = explode('.', $new_photo['name']);
        $ext = end($tmparr); //확장자 추출
        $photo = $id . '.' . $ext;  //새로운 파일명
        copy($new_photo['tmp_name'], PROFILE_DIR . '/' . $photo);

        return $photo;
    }
}
