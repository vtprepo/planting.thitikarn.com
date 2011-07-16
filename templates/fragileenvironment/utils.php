<?php
defined( '_JEXEC' ) or die( 'Restricted index access' );

global $Itemid;

// menu code
$document	= &JFactory::getDocument();
$renderer	= $document->loadRenderer( 'module' );
$options	 = array( 'style' => "raw" );
$module	 = JModuleHelper::getModule( 'mod_mainmenu' );
$mainnav = false; $subnav = false;
if($mtype == "splitmenu") : 
	$module->params	= "menutype=$menu_name\nstartLevel=0\nendLevel=1";
	$mainnav = $renderer->render( $module, $options );
	$module	 = JModuleHelper::getModule( 'mod_mainmenu' );
	$module->params	= "menutype=$menu_name\nstartLevel=1\nendLevel=9";
	$options	 = array( 'style' => "rounded");
	$subnav = $renderer->render( $module, $options );
elseif($mtype == "suckerfish") : 								      	
	$module->params	= "menutype=$menu_name\nshowAllChildren=1";
	$mainnav = $renderer->render( $module, $options );
endif;
?>