//Javascript function that checks what month it is and applies a special CSS style if it is October(Halloween) or December (Winter Holidays), then executes.
function cssSelector(){
		var currentMonth = new Date().getMonth();

		if (currentMonth ==11){
			document.write("<link rel='stylesheet' href='/finalProject/holidayStyle.css'>");
		}
		else if (currentMonth ==9){
			document.write("<link rel='stylesheet' href='/finalProject/halloweenStyle.css'>");
		}
		else {
			document.write("<link rel='stylesheet' href='/finalProject/finalProjectStyle.css'>");
		}
	}
	cssSelector();