<?php

include_once ('request.php');
include_once ('db_manager.php');

class ResourceController
{

	//private $connection;


	//public function __construct() 

	//{
	//	$this->connection = new DBConnector();	
	//}

		
 	private $METHODMAP = ['GET' => 'search' , 'POST' => 'create' , 'PUT' => 'update', 'DELETE' => 'remove' ];
	
	public function treat_request($request) {
		if($request->getMethod() == "POST" && $request->getOperation() == "auth")
		{
			return $this->auth($request);
		}
		return $this->{$this->METHODMAP[$request->getMethod()]}($request);
	
	}

	public function auth($request) {
		$loginBody = json_decode($request->getBody(), true);
		$query = 'SELECT * FROM '.$request->getResource()." WHERE username = '". $loginBody['username']. "'";
		$result = (new DBConnector())->query($query); 
                return $result->fetchAll(PDO::FETCH_ASSOC);


	}	

	private function search($request) {
		$query = 'SELECT * FROM '.$request->getResource(). self::queryParams($request->getParameters());
		$result = (new DBConnector())->query($query); 
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
	private function create($request) {
		$body = $request->getBody();
		$resource = $request->getResource();
		$query = 'INSERT INTO '.$resource.' ('.$this->getColumns($body).') VALUES ('.$this->getValues($body).')';
		return (new DBConnector())->exec($query);
		 
	}
	
	private function update($request) {
                $body = $request->getBody();
                $resource = $request->getResource();
                $query = 'UPDATE '.$resource.' SET '. $this->getUpdateCriteria($body);
		return (new DBConnector())->exec($query);
        }
	
	private function bodyParams($json) {
		$criteria = "";
                $array = json_decode($json, true);
                foreach($array as $key => $value) {
                                $criteria .= $key." = '".$value."' AND ";
                 
                }
                return substr($criteria, 0, -5);
	
		
	}

	
	private function getUpdateCriteria($json)
	{
		$criteria = "";
		$where = " WHERE ";
		$array = json_decode($json, true);
		foreach($array as $key => $value) {
			if($key != 'id')
				$criteria .= $key." = '".$value."',";
			
		}
		return substr($criteria, 0, -1).$where." idUser = ".$array['id'];
	}	



	private function getColumns($json)
	{
		$array = json_decode($json, true);
		$keys = array_keys($array);
		return implode(",", $keys);
	
	}

	private function getValues($json) 
        {
                $array = json_decode($json, true);
                $keys = array_values($array);
                $string =  implode("','", $keys);
		return "'".$string."'";
        
        }
	
	private function queryParams($params) {
		if(!is_null($params)){
		$query = " WHERE ";		
		foreach($params as $key => $value) {
			$query .= $key." = '".$value."' AND ";	
		}
		$query = substr($query,0,-5);
		return $query;
		}
		return null;
	}

	
		
}




