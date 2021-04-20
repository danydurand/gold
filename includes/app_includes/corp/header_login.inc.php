<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php _p(QApplication::$EncodingType); ?>" />
<?php if (isset($strPageTitle)) { ?>
		<title><?php _p($strPageTitle); ?></title>
<?php } ?>
		<style type="text/css">@import url("<?php _p(__VIRTUAL_DIRECTORY__ . __APP_CSS_ASSETS__); ?>/styles.css");</style>
		<style type="text/css">@import url("<?php _p(__VIRTUAL_DIRECTORY__ . __APP_CSS_ASSETS__); ?>/styles_plus.css");</style>
		<!-- Custom Fonts -->
		<link href=<?= __APP_CSS_ASSETS__ ."/bower_components/font-awesome/css/font-awesome.min.css"?> rel="stylesheet" type="text/css">
	</head>
	<body background="<?php _p(__APP_IMAGE_ASSETS__); ?>/usa2.jpg">
		<?php
			$strNombEmpr = 'Gold Coast<br>SISPAQ - Modulo Connect';
			$strDatoUsua = '';
			$strLinkMenu = '';
			$strLinkSali = '';
			$this->RenderBegin();
		?>
		<section id="content_login">
			<section id="header_login">
				<div class="espacio"></div>
				<?php echo $strNombEmpr ?>
			</section>