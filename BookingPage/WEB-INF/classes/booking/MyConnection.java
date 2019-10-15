package booking;

import java.sql.DriverManager;
//import com.mysql.jdbc.Connection;
import java.sql.Connection;

public class MyConnection {
	private static String username="root";
	private static String password="";
	private static String connectionURL="jdbc:mysql://localhost/fahrrad";
	
	static Connection con=null;
	
	public static Connection getCon() {
		try {
			Class.forName("com.mysql.jdbc.Driver").newInstance();
			con = DriverManager.getConnection(connectionURL, username, password);
//			System.out.println("Es klappt!");
		}catch(Exception e){
			System.out.println(e);
		}
		return con;
	}
			
}
