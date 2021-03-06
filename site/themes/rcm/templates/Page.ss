<!DOCTYPE html>
<!--[if !IE]><!-->
<html lang="$ContentLocale">
<!--<![endif]-->
<!--[if IE 6 ]><html lang="$ContentLocale" class="ie ie6"><![endif]-->
<!--[if IE 7 ]><html lang="$ContentLocale" class="ie ie7"><![endif]-->
<!--[if IE 8 ]><html lang="$ContentLocale" class="ie ie8"><![endif]-->
<head>
	<% base_tag %>
	<title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	$MetaTags(false)
	<!--[if lt IE 9]>
	<script src="$ThemeDir/form/assets/js/html5shiv.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="$ThemeDir/bower_components/skeleton/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="$ThemeDir/bower_components/fullpage.js/dist/jquery.fullpage.min.css" />

	<% require themedCSS('style') %>

	<link rel="shortcut icon" href="$ThemeDir/images/favicon.ico" />

	<script src="$ThemeDir/javascript/TweenMax.min.js"></script>
	<script src="$ThemeDir/javascript/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="$ThemeDir/bower_components/fullpage.js/dist/jquery.fullpage.js"></script>

</head>
<body class="$ClassName<% if not $Menu(2) %> no-sidebar<% end_if %>" <% if $i18nScriptDirection %>dir="$i18nScriptDirection"<% end_if %>>

<% include Header %>
$Layout
</body>
</html>
