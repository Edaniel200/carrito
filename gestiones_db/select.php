<?php 
	include("gestiones_db/conexion.php");

	class SELECT_QUERY{

		private $SQL = '';
		private $CNX = '';
		private $PREPER = '';
		private $ARGUMENT = '';

		function __construct($cnx, $argument, $sql){

			$this->CNX = $cnx;
			$this->ARGUMENT = $argument;
			$this->SQL = $sql;

			$this->preperSQL();

		}

		private function preperSQL(){

			$this->PREPER = $this->CNX->prepare($this->SQL);

		}

		public function executeByCategory(){

			//echo $this->ARGUMENT;
			$this->PREPER->execute(array(":CAT"=>$this->ARGUMENT));


		}

		public function executeById(){


			$this->PREPER->execute(array(":ID"=>$this->ARGUMENT));


		}
		public function getRecords(){

			return $this->PREPER->fetchAll();
		}


		



}




 ?>