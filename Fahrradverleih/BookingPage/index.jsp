<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<!Doctype html >

<h1>Hallo Welt!</h1>
<% out.print("Hallo von Java!");  %>

<% 
	//Connection conn = null;
	try {
		// Laut MySQL-Web-Seiten ist zusaetzlicher Aufruf von
		//  newInstance() wegen moeglicher Probleme in
		//  manchen Java-Varianten anzuraten. 
		Class.forName("com.mysql.jdbc.Driver").newInstance();
		
		out.println("<b>MySQL-Treiber wurde geladen!</b>");
	}
	catch(ClassNotFoundException e) {
		out.println("<b>MySQL-Treiber konnte nicht geladen werden</b>");
		out.println("<pre><code>");
		out.println(e.getStackTrace());
		out.println(e.getMessage());
		out.println("</code></pre>");
	}
%>

</body>
</html>