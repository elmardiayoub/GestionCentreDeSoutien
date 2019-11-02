<!DOCTYPE html>
<html>
<head>
	<title>HTML to PDF</title>
</head>
<body>
	<!-- 
	content of this area will be the content of your PDF file 
	-->
	<div id="HTMLtoPDF">

	<h2>HTML to PDF</h2>

	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

	</div>
    <script> 
        var anchorTag = document.createElement("a");
        anchorTag.setAttribute("id","downloadTag");
        anchorTag.setAttribute("onclik","HTMLtoPDF()");
        anchorTag.click();
</script>
	<!-- here we call the function that makes PDF
	<a id="click" href="#" onclick="HTMLtoPDF()">Download PDF</a> -->

    

	<!-- these js files are used for making PDF -->
	<script src="../Techno/js/jspdf.js"></script>
<script src="../Techno/js/jquery-2.1.3.js"></script>
<script src="../Techno/js/pdfFromHTML.js"></script>
</body>
</html>