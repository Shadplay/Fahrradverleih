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
	
	//fügt die Werte des übergebenen Bookins in die Tabelle "loan" ein.
	public int insertBooking (Booking b) throws Exception {
		int status=0;
		
		try {
			// connection aufbauen
			con = MyConnection.getCon();
	
			//Insert in Datenbank-Tabelle "loan" mit einem AutoIncrement an erster Stelle für die leihID
			//Die Datenbank ist für später schon um ein späteres Rückgabedatum angepasst. In dieser Methode sind aber erstmals nur Buchungen über einen Tag möglich 
			ps=con.prepareStatement("Insert into loan values(?,?,?,?,?,?)");
			ps.setString(1, null);
			ps.setString(2, b.getKundenID());// KundenID wurde vorher in "Booker.java" aus Session abefrat
			ps.setString(3, b.getRadID()); //in Booker schon auf eine nicht gebuchte ID gesetzt
			ps.setDate(4, b.getLeihDat());
			ps.setDate(5, b.getLeihDat());
			ps.setString(6, b.getRueckstatus()); 
			status=ps.executeUpdate();
			
		// Fehlermeldung mit Statuscode -2 wird ausgegeben wenn ein Wert nicht ordnungsgemäß übergegebn wird. In diesem Fall kann das nur das Ausleihdatum sein, wenn es vergessen wurde
		//Wird dann im Booker.java anhand des Status -2 bearbeitet
		}catch (java.sql.SQLException e) {				
			status=-2;
			System.out.println(e.toString());
		//restliche Exceptions
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
        Cookie[] cookies = null;
       
        // Holen aller für diese Seite gesetzten Cookies
        cookies = request.getCookies();
		
        //durchsuchen der Cookies nach dem Cookie "email"
        for(int i=0; i<cookies.length;i++) {
        	if(cookies[i].getName().equals("email")){
        		ret = cookies[i].getValue();
    	        ret = ret.replaceAll("%40", "@"); // wandelt das "%40" des Cookies in das @ in der Datenbank um
        		break;
        	}
        }     
        
        try {
        	//Datenbankafrage, welche userID zur email gehört
			con = MyConnection.getCon();
			ps=con.prepareStatement("SELECT id FROM users WHERE email=?");
			ps.setString(1, ret);
			ResultSet rs = ps.executeQuery();
			while(rs.next()) {
				ret = rs.getString(1);
			}
		//allgemeine Fehlerbehandlung
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
        Cookie[] cookies = null;
       
        // Holen aller für diese Seite gesetzten Cookies
        cookies = request.getCookies();
		
      //durchsuchen der Cookies nach dem Cookie "PHPSESSID"
        for(int i=0; i<cookies.length;i++) {
        	if(cookies[i].getName().equals("PHPSESSID")){
        		ret = cookies[i].getValue();
        		break;
        	}
        }
        
        try {
        	//Datenbankafrage, welche userID zur PHPSession gehört
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
	
	
	//gibt niedrigste FahrradID in der gewünschten Kategorie aus, das für den Tag nicht gebucht ist
	public String getRadID(java.sql.Date leihDat, String modellID) throws Exception {
		String ret= "";
		
		try {
			//Datenbankabfrage: Alle FahrradIDs, welche an dem übergebenen Datum in der Tabelle "loan" sind gruppiert nach der radID (also augeliehen sind); 
			//Das wird dann umgekehrt, also alle radIDs der Fahrräder, die in der Tabelle "bikes" vom übergebenen Fahrradtyp (z.B. 1=Mountainbike), aber nicht in der Tabelle "loan" mit dem übergebenen LeihDat sind werden ausgegeben
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
	
	//gibt true zurück, wenn ein User eingeloggt ist, und false wenn kein User eingeloggt ist
	//überprüft, ob die aktuelle SessionID mit der dem Wert in der Datenbank für die SessionID des angemeldeten Users, der über den gesetzten "email"-Cookie identifiziert wird, übereinstimmt
	public boolean isSessionID(HttpServletRequest request) throws Exception{
		boolean ret = false;
		String email = "";
        String phpsessid = "";        
		Cookie[] cookies = null;
	       
		// Holen aller für diese Seite gesetzten Cookies
        cookies = request.getCookies();			
        
        //durchsuchen der Cookies nach den Cookies "PHPSESSID" und "email"
        //wenn diese nict gefunden werden funktioniert die folgende Datenbankabfrage nicht. Dadurch wird der Wert ret nicht auf true gesetzt und die Methode gibt das vorher gesetzte false zurück
        for(int i=0; i<cookies.length;i++) {	        	
        	if(cookies[i].getName().equals("email")){
        		email = cookies[i].getValue();
        	}	        	
        	if(cookies[i].getName().equals("PHPSESSID")){
        		phpsessid = cookies[i].getValue();
        	}
	        }
        	
        		try {
        			//Datenbankabfrage: session_id, die beim eingeloggten user in der Datenbank(DB) eingetragen ist
        			con = MyConnection.getCon();
    				ps=con.prepareStatement("SELECT session_id FROM users WHERE email=?");
    				ps.setString(1, email);
    				ResultSet rs = ps.executeQuery();
    				while(rs.next()) {
    					//Wenn die in der DB eingetragene sessionid die aktuelle ist (d.h. der user eingeloggt ist), wird ret auf true gesetzt.
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

