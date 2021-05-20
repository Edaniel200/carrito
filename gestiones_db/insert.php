<?php 


	class INSERT{

		private $SQL = '';
		private $CNX = '';
		private $PREPER = '';
		private $ARGUMENT = '';

		function __construct($cnx, $argument, $sql){

			$this->CNX = $cnx;
			$this->ARGUMENT = $argument;
			$this->SQL = $sql;


			print_r( $argument);
			$this->preperSQL();

		}

		private function preperSQL(){

			$this->PREPER = $this->CNX->prepare($this->SQL);

		}

		public function executeInsert(){


			$this->PREPER->execute(array(":NOM"=>$this->ARGUMENT["nombre"],":APE"=>$this->ARGUMENT["apellidos"], ":DIR"=>$this->ARGUMENT["direccion"], ":CONTRA"=>$this->ARGUMENT["contrasena"], ":US"=>$this->ARGUMENT["correo"]));



		}
		public function getAffected(){

			return $this->PREPER->rowCount();

		}



}




 ?>