package booking;

import java.io.IOException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.io.PrintWriter;


import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class Booker
 */
@WebServlet("/booker")
public class Booker extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public Booker() {
        super();
    }

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		Booking b= new Booking();
		BookingMethods bm = new BookingMethods();
			
			try {
				//Überprüfung, ob man eingeloggt ist
				if(bm.isSessionID(request)) {
				
					//Holen der im Formular eingetragenen Daten und setzen des Rückstatus auf den Standardwert bei Ausleihe
					String radID = request.getParameter("type");
					Date leihDat = new SimpleDateFormat("yyyy-MM-dd").parse(request.getParameter("ldate"));
					String rueckStatus = "n.A.";				
		
					// setzen der Werte des erstellten Bookings, welches bei "Insert" übergeben wird
					b.setKundenID(bm.getUserIDMail(request));
					b.setRadID(bm.getRadID(new java.sql.Date(leihDat.getTime()), radID)); //radID wird auf eine ID von einem nicht gebuchten Rad gesetzt
					b.setLeihDat(new java.sql.Date(leihDat.getTime()));
					b.setRueckstatus(rueckStatus);		
					
					//Insert des Bookings in die Datenbank
					int i = bm.insertBooking(b); 
					
		//Fehlerbehandlung
					
					//alle Felder wurden ausgefüllt
					if(b.getLeihDat()!=null){
						request.setAttribute("message","<div> Das Fahrrad " + b.getRadID() + " wurde für folgendes Datum gebucht: " + leihDat + "</div>");
					}else{
						//das Ausleidatum wurde nicht gesetzt
						request.setAttribute("message","Stellen Sie sicher, dass Sie ein Ausleihdatum angegeben haben");
					}
					// Status wurde bei java.sql.SQLException auf "-2" gesetzt, wenn alle Fahrräder des gewünschten Typs für diesen Tag schon gebucht wurden
					if(i==-2) {
						request.setAttribute("message","<div> Für das gewählte Datum ist leider <b>kein Fahrrad des gewählten Typs mehr verfügbar</b>.<br> Bitte entscheiden Sie sich für ein anderes Fahrrad, oder wählen Sie ein anderes Datum.<br> Vielen Dank! </div>");
					}		
					
				//wenn man nicht eineloggt ist wird eine Fehlermeldun ausgegeben
				} else {
					request.setAttribute("message","<div> Bitte loggen Sie sich zuerst ein! </div><a class=\"btn btn-info\" href=\"../Fahrradverleih/WebContent/login.php\">Login</a>");
				}
		} catch (java.text.ParseException e) {
			request.setAttribute("message","<div>Bitte Wiederholen Sie die Eingabe. Stellen Sie dabei sicher, dass Sie ein gülties Ausleihdatum angegeben haben </div>");				
			System.out.println(e.toString());	
		// restliche Exceptions
		}catch (Exception e) {
			request.setAttribute("message","<div>" + e.toString() + "</div>");				
			System.out.println(e.toString());
		}
		
		// Aufrufen der Seite "success.jsp"
		request.getRequestDispatcher("success.jsp").forward(request, response);	
		
	}

	public void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		//do nothing
	}

}
