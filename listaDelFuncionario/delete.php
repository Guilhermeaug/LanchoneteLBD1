<?php
    //pdo mysql
    $pdo = new PDO('mysql:host=127.0.0.1:3308;dbname=lanchonete','root','');

    function deleteNotaFiscal($id,$pdo){

        $sql = "DELETE FROM `nota_fiscal`
        WHERE funcionario_id_funcionario='$id'";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        $id = $_GET['deleteid'];

        deleteNotaFiscal($id,$pdo);
        
        $sql = "DELETE FROM `funcionario`
        WHERE id_funcionario='$id'";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        

         header('Location: ../index.php');
      }

?>