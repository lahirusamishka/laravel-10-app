<!DOCTYPE html>
<html class="h-full bg-gray-200" lang="en">
<head>
	<meta charset="utf-8">
	<title>StaffMaster</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="{{ mix('/css/app.css') }}" rel="stylesheet">
	<script src="{{ mix('/js/app.js') }}" defer></script>
	<meta name="robots" content="noindex">
</head>
<body class="font-sans leading-none text-gray-800 antialiased">
@routes
@inertia
<script>
if (
	(window.navigator.userAgent.indexOf("MSIE ") > -1 ||
	!!navigator.userAgent.match(/Trident.*rv\:11\./)) ||
	window.navigator.userAgent.indexOf("Edge/") > -1 ||
	window.navigator.userAgent.indexOf("Firefox") > -1
) {
	alert("This project has been tested only on Chrome, Brave and Safari.")
}
</script>
</body>
</html>
