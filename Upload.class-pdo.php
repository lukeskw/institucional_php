<?php
require_once "Conexao.class-pdo.php";

class Upload{
	//ATRIBUTOS 
	private $con;

	private $idUploadArquivo;

	private $arquivo;
	
//CONSTRUTOR
public function __construct(){
	$this->con = new Conexao();

}

	//MOSTRANDO AS INFORMAÇÕES QUE ESTÃO NA TABELA
	public function querySelect(){
		
			//LISTANDO AS INFORMAÇÕES
			$select = $this->con->conectar()->prepare("SELECT `id`,`caminho` FROM `slider`;");
			$select ->execute();
			return $select ->fetchAll();
			
	}
	//RESPONSAVEL POR BUSCAR NA TABLE AS INFORMAÇÔES E REGISTRO SELECIONADO PARA DELETE
	public function querySelecionar($vlr){
		
			$this->idUploadArquivo = $vlr;
			//SELECIONADO INFORMAÇÃO
			$cst = $this->con->conectar()->prepare("SELECT `id` 
													WHERE `id` = :id;");
			$cst->bindParam(':id', $this->idUploadArquivo, PDO::PARAM_INT);
			$cst->execute();
			return $cst->fetch();
		
	}
	
	public function queryInsert($caminho){
						//3º PARTE (ALTERANDO O NOME DO ARQUIVO E ENVIANDO PARA PASTA QUE LHE FOI DESTINADA)						
			
		// if(isset($_POST['upload'])){
	
	
		// $sql = $conn->query("INSERT INTO slider (caminho) VALUES ('$path')");
	
		// if($sql){
		// 	move_uploaded_file($_FILES['image']['tmp_name'], $path);
		// }

		
					//CADASTRANDO AS INFORMAÇÕES
					$cst = $this->con->conectar()->prepare("INSERT INTO slider (caminho) VALUES ('$caminho')");
					
					if($cst->execute()){
						//  move_uploaded_file($_FILES[$image], $caminho);
						header('location: function.php');
					}
				
				
			
		}
		
	
	//DELETANDO A INFORMAÇÃO DA TABELA E A IMAGEM
	public function queryDelete($vlr){

			$this->idUploadArquivo = $vlr;
			//REMOVENDO A IMAGEM
			$rst = $this->querySelecionar($this->idUploadArquivo);
		
			unlink($_SERVER['DOCUMENT_ROOT'].'images/'. $rst['arquivo']);
			//DELETANDO A INFORMAÇÃO DO TABELA
			$cst = $this->con->conectar()->prepare("DELETE FROM `slider` WHERE `id` = :id;");			
			$cst->bindParam(':id', $this->idUploadArquivo, PDO::PARAM_INT);
			if($cst->execute()){
				header('location: function.php');
			}
		
	}
	
}

?>