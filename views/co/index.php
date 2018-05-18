<?php 

/* *************************************
on garde les librairies specifique au module dans le module
*******************************************/

$cssAnsScriptFilesModule = array(
	'/js/co.js',
	'/js/default/directory.js',
	'/js/default/index.js',
	//'/js/default/directory.js',
	'/js/dataHelpers.js',
	'/js/sig/localisationHtml5.js',
	'/js/floopDrawerRight.js',
	'/js/sig/geoloc.js',
	//'/js/default/formInMap.js',
	//'/js/default/formInMapOld.js',
	'/js/default/globalsearch.js',
	'/js/sig/findAddressGeoPos.js',
	'/js/jquery.filter_input.js',
	'/js/breadcrum_co.js'
);

HtmlHelper::registerCssAndScriptsFiles($cssAnsScriptFilesModule, $this->module->getParentAssetsUrl() );
?>

<h1>Ressources Endpoints</h1>
<script type="text/javascript">
	alert();
</script>