<?php
	// Criando conexão entre php e mysql
	class db{		

		// host
		private $host = 'localhost';

		// usuario
		private $usuario = 'root';

		// senha
		private $senha = '1234';

		// banco de dados
		private $database = 'musicas';

		// função criada para inserção 
		public function conecta_mysql(){
			
			$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

			// ajustar o chaset de comunicação entre a aplicação e o banco de dados
			mysqli_set_charset($con, 'utf8');

			// verificar se há erro de conexão
			if(mysqli_connect_errno()){
				echo 'Erro ao tentar se conectar com banco de dados mysql: '.mysqli_connect_error();
			}
			return $con;
		}
	}
?>