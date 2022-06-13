<?php
class DBController {

    function __construct() {
        $this->conn = $this->connectDB();
	}

	function connectDB() {

		$pdo = new PDO('mysql:host=localhost;port=3306;dbname=db_auth','root', 'test');
		// See the "errors" folder for details...
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}

    function runBaseQuery($query) {
                $statemnt = $pdo-> query($this->conn,$query);
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $resultset[] = $row;
                }
                if(!empty($resultset))
                return $resultset;
    }



    function runQuery($query, $param_type, $param_value_array) {

        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        $result = $sql->fetchAll();
				$sql->setFetchMode(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            foreach ($result as $row) {
                $resultset[] = $row;
            }
        }

        if(!empty($resultset)) {
            return $resultset;
        }
    }

    function bindQueryParams($sql, $param_type, $param_value_array) {
			if ($param_type == 's') {
				$sql-> bindParam(1,$param_value_array[0],PDO::PARAM_STR);
			}
			elseif ($param_type == 'si') {
				$sql-> bindParam(1,$param_value_array[0],PDO::PARAM_STR);
				$sql-> bindParam(2,$param_value_array[1],PDO::PARAM_INT);
			}
			elseif ($param_type == 'ii') {
				$sql-> bindParam(1,$param_value_array[0],PDO::PARAM_INT);
				$sql-> bindParam(2,$param_value_array[1],PDO::PARAM_INT);
			}
			elseif ($param_type == 'ssss') {
				$sql-> bindParam(1,$param_value_array[0],PDO::PARAM_STR);
				$sql-> bindParam(2,$param_value_array[1],PDO::PARAM_STR);
				$sql-> bindParam(3,$param_value_array[2],PDO::PARAM_STR);
				$sql-> bindParam(4,$param_value_array[3],PDO::PARAM_STR);
			}
    }

    function insert($query, $param_type, $param_value_array) {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
    }

    function update($query, $param_type, $param_value_array) {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
    }
}
?>
