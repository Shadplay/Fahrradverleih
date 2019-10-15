package booking;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.SimpleDateFormat;
import java.util.Date;

import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServletRequest;

import com.mysql.jdbc.Connection;
import com.mysql.jdbc.PreparedStatement;

public class BookingMethods {
	static java.sql.Connection con;
	static java.sql.PreparedStatement ps;
	
	public int insertBooking (Booking b) throws Exception {
		int status=0;
		
		try {
         
			con = MyConnection.getCon();
//			java.sql.Date d =b.getLeihDat();
//			String pattern = "yyyy-MM-dd";
//			SimpleDateFormat simpleDateFormat = new SimpleDateFormat(pattern);			

			/**ps=con.prepareStatement("SELECT id FROM users WHERE email = ?;");
			ps.setString(1, mail);
			ResultSet rs = ps.executeQuery();

			while(rs.next()) {
				mail = rs.getString(1);	//Mail ist hier die userID (im vorherigen Schritt gesetzt)			
			}**/
			
			ps=con.prepareStatement("Insert into loan values(?,?,?,?,?,?)");
			ps.setString(1, null);
//			ps.setString(2, b.getKundenID());//	KundenID aus Session abfragen	
			ps.setString(2, b.getKundenID()/**mail**/); //Mail ist hier die userID (im vorherigen Schritt gesetzt)
			ps.setString(3, b.getRadID()); //in Booker schon auf eine nicht gebuchte ID gesetzt
			ps.setDate(4, b.getLeihDat());
			ps.setDate(5, b.getRueckDat());
			ps.setString(6, b.getRueckstatus()); 
			status=ps.executeUpdate();
			
		// Fehlermeldung mit Statuscode -2 wird ausgegeben
		}catch (java.sql.SQLException e) {				
			status=-2;
			System.out.println(e.toString());
		}catch(Exception e){
			System.out.println(e.toString());
		}finally {
			con.close();
		}
		return status;
	}
	
	
	
	//greift aus der sessionID auf die UserID zu und gibt diese dann zurück
	public String getUserID( HttpServletRequest request) throws Exception{
		String ret="";
		
		//cookies
		Cookie cookie = null;
        Cookie[] cookies = null;
       
        // Get an array of Cookies associated with the this domain
        cookies = request.getCookies();
		
        for(int i=0; i<cookies.length;i++) {
        	if(cookies[i].getName().equals("PHPSESSID")){
        		ret = cookies[i].getValue();
        		break;
        	}
        }
        
        /**if( cookies != null ) {
        	for(int i=0;i<cookies.length;i++) {
        		System.out.println(i);
        		System.out.println("Name: " + cookies[i].getName());
				System.out.println("Value: " + cookies[i].getValue());
				System.out.println("Domain: " + cookies[i].getDomain());				
        	}
		 } else {
			 System.out.println("Fail");
		 }
        **/
		try {
			con = MyConnection.getCon();
			ps=con.prepareStatement("SELECT id FROM users WHERE session_id=?");
			ps.setString(1, ret);
				System.out.println(ret);
			ResultSet rs = ps.executeQuery();
				System.out.println(ret);
			while(rs.next()) {
				ret = rs.getString(1);
			}
		} catch(Exception e) {
			System.out.println(e);
			ret = "-1";
		}finally {
			con.close();
		}
		return ret;
		}
	
	
	//gibt FahrradIDs in der gewünschten kategorie aus, das für den Tag nicht gebucht ist
	public String getRadID(java.sql.Date leihDat, String modellID) throws Exception {
		Booking b = new Booking();
		String ret= "";
		
		try {
			con = MyConnection.getCon();
			ps=con.prepareStatement("SELECT bikeID FROM	bikes LEFT JOIN ((SELECT radID AS r FROM loan WHERE leihDat = ? GROUP BY r) AS datum) ON bikes.bikeID = datum.r JOIN type ON type.modellID=bikes.modellID WHERE datum.r IS NULL AND bikes.modellID=? GROUP BY bikeID");
			ps.setDate(1, leihDat);//(1, leihDat +"");
			ps.setString(2, modellID);
		
			ResultSet rs = ps.executeQuery();
			rs.next();
			ret=rs.getString(1);
			
		} catch(Exception e) {
			System.out.println(e);
		}finally {
			con.close();
		}
		System.out.println(ret);
		return ret;
		
	}
	
	//SessionID-Cookie
	public boolean isSessionID(HttpServletRequest request, String mail) throws Exception{
		boolean ret = false;		
			//cookies
			Cookie cookie = null;
	        Cookie[] cookies = null;
	       
	        // Get an array of Cookies associated with the this domain
	        cookies = request.getCookies();
			
	        if( cookies != null ) {
	        	for(int i=0;i<cookies.length;i++) {
	        		System.out.println(i);
	        		System.out.println("Name: " + cookies[i].getName());
					System.out.println("Value: " + cookies[i].getValue());
					System.out.println("Domain: " + cookies[i].getDomain());				
	        	}
			 } else {
				 System.out.println("Fail");
			 }
	        /**
	        for(int i=0; i<cookies.length;i++) {
	        	if(cookies[i].getName().equals("PHPSESSID")){
	        		try {
	        			con = MyConnection.getCon();
        				ps=con.prepareStatement("SELECT email FROM users WHERE session_id=?");
        				ps.setString(1, cookies[i].getValue());
        				ResultSet rs = ps.executeQuery();
        				while(rs.next()) {
        					if(rs.getString(1).equals(mail)) {
        						ret = true;
        						break;
        					}
        				}
	        		} catch(Exception e){
	    			System.out.println(e);
	        		} finally {	        			
	        			con.close();
	    			}
	        	}
	        }		**/
	        return ret;
	}
	//Ende Cookies
			
	
	/**
	public Booking getBooking(int leihID) {
		Booking b = new Booking();
		
		try {
			con = MyConnection.getCon();
			ps=con.prepareStatement("Select * from ausleihe Where leihID=?");
//			ps.setLong(2, b.setKundenID());
//			ps.setLong(4, b.setRadID());
//			ps.setString(3, b.setLeihDat());
//			ps.setString(5, b.setRueckDat());
//			ps.setString(1, b.setRueckstatus());
 * 
			ResultSet rs = ps.executeQuery();
			while(rs.next()) {
				b.setKundenID(1);
//				b.setLeihDat(2);
//				b.setRadID(3);
//				b.setRueckDat(4);
//				b.setRueckstatus(5);
//				b.set
			}
		}catch(Exception e){
			System.out.println(e);
		}
		return b;
	}
	**/
}

/**SELECT radID 
FROM
	bikes 
	JOIN loan ON bikes.bikeID=loan.radID
    LEFT JOIN 
	((SELECT radID AS r 
     FROM loan 
     WHERE leihDat = '2019-11-30'
     GROUP BY r) AS datum) 
     ON datum.r = loan.radID 
WHERE datum.r IS NULL AND modellID=2
GROUP BY radID
**/
