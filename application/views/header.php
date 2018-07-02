<!DOCTYPE html>
<html>
<head>
    <title>Colibri</title>

    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">

    <link rel="icon" href="http://colibrilab.am/favicon.ico">

    <script src="/js/libs/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<script>
		jQuery.checkData = function f(data) {
			if(typeof data !== "object") {
				return false;
			}

			for(let key in data) {
				if(!data[key]) {
					return false;
				}

				if(typeof data[key] === "object") {
					const res = f(data[key]);

					if(!res) {
						return false;
					}
				}
			}

			return true;
		};
	</script>
</head>
<body>
