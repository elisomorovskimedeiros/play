<?php
    //namespace controller;
    //use model\cliente;

    include (__DIR__ . "/../model/cliente.php");
    include (__DIR__ . "/../model/evento.php");
    include (__DIR__ . "/../model/brinquedo.php");

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
//#####################################################
//        
//Função que lista todos os brinquedos da base de dados
//
//#####################################################  
        function pesquisarTodosBrinquedos(){
            $stmt = $this->conn->prepare("SELECT * FROM brinquedo");
            $stmt->execute();

            echo "<br>";
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            //$rows = $stmt->fetchAll();
            //print_r($rows);

            foreach ($stmt->fetchAll() as $value) {

                $nome = $value;
                echo "<br>";
                print_r($nome);
                echo "<br>";
            }           
        }

//#############################################################
//        
//Função que lista o número disponível de determinado brinquedo
//
//#############################################################
        function listarQtdBrinquedos($idBrinquedo){
            $stmt = $this->conn->prepare("SELECT quantidade FROM brinquedo WHERE id_brinquedo = :idBrinquedo");
            $stmt->bindParam(':idBrinquedo', $idBrinquedo);
            $stmt->execute();

            foreach ($stmt->fetch() as $value) {
                $qtd = $value; 
            }  
            return $qtd;
        }

        

     

