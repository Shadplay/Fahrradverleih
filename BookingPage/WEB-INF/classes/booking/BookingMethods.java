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
	
			ps=con.prepareStatement("Insert into loan values(?,?,?,?,?,?)");
			ps.setString(1, null);
			ps.setString(2, b.getKundenID());// KundenID wurde vorher aus Session abefrat
			ps.setString(3, b.getRadID()); //in Booker schon auf eine nicht gebuchte ID gesetzt
			ps.setDate(4, b.getLeihDat());
			ps.setDate(5, b.getLeihDat());
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
	
	//greift aus dem Email-Cookie auf die UserID zu und gibt diese dann zurück
		public String getUserIDMail( HttpServletRequest request) throws Exception{
			String ret="";
			
			//cookies
			Cookie cookie = null;
	        Cookie[] cookies = null;
	       
	        // Get an array of Cookies associated with the this domain
	        cookies = request.getCookies();
			
	        for(int i=0; i<cookies.length;i++) {
	        	if(cookies[i].getName().equals("email")){
	        		ret = cookies[i].getValue();
	    	        ret = ret.replaceAll("%40", "@"); // wandelt das "%40" des Cookies in das @ in der Datenbank um
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
				ps=con.prepareStatement("SELECT id FROM users WHERE email=?");
				ps.setString(1, ret);
				ResultSet rs = ps.executeQuery();
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
		
	
	//greift aus dem PHP-SessionID-Cookie auf die UserID zu und gibt diese dann zurück
	public String getUserIDSession( HttpServletRequest request) throws Exception{
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
			ResultSet rs = ps.executeQuery();
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
			ps.setDate(1, leihDat);
			ps.setString(2, modellID);
		
			ResultSet rs = ps.executeQuery();
			rs.next();
			ret=rs.getString(1);
			if(ret == null){
				//Fehlermeldungskonzept
			}
			
		} catch(Exception e) {
			System.out.println(e);
		}finally {
			con.close();
		}
		System.out.println(ret);
		return ret;
		
	}
	
	//SessionID-Cookie
	//funktioniert nicht
	public boolean isSessionID(HttpServletRequest request) throws Exception{
		boolean ret = false;
		String email = "";
        String phpsessid = "";
        
			Cookie[] cookies = null;
	       
	        // Get an array of Cookies associated with the this domain
	        cookies = request.getCookies();			
	        
	        for(int i=0; i<cookies.length;i++) {	        	
	        	if(cookies[i].getName().equals("email")){
	        		email = cookies[i].getValue();
	        	}	        	
	        	if(cookies[i].getName().equals("PHPSESSID")){
	        		phpsessid = cookies[i].getValue();
	        	}
	        }
	        System.out.println(email);
	        System.out.println(phpsessid);
        	
        		try {
        			con = MyConnection.getCon();
    				ps=con.prepareStatement("SELECT session_id FROM users WHERE email=?");
    				ps.setString(1, email);
    				ResultSet rs = ps.executeQuery();
    				while(rs.next()) {
    					if(rs.getString(1).equals(phpsessid)) {
    						ret = true;        						
    					}
    				}
        		} catch(Exception e){
    			System.out.println(e);
        		} finally {	        			
        			con.close();
    			}
        	return ret;
	}
			
}

//function getCookie() {
//	  var name = "email=";
//	  var decodedCookie = decodeURIComponent(document.cookie);
//	  var ca = decodedCookie.split(';');
//	  for(var i = 0; i < ca.length; i++) {
//		var c = ca[i];
//		while (c.charAt(0) == ' ') {
//		  c = c.substring(1);
//		}
//		if (c.indexOf(name) == 0) {
//		  return c.substring(name.length, c.length) !="";
//		}
//	  }
//	  return "";
//	}
//
//	function checkCookie() {
//	  var user=getCookie();
//	  if (user != "") {
//		window.location = "/BookingPage/bookingPage.jsp";
//	  } else {
//		 prompt("Please login first");
//	  }
//	}
//	</script>