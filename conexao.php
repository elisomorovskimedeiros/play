<?php



    class Conexao{


        private $host = "localhost";
        private $db = "play";
        private $usuario = "root";
        private $senha = "";
        private $conn;
        function __construct(){
            try{
                $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->usuario, $this->senha);

                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }catch(PDOException $e){
                echo "Não rolou!!". $e->getMessage();
            }
            //return $this;
        }

        //function fecharConexao(){
        //    $conn = null;

        //}

        function pesquisarTodosBrinquedos(){
            $stmt = $this->conn->prepare("SELECT * FROM brinquedo");
            $stmt->execute();

            echo "<br>";
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $key => $value) {

                $nome = $value["nome"];
                echo "<br>";
                echo $nome."<br>";
        }

    }

}




?>