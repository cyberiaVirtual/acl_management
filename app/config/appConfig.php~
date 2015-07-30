<?php
	/**
	 * @package name <setNameDefinitions> set languaje of the app
	 * @use edit as you need
	 * 
	 */
	// some title in root modal alert 
		
		function languaje($langChart=null) {
			$lang = array('en','es','jp','ru','it','fr');//examples
				// set the default Languaje
				if(empty($langChart) OR !isset($langChart)){
					$langChart = 'en';
				}
				if($langChart === 'es') {
					$languaje = array (
									'landingPage'=>'Inicio',
									'landingPageTitleA'=>'Grupo Servicios de Transporte',
									'landingPageBodyA'=>'Politicas',
									'landingPageLinkA'=>'Mas ...',
									'landingPageTitleB'=>'Transportes Bonampak',
									'landingPageBodyB'=>'Politicas',
									'landingPageLinkB'=>'Mas ...',
									'landingPageTitleC'=>'Transportadora Especializada Industrial',
									'landingPageBodyC'=>'Politicas',
									'landingPageLinkC'=>'Mas ...',
									'landingPageTitleD'=>'Autotransportes Macuspana',
									'landingPageBodyD'=>'Politicas',
									'landingPageLinkD'=>'Mas ...',
									'welcomeMsg' => 'Bienvenido',
									'guestUser' => 'Invitado',
									'appName'=>'Nombre de la Aplicacion',
									'rootModalTitle' => 'Titulo',
									'rootModalMessage' => 'Mensaje',
									'rootModalButton' => 'Cerrar',
									'loginTitle' => 'Inicio de Sesi&oacute;n',
									'loginUser'=> 'Numero de Trabajador',
									'loginPassword'=>'Contraseña',
									'loginButton'=>'Ingresar',
									'navMenuA'=>'Usuarios',
									'navMenuB'=>'Grupos',
									'navMenuC'=>'Politicas',
									'navMenuD'=>'Descargas',
									'navMenuE'=>'Salir'
					);

				} else if($langChart === 'en') {
					$languaje = array (
									'landingPage'=>'Home',
									'landingPageTitleA'=>'IT Department',
									'landingPageBodyA'=>'Policies',
									'landingPageLinkA'=>'More ...',
									'landingPageTitleB'=>'R.R H.H.',
									'landingPageBodyB'=>'Policies',
									'landingPageLinkB'=>'More ...',
									'landingPageTitleC'=>'Department of Finance',
									'landingPageBodyC'=>'Policies',
									'landingPageLinkC'=>'More ...',
									'landingPageTitleD'=>'Logistic',
									'landingPageBodyD'=>'Policies',
									'landingPageLinkD'=>'More ...',
									'welcomeMsg' => 'Welcome',
									'guestUser' => 'Guest',
									'appName'=>'Home',
									'rootModalTitle' => 'Title',
									'rootModalMessage' => 'Message',
									'rootModalButton' => 'Close',
									'loginTitle' => 'Sig in',
									'loginUser' => 'Username or e-mail',
									'loginPassword' => 'Password',
									'loginButton'=>'Login',
									'navMenuA'=>'Users',
									'navMenuB'=>'Groups',
									'navMenuC'=>'Policies',
									'navMenuD'=>'Downloads',
									'navMenuE'=>'Logout'
						);
				}
			
			return $languaje;
		}
	/**
	 * @package name <removeString> this must change
	 * @congif extract areas from lis-db
	 * @extract areas,flotas and tipo de Operacion
	 * @use isql model connection with mssql
	 * @param=>arrayString <array | string>
	 * @param=>string <array | string>
	 * @param=>$model <name of the model|1stlevet array>
	 * @param=>field <name of the table|2nd level array>
	 * @param=>unset <bool if you want remove the first pointer>
	 * NOTE  array('model'=>array('field','value'));
	 */
	
	function imgPaths($appName=null) {
		$apps = array('gst','kml','portal','radiobases');//examples
		if ($appName === 'gst') {
			$imgPaths = array(
								'landingImgBg'=> $appName.DS.'bg.png',
								'landingImgA' => $appName.DS.'gst.png',
								'landingImgB' => $appName.DS.'tbk.png',
								'landingImgC' => $appName.DS.'tei.png',
								'landingImgD' => $appName.DS.'atm.png',
								'landingHeaderIcon' => $appName.DS.'backup'.DS.'gst.png'
			);
		} else if ($appName === 'portal') {
			$imgPaths = array(
								'landingImgBg'=> $appName.DS.'bg.jpg',
								'landingImgA' => $appName.DS.'cool-wood.jpg',
								'landingImgB' => $appName.DS.'dice-black.jpg',
								'landingImgC' => $appName.DS.'black-&-red.jpg',
								'landingImgD' => $appName.DS.'background_div_2.png',
								'landingHeaderIcon' => $appName.DS.'backup'.DS.'gst.png'
			);
		}
		return $imgPaths;
	}
	/**
	 * @package name <removeString> this must change
	 * @congif extract areas from lis-db
	 * @extract areas,flotas and tipo de Operacion
	 * @use isql model connection with mssql
	 * @param=>arrayString <array | string>
	 * @param=>string <array | string>
	 * @param=>$model <name of the model|1stlevet array>
	 * @param=>field <name of the table|2nd level array>
	 * @param=>unset <bool if you want remove the first pointer>
	 * NOTE  array('model'=>array('field','value'));
	 */
	

?>