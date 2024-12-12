<?php
    include "conexao.php";
    
    $login = isset($_POST["id_cpf"]) ? addslashes(trim($_POST["id_cpf"])) : FALSE;
   
    $senha = isset($_POST["senha"]) ? (trim($_POST["senha"])) : FALSE;

    $SQL = "SELECT * FROM cadastro WHERE id_cpf = '$login'";
    $result_id = @mysqli_query($con, $SQL) or die("Erro no banco de dados!");
    $total = @mysqli_num_rows($result_id);

    if($total)
    {
    
        $dados = $result_id->fetch_array();

        if(!strcmp($senha, $dados["senha"]))
        { 
            echo "Login válido!";
            
            session_start(); 
            $_SESSION['usuario'] = $dados["id_cpf"]; 
            $_SESSION['nome_ususario'] = $dados["nome"]; 
        
            header("Location: post_img.php");
            
            exit;
	}
    else{
        header("Location: login.php");
    }
}