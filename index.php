<?php
include_once(__DIR__."/conexao.php");
include_once(__DIR__."/php/class/XmlDomConstruct.class.php");

try{

		
		/* //Conexão Mysql
		echo "Exemplo de conexão com servidor mysql usando PDO da linguagem php"; 
		$conexao = new Conexao();
		$conn = $conexao->conectar();

		$select = $conn->query("SELECT * FROM ALUNO");
		$result = $select->fetchAll();
		//$result = $stmt->fetch(PDO::FETCH_ASSOC);

		if($result){
			//return true;
			print_r($result);
			//exit;
		}
		else{
		//return false;
		echo "não existem resultados";
		}
		*/

		  // conexão SqlServer
		$conn = null;
		
		echo "Exemplo de conexão com servidor sql server usando PDO da linguagem php"; 
		$conexao = new Conexao('sqlsrv');
		$conn = $conexao->conectar();

		$result = $conn->query("SELECT * FROM SGU.dbo.Usuario");
		
	

		//$result = $result->fetchAll();
		//$result = $result->fetch(PDO::FETCH_ASSOC);

		/*
		if($result){
			//return true;
			print_r($result);
			//exit;
		}
		else{
		//return false;
		echo "não existem resultados";
		}
		*/
		
		/*
		if($result!==false){
			$retorno = array();
			if($result->fetchColumn() > 0){ 

                while ( $row = $result->fetch( PDO::FETCH_ASSOC ) ){ 

                       $retorno['usuarios'][] = ['matricula'=> $row['FK_Senior_Matricula'] ,'nome' => $row['Nome']]; 
                                        
                } 

           } 	

		}
		//echo "<pre>";	
		//print_r($retorno);

		
		$dom = new XmlDomConstruct('1.0', 'utf-8');
		$dom->fromMixed($retorno);
		echo $dom->saveXML();
		
		*/
		
		
		
		if($result!==false){
			$retorno = array();
			if($result->fetchColumn() > 0){ 

				$xml = new DOMDocument('1.0', 'utf-8');
				//$xml->preserveWhitespace = false;
				$xml->formatOutput = true;
				$usuarios = $xml->createElement('usuarios');
				
				
                while ( $row = $result->fetch( PDO::FETCH_ASSOC ) ){ 


                    //$retorno['usuarios'][] = ['matricula'=> $row['FK_Senior_Matricula'] ,'nome' => $row['Nome']]; 
                	$usuario = $xml->createElement('usuario');
					
					$matricula = $xml->createElement('matricula',$row['FK_Senior_Matricula']);
					$nome = $xml->createElement('nome',$row['Nome']);


					$usuario->appendChild($matricula);
					$usuario->appendChild($nome);

					$usuarios->appendChild($usuario);	                        
                }

                $xml->appendChild($usuarios);
                //echo $xml->saveXML(); 
                //echo "Escrito ".$xml->save("./tmp/usuarios.xml")." por Adalberto."; 

           } 	

		}

		ini_set('default_charset', 'utf8');
		$xml = simplexml_load_file("./tmp/usuarios.xml");	

		foreach($xml->usuario as $usuario){
			echo "</br>".$usuario->matricula." - ".$usuario->nome; 
		}
		//echo "<pre>";	
		//print_r($retorno);


		$conn = null;


} //catch(Exception $e){
catch (PDOException $e) {	
	//throw new Exception("Erro: " . $e->getMessage(), 1);
	 die ("Erro na conexao com o banco de dados: ".$e->getMessage());
}

?>