<?php
	require_once __DIR__.'/config.php';

	function addContentDB($tipo, $titulo, $rutaDestino, $sinopsis, $descripcion, $fecha, $director, $duracion, $val_pagina ) {
	global $BD;	
		$exito = false;
		$query = "INSERT INTO content (tipo, titulo, caratula, sinopsis, descripcion, fechaestreno, director, duracion, valoracionpagina) 
		VALUES  ('$tipo','$titulo','$rutaDestino','$sinopsis','$descripcion', '$fecha','$director','$duracion', '$val_pagina')";
		
		if ($resultado = $BD->query($query)) {
			$exito = true;
			//$resultado->close();
		}
		
		return $exito;
	}

	function deleteContentDB($id_content){
	global $BD;	
	$query = "DELETE FROM content
				WHERE id_content = $id_content";

	
	$exito = false;


	if ($resultado = $BD->query($query)) {
			$exito = true;
			//$resultado->close();
	}
		
		return $exito;


	}

	function dameIDContent($titulo){
	global $BD;	
	$query = "SELECT id_content
				FROM content
				WHERE titulo ='".$BD->real_escape_string($titulo)."'";

	$exito = false;


		if ($resultado = $BD->query($query)) {
		
		
			 if($resultado->num_rows ==0)
	  			$exito =false;

	  		else
	  			$exito = $resultado->fetch_assoc()['id_content'];

	  			
	  		$resultado->close();
		}
		
		return $exito;

	}

	function dameContent($id_content){

		global $BD;	
		
		$query = "SELECT * FROM content WHERE id_content=$id_content";

		$content = false;

		if ($resultado = $BD->query($query)) {
			$content = $resultado->fetch_assoc();
			$resultado->close();
		}
		  
		return $content;
	}
	
	function dameContents(){

		global $BD;	
		
		$query = "SELECT * from content";

		$content = false;
		$i = 0;
		if ($resultado = $BD->query($query)) {
			while($array = $resultado->fetch_assoc()) {
				$content[$i++] = $array;
			}
			//$resultado->close();
		}
		  
		return $content;
	}


	function modifyContenttitulo($id_content, $newtitulo){
	global $BD;	

	$query = "UPDATE content 
			set titulo = $newtitulo 
			where id_content =$id_content";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		//$resultado->close();
	}

	return $exito;

	}

	function modifyContentcaratula($id_content, $newcaratula){
	global $BD;	
	$query = "UPDATE content 
	set caratula = $newcaratula 
	where id_content =$id_content";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		//$resultado->close();
	}

	return $exito;

	}

	function modifyContentsinopsis($id_content, $newsinopsis){
	global $BD;	
	$query = "UPDATE content 
			set sinopsis = $newsinopsis 
			where id_content =$id_content";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		//$resultado->close();
	}

	return $exito;



	}

	function modifyContentdescripcion($id_content, $newdescripcion){
	global $BD;	
	$query = "UPDATE content 
			set descripcion = $newdescripcion 
			where id_content =$id_content";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		//$resultado->close();
	}

	return $exito;


	}

	function modifyContentfechaestreno($id_content, $newfecha){
	global $BD;	
	$query = "UPDATE content 
			set fechaestreno = $newfecha
			where id_content =$id_content";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		//$resultado->close();
	}

	return $exito;



	}

	function modifyContentdirector($id_content, $newdirector){
	global $BD;	
	$query = "UPDATE content 
			set director = $newdirector 
			where id_content =$id_content";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		//$resultado->close();
	}

	return $exito;


	}

	function modifyContentvaloracion($id_content, $newvaloracion){
	global $BD;	
	$query = "UPDATE content 
			set valoracionpagina = $newvaloracion 
			where id_content =$id_content";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		//$resultado->close();
	}

	return $exito;



	}

	function modifyContentpublicado($id_content, $newstatus){
	global $BD;	
	$query = "UPDATE content 
			set publicado = $newstatus 
			where id_content =$id_content";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		//$resultado->close();
	}

	return $exito;



	}
	function modifyContenttipo($id_content, $newtipo){
	global $BD;	

	$query = "UPDATE content 
			set tipo = $newtipo 
			where id_content =$id_content";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		$resultado->close();}

	return $exito;

	}

	function dameFilas(){

	global $BD;	

	$query = "SELECT *
			from content
			ORDER BY id_content";

	$exito = false;

	$exito = $BD->query($query);
		  
	return $exito->num_rows;
	}
	
	function dameFilasByType($tipo){

	global $BD;	

	$query = "SELECT * FROM content where tipo='".$tipo."'";

	$exito = false;

	$exito = $BD->query($query);
		  
	return $exito->num_rows;
	}

	function damePaginacion($start_with, $rows_for_page){

	global $BD;	

	$query = "SELECT * from content 
			ORDER BY id_content
			ASC LIMIT ".$start_with.",".$rows_for_page;
	
	$exito = false;

	$contenido = array();
	$i = 0;
	if($resultado = $BD->query($query)) {
		while($content = $resultado->fetch_assoc()) {
			$contenido[$i] = array();
			$contenido[$i++]= $content;
			//$resultado->close();	
		}
	}
		  
	return	$contenido;

	}
	
	function damePaginacionByType($start_with, $rows_for_page, $tipo){

	global $BD;	

	$query = "SELECT * from content WHERE tipo='".$tipo."' 
				ORDER BY id_content 
				ASC LIMIT ".$start_with.",".$rows_for_page;
	
	$exito = false;

	$contenido = array();
	$i = 0;
	if($resultado = $BD->query($query)) {
		while($content = $resultado->fetch_assoc()) {
			$contenido[$i] = array();
			$contenido[$i++]= $content;
			//$resultado->close();	
		}
	}
		  
	return	$contenido;

	}

	function ordenar($start_with, $rows_for_page, $ordenado){

	global $BD;	

	$query = "SELECT * from content 
			ORDER BY $ordenado
			ASC LIMIT ".$start_with.",".$rows_for_page;
	
	$exito = false;

	$contenido = array();
	$i = 0;
	if($resultado = $BD->query($query)) {
		while($content = $resultado->fetch_assoc()) {
			$contenido[$i] = array();
			$contenido[$i++]= $content;
			//$resultado->close();	
		}
	}
		  
	return	$contenido;
	}

?>