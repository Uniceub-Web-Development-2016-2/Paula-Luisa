<?php
class RequestController
{


	//criar e validar method
	const VALID_METHODS = array('GET', 'POST', 'PUT', 'DELETE');
	const VALID_PROTOCOLS = array('HTTP/1.1', 'HTTPS/1.1');
	public function create_request($request_info)
	{
		if(!self::is_valid_method($request_info['REQUEST_METHOD']))
		{
			return array("code" => "405", "message" => "method not allowed");
			
		}	
		
		if(!self::is_valid_protocol($request_info['SERVER_PROTOCOL']))
		{
			return array("code" => "505", "message" => "HTTP Version Not Supported");
		}	
		
		//if(!self::is_valid_remote_addr($request_info['REMOTE_ADDR']))
		//{
		//	return array("code" => "", "message" => "");
		//}
                // if(!self::is_valid_server_addr($request_info['SERVER_ADDR']))
                // {
                //         return array("code" => "", "message" => "");
                // }
                // if(!self::is_valid_request_uri($request_info['REQUEST_URI']))
                // {
                //         return array("code" => "", "message" => "");
                // }
                // if(!self::is_valid_remote_addr($request_info['QUERY_STRING']))
                // {
                //      return array("code" => "", "message" => "");
                //}



	//	file_get_contents('php://input');
		
	//	return new Request();
		
	}
	
	public function is_valid_method($method)
	{
		if( is_null($method) || !in_array($method, self::VALID_METHODS))
			return false;
		
		return true;
	}

	public function is_valid_protocol($protocol)
	{
		if( is_null($protocol) || !in_array($protocol, self::VALID_PROTOCOLS))
			return false;

		return true;


		}

	//public function is_valid_remote_addr($remote_addr)
	//{
	//	if( is null($remote_addr || !in_array($remote_addr, self::VALID_REMOTE_ADDR))
	//		return false;

	//	return true;
	//	}






}


