package booking;
import java.util.Date;
import java.text.SimpleDateFormat;


public class MyTime {
	String pattern = ("dd-MM-yyyy");
	SimpleDateFormat sdf = new SimpleDateFormat(pattern);
	java.util.Date date =new java.util.Date();
		
	String format = sdf.format(date);
	System.out.println(format);
}
