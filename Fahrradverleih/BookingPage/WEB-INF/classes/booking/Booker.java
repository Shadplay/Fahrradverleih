package booking;

import java.io.IOException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.io.PrintWriter;


import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
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
		System.out.println("ich bin beim Booker");
		String kundenID = /**request.getParameter(**/"-1"; //) Programmieren des Sessionzugriffs
		String radID = /**request.getParameter(**/"-2";//)
		
			try {
				Date leihDat = new SimpleDateFormat("yyyy-MM-dd").parse(request.getParameter("ldate"));
//				java.sql.Date leihDat = request.getParameter("ldate"); 
				Date rueckDat = new SimpleDateFormat("yyyy-MM-dd").parse(request.getParameter("retdate"));
//				String rueckDat = request.getParameter("retdate");
				String rueckStatus = "n.A.";
				System.out.println("hi");

				Booking b= new Booking();
				BookingMethods bm = new BookingMethods();

					System.out.println("Absenden");
					b.setKundenID(kundenID);
					b.setLeihDat(new java.sql.Date(leihDat.getTime()));
					b.setRadID(radID);
//früher			b.setRueckDat(rueckDat);
					b.setRueckDat(new java.sql.Date(rueckDat.getTime()));
					b.setRueckstatus(rueckStatus);					
				
				bm.insertBooking(b);
				
				if(b.getRueckDat()!=null && b.getLeihDat()!=null){
					request.setAttribute("message","Das Fahrrad " + radID + " wurde für folgendes Datum gebucht: <br>" + leihDat +" <b>bis</b> <br>" + rueckDat);
				}else{
					request.setAttribute("message","Stellen Sie sicher, dass Sie ein Ausleih- und Rueckgabedatum angegeben haben");
				}
				System.out.println("Insert");
			} catch (Exception e) {
				System.out.println(e.toString());
				request.setAttribute("message","Stellen Sie sicher, dass Sie ein Ausleih- und Rueckgabedatum angegeben haben");				

			}

		request.getRequestDispatcher("success.jsp").forward(request, response);	
		
	}
	
	/**
	public Date convertDate(Date date) {
		
		SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd");
		String format = formatter.format(date);
		System.out.println(format);
		return date;
	}
	**/
	public void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		//do nothing
	}

}
