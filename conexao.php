<?php
/**
 * Classe Conexao
 * @author Adalberto Silveira Nápoles
 * @since 2018
 **/

//include_once(__DIR__."/config/db_mysql.inc.php");
include_once(__DIR__."/config/db_mysql.inc.php");

class Conexao {

	protected static $conn;
	protected static $drive;
	protected static $host;
	protected static $port;
	protected static $dbName;
	protected static $user;
	protected static $password;
	protected static $conLyceum_s;
	function __construct($drive = 'mysql'){
		//print_r(const1);
		//exit;
		
		switch($drive){

			case 'mysql':{
				//print_r(HOST1);
				//exit;
				
				/*
				self::$drive = $MYSQL["drive"];
				self::$host = $MYSQL["host"];
				self::$dbName = $MYSQL["database"];
				self::$user = $MYSQL["user"];
				self::$password = $MYSQL["password"];
				*/
				
				self::$drive = DRIVE;
				self::$host  = HOST;
				self::$dbName = DATABASE;
				self::$user   = USER;
				self::$password = PASSWORD;
				self::$port = PORT;

				self::$conn = new PDO(self::$drive . ':host=' . self::$host . ';dbname=' . self::$dbName, self::$user, self::$password);
				self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$conn->exec("SET NAMES utf8");
				break;
				//echo "conectado em mysql1";
				//  Conexão MYSQL
		    
			 //    self::$conn = new PDO(self::$drive . ':host=' . self::$host . ';dbname=' . self::$dbName, self::$user, self::$password);
				// self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				// self::$conn->exec("SET NAMES utf8");
				// break;
			}
			case 'sqlsrv':{
				//echo "conectado em sql server";
				// Conexão SQL Server
				//  versão 1 de conexão com windows.
				include_once(__DIR__."/config/db_sqlsrv.inc.php");
				
				self::$drive = $SQLSRV["drive"];
				self::$host = $SQLSRV["host"];
				self::$port = $SQLSRV["port"];
				self::$dbName = $SQLSRV["database"];
				self::$user = $SQLSRV["user"];
				self::$password = $SQLSRV["password"];
				echo "</br>";
				echo "sqlsrv:Server=".self::$host.",".self::$port.";Database=".self::$dbName;
				echo "</br>";
				self::$conn = new PDO("sqlsrv:Server=".self::$host.",".self::$port.";Database=".self::$dbName,self::$user,self::$password);
				
				self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				// versão 2 de conexão com linux.
				/*
				if(!isset(self::$conLyceum_s)):
				    //$db = $this->config();
				    try{
				      self::$conLyceum_s = new PDO('dblib:host='.$db['LYCEUM']['HOST'].';dbname='.$db['LYCEUM']['DB'], $db['LYCEUM']['USER'], $db['LYCEUM']['PASS']);
				      self::$conLyceum_s->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				      self::$conLyceum_s->exec($db['LYCEUM']['CONFIG']);
				    }catch(PDOException $e){
				      //print 'Erro na conexão MSSQL Lyceum '.$e->getMessage().'<br>';
				      throw($e);
				    }
				   
				endif;
					
				break;
				*/
			}
			default:{
				self::$drive = DRIVE;
				self::$host = HOST;
				self::$dbName = DATABASE;
				self::$user = USER;
				self::$password = PASSWORD;
				break;
			}	


		}

		
		

		/*
		self::$conn = new PDO($drive . ':host=' . $host . ';dbname=' . $dbName, $user, $password);
		self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		self::$conn->exec("SET NAMES utf8");
		try {
			// Conexão sql server
		    
		    self::$conn = new PDO("sqlsrv:Server=$servername,$port;Database=$dbname",$username,$password);

		    self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		    self::$conn->exec("SET NAMES utf8");
		    //  Conexão MYSQL
		    
		    //self::$conn = new PDO($drive . ':host=' . $host . ';dbname=' . $dbName, $user, $password);
			//self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//self::$conn->exec("SET NAMES utf8");
			
		} catch (PDOException $e) {
		    die ("Erro na conexao com o banco de dados: ".$e->getMessage());
		}
		*/

	}

	 

	public function conectar(){
		if (!self::$conn) {
			new Conexao();
		}

		return self::$conn;
	}
}


?>