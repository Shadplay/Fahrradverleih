package booking;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.SimpleDateFormat;
import java.util.Date;

import com.mysql.jdbc.Connection;
import com.mysql.jdbc.PreparedStatement;

public class BookingMethods {
	static java.sql.Connection con;
	static java.sql.PreparedStatement ps;
	
	public int insertBooking (Booking b) throws Exception {
		int status=0;
		
		try {
			con = MyConnection.getCon();
			java.sql.Date d =b.getLeihDat();
			String pattern = "yyyy-MM-dd";
			SimpleDateFormat simpleDateFormat = new SimpleDateFormat(pattern);
					
			ps=con.prepareStatement("Insert into loan values(?,?,?,?,?,?)");
			ps.setString(1, null);
			ps.setString(2, b.getKundenID());//	KundenID aus Session abfragen		
			ps.setString(3, b.getRadID()); //SQL-Abfrage für richtigen Radtyp
//			ps.setString(4, b.getLeihDat());
//			ps.setString(5, b.getRueckDat());
//früher1	ps.setDate(4, (java.sql.Date) simpleDateFormat.parse(b.getLeihDat()));//SQL-Abfrage ob Rad Verfügbar		"DATE_FORMAT ("	+	+ ", ?%d.%m.%Y?);"
//früer 2	ps.setDate(4, new java.sql.Date(b.getLeihDat().getTime()));//SQL-Abfrage ob Rad Verfügbar		"DATE_FORMAT ("	+	+ ", ?%d.%m.%Y?);"
			ps.setDate(4, b.getLeihDat());//SQL-Abfrage ob Rad Verfügbar		"DATE_FORMAT ("	+	+ ", ?%d.%m.%Y?);"
			ps.setDate(5, b.getRueckDat());//SQL-Abfrage ob Rad Verfügbar		ps.setString(5, b.getRueckDat());
			ps.setString(6, b.getRueckstatus()); 
			status=ps.executeUpdate();
			con.close();

		}catch(Exception e){
			System.out.println(e);
		}finally {
			con.close();
		}
		return status;
	}
	
	//gibt FahrradIDs in der gewünschten Anzahl aus, die für den Tag nicht gebucht sind
	public String[] getFahrraeder(Date leihDat, int modellID, int anzahl) throws Exception {
		Booking b = new Booking();
		String[] ret= new String[anzahl];
		
		try {
			con = MyConnection.getCon();
			ps=con.prepareStatement("SELECT radID FROM (SELECT * FROM bike LEFT JOIN loan ON bike.modellID=loan.modellID  WHERE leihDat=? AND modellID=?) WHERE radID IS NULL");
			ps.setString(1, "" + leihDat);
			ps.setString(2, "" + modellID);
		
			ResultSet rs = ps.executeQuery();
			int i = 0;
			while(rs.next()) {
				if(i<anzahl) {
					ret[i]=rs.getString(1);
				}
				i++;
			}
		} catch(Exception e) {
			System.out.println(e);
		}finally {
			con.close();
		}
		return ret;
		
	}
	
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
