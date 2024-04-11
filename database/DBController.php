<?php

class DBController
{
    // Database Connection Properties
    protected $host = ;
    protected $user = ;
    protected $password =;
    protected $database = ;

    // connection property
    public $con = null;

    // call constructor
    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if ($this->con->connect_error){
            echo "Fail " . $this->con->connect_error;
        }
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    // for mysqli closing connection
    protected function closeConnection(){
        if ($this->con != null ){
            $this->con->close();
            $this->con = null;
        }
    }

    function runQuery($query, $param_type, $param_value_array)
    {
        $sql = $this->con->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        $result = $sql->get_result();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        
        if (! empty($resultset)) {
            return $resultset;
        }
    }

    function bindQueryParams($sql, $param_type, $param_value_array)
    {
        $param_value_reference[] = & $param_type;
        for ($i = 0; $i < count($param_value_array); $i ++) {
            $param_value_reference[] = & $param_value_array[$i];
        }
        call_user_func_array(array(
            $sql,
            'bind_param'
        ), $param_value_reference);
    }

    function insert($query, $param_type, $param_value_array)
    {
        $sql = $this->con->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
    }
}
?>