//####################################################
//        
//  Função principal Para inserção de objetos Cliente TESTADO
//
//####################################################
        public function cadastrarCliente($cliente){
            //$this->cadastrarCliente();
            
            
            //primeiro tem que ver se o cliente já existe
            
            if ($this->verSeClienteExiste($cliente->getCpf())){
                echo "Cliente ja existe";
                return 'Cliente ja existe';
            } 
            //caso ainda não exista mesmo o algoritmo insere apartir do objto $cliente recebido via parâmetro           
            else{
                $stmt = $this->conn->prepare("INSERT INTO cliente(nome, CPF, endereco, cidade, telefone) 
                                                VALUES(:nome, :cpf, :endereco, :cidade, :telefone)");
                $stmt->bindParam(':nome', $cliente->getNome());
                $stmt->bindParam(':cpf', $cliente->getCpf());
                $stmt->bindParam(':endereco', $cliente->getEndereco());
                $stmt->bindParam(':cidade', $cliente->getCidade());
                $stmt->bindParam(':telefone', $cliente->getTelefone());

                $result = $stmt->execute();
                if (! $result ){
                    var_dump($stmt->errorInfo());
                    exit;
                }

                echo $stmt->rowCount()."linhas inseridas";
                return 'Cliente inserido com sucesso';
            }
            
        }

        //Função derviada "cadastrarCliente"
        //função recebe a string $cpfCliente via parâmetro e realiza o select na base de dados a partir do cpf do cliente

        

        function verSeClienteExiste($cpfCliente){
            
            print($cpfCliente);
            echo '<br>';
            $stmt = $this->conn->prepare("SELECT COUNT(*) AS 'QTN' FROM cliente where CPF = :cpf");
            $stmt->bindParam(':cpf', $cpfCliente);
            
            $result = $stmt->execute();
            //caso o cpf já exista na base a função retorna true
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            //$rows = $stmt->fetchAll();
            //print_r($rows);
            /*
            foreach ($stmt->fetch() as $value) {
                
                echo "<br>";
                print_r("numero de linhas = ".$value);
                echo "<br>";
            }
            */
            
            foreach ($stmt->fetch() as $value) {
                $resultado = $value; 
            }
            //print_r($resultado);

            return $resultado;
            
        }

        //################################################
        //
        // Função pricipal para inserção de objetos Evento
        //
        //################################################

        function inserirEvento($evento){

            //Inserir o Id do Cliente na variavel $evento->idCliente
            //if(inserirIdCliente($evento){
               // echo 'Favor inserir um cliente antes de inserir o evento';
            //}

            $this->inserirIdCliente($evento);
            //else {

                //Verificar se o evento já existe

                if($this->verificarSeEventoJaExiste($evento)){
                    echo 'Evento ja existe';
                    //return 'Evento ja existe';
                }
                else {

                    $stmt = $this->conn->prepare("INSERT INTO evento(data, endereco, cidade, cliente_id_cliente, valor_total, valor_desconto, valor_sinal) VALUES (:data, :endereco, :cidade, :cliente_id_cliente, :valor_total, :valor_desconto, :valor_sinal)");
                    $stmt->bindParam(':data', $evento->getData());
                    $stmt->bindParam(':endereco', $evento->getEndereco()); 
                    $stmt->bindParam(':cidade', $evento->getCidade());                
                    $stmt->bindParam(':cliente_id_cliente', $evento->getIdCliente());
                    $stmt->bindParam(':valor_total', $evento->getValorTotal());
                    $stmt->bindParam(':valor_desconto', $evento->getDesconto());
                    $stmt->bindParam(':valor_sinal', $evento->getValorSinal());

                    $result = $stmt->execute();

                    echo $stmt->rowCount()."linhas inseridas";
                    echo 'Evento inserido com sucesso';

                }

            //}

        }

        //Função derivada de inserirEvento()
        //Verifica se o evento já foi inserido na base de dados comparando o id do cliente e a data da festa

        function verificarSeEventoJaExiste($evento){

            $stmt = $this->conn->prepare("SELECT COUNT(*) FROM evento WHERE cliente_id_cliente = :idCliente AND data = :data");
            $stmt->bindParam(':idCliente', $evento->getIdCliente());
            $stmt->bindParam(':data', $evento->getData());

            $result = $stmt->execute();

            foreach ($stmt->fetch() as $value) {
                $resultado = $value; 
            }
            //print_r($resultado);

            return $resultado;
        }

        // Função derivada de inserirEvento()
        // Insere o valor de id_cliente no objeto evento. 
        function inserirIdCliente($evento){

            $cpf = $evento->getCpfCliente();
            $stmt = $this->conn->prepare("SELECT id_cliente FROM cliente WHERE CPF = :cpf");
            $stmt->bindParam(':cpf', $cpf);       
            
            $result = $stmt->execute();

            foreach ($stmt->fetch() as $value) {
                $evento->setIdCliente($value); 
            } 
            return true;  
        }

        //#####################################################
        //
        // Função pricipal para inserção de objetos Brinquedo
        //
        //#####################################################

        function inserirBrinquedo($brinquedo){

            if ($this->verSeBrinquedoExiste($brinquedo->getNomeBrinquedo())){
                echo "Brinquedo ja existe";
                return 'Brinquedo ja existe';
            } 
            //caso ainda não exista mesmo o algoritmo insere apartir do objto $brinquedo recebido via parâmetro           
            else{
                $stmt = $this->conn->prepare("INSERT INTO brinquedo(nome_brinquedo, valor_brinquedo, quantidade) 
                                                VALUES(:nome_brinquedo, :valor_brinquedo, :quantidade)");

                $stmt->bindParam(':nome_brinquedo', $brinquedo->getNomeBrinquedo());
                $stmt->bindParam(':valor_brinquedo', $brinquedo->getValorBrinquedo());
                $stmt->bindParam(':quantidade', $brinquedo->getQuantidade());
                

                $result = $stmt->execute();
                if (! $result ){
                    var_dump($stmt->errorInfo());
                    exit;
                }

                echo $stmt->rowCount()."linhas inseridas";
                return 'Cliente inserido com sucesso';
            }            
        }

        function verSeBrinquedoExiste($nomeBrinquedo){
            $stmt = $this->conn->prepare("SELECT COUNT(*) AS 'QTN' FROM brinquedo where nome_brinquedo = :nome");
            $stmt->bindParam(':nome', $nomeBrinquedo);
            
            $result = $stmt->execute();
           
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
         
            
            foreach ($stmt->fetch() as $value) {
                $resultado = $value; 
            }          

            return $resultado;

        }


        //#####################################################
        //
        // Função pricipal para inserção da relação Evento - Brinquedo
        //
        //#####################################################

        function inserirReservaBrinquedos($idEvento, $idBrinquedo){

            //FUNÇÃO QUE VERIFICA SE O BRINQUEDO ESTÁ REALMENTE DISPONÍVEL NESSE DIA
            $this->verificarDisponibilidade($idBrinquedo);

            $stmt = $this->conn->prepare("INSERT INTO evento_contem_brinquedo(id_evento, id_brinquedo) VALUES (:idEvento, $idBrinquedo)");
            $stmt->bindParam(':idEvento', $idEvento);
            $stmt->bindParam(':idCliente', $idCliente);
            $stmt->bindParam(':idBrinquedo', $idBrinquedo);

            $result = $stmt->execute();
            if (! $result ){
                var_dump($stmt->errorInfo());
                exit;
            }
            echo$stmt->rowCount()." linhas inseridas";
            return "relacao inserida com sucesso";
        }


        //Função derivada de inserirReservaBrinquedos()
        //Verifica a quantidade de brinquedos locados num determinado período de tempo.

        function verificarQtdLocacoes($idBrinquedo, $data1, $data2){

            $stmt = $this->conn->prepare("SELECT COUNT(*) FROM evento_contem_brinquedo AS eb JOIN evento AS ev 
                            ON eb.id_evento = ev.id_evento  WHERE ev.data BETWEEN (:data1) AND (:data2) AND eb.id_brinquedo = :idBrinquedo");
            $stmt->bindParam(':data1', $data1);
            $stmt->bindParam(':data2', $data2);
            $stmt->bindParam(':idBrinquedo', $idBrinquedo);
            $result = $stmt->execute();

            foreach ($stmt->fetch() as $value) {
                $resultado = $value; 
            }  
            return $resultado;
        }

        function verificarDisponibilidade($evento, $brinquedo){

            $qtdDeBrinquedosLocados = $this.verificarQtdLocacoes($brinquedo->getIdBrinquedo(), $evento->getData(), $evento->getData());
            $qtdDeBrinquedosDisponiveis = $this.listarQtdBrinquedos($brinquedo->getIdBrinquedo());

            if($qtdDeBrinquedosDisponiveis > $qtdDeBrinquedosLocados) {
                return true;
            }
            else return false;
        }
    }

?>