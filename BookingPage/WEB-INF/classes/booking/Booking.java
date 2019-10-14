package booking;

import java.sql.Date;

public class Booking {
	
	String kundenID;
	String radID;
	java.sql.Date leihDat;
	java.sql.Date rueckDat;
	String rueckstatus= "k.A.";
	
	
	public String getKundenID() {
		return kundenID;
	}
	public void setKundenID(String kundenID) {
		this.kundenID = kundenID;
	}
	public String getRadID() {
		return radID;
	}
	public void setRadID(String radID) {
		this.radID = radID;
	}
	public java.sql.Date getLeihDat() {
		return leihDat;
	}
	public void setLeihDat(java.sql.Date leihDat) {
		this.leihDat = leihDat;
	}
	public java.sql.Date getRueckDat() {
		return rueckDat;
	}
	public void setRueckDat(java.sql.Date rueckDat) {
		this.rueckDat = rueckDat;
	}
	public String getRueckstatus() {
		return rueckstatus;
	}
	public void setRueckstatus(String rueckstatus) {
		this.rueckstatus = rueckstatus;
	}
}
