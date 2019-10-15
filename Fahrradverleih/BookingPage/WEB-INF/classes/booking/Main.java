package booking;

import java.sql.Connection;

public class Main {

	public static void main(String[] args) {
		Connection con = MyConnection.getCon() ;
		Booker book = new Booker();
		
		//book.doPost(request, response);
	}

}
