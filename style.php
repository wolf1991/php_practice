
/*
Title My style sheet
Design by CS 641
Designed for CS 641 Spring 2017
Date:02/10/2017
*/

body {
				background: <?php echo ($_COOKIE["bg"]); ?>;           
				text-align: center;
			    SCROLLBAR-BASE-COLOR: #56997A
}


body, td, th {
			 color: #666633;

}

h1,h2,h3,h4,h5 {

			 color: #663300;
			 text-align: center;
}


img { 	
			border-style:
		    dotted;border-color:#663300;
		    border-width:4px;
}

ul {
			list-style-type: none;
}

li { 	
			padding: 10px;
			float: left;
			text-align: left;
			font-family: Arial; color: #990000; 
			font-size: 14px;
}


A:visited {
         
			COLOR: #333399
}

A:hover {
	
			COLOR: #ff6600
}

.toptable {

			background-color: #ebebeb;
			width: 340px;
}



.contact-text { 
				
			COLOR: #009900;
			FONT: 13px verdana, arial, sans-serif; 
			font-weight: bold; 
}


.backgrounds { 
            background-image: url("background.jpg");
		    background-repeat: repeat-y;
		    background-position: 0px 0px;
		    background-attachment: fixed;
}




.shadeform	{ 

            FONT: 12px arial, verdana, sans-serif;
			background-image: url("shadeform.gif");
			text-align: left;
			WIDTH: 180PX;
			BORDER: #000000 1px solid;
			
}
.textarea1 { 
			FONT: 12px arial, verdana, sans-serif;
			background-image: url("shadeform.gif");
			WIDTH: 220PX;
			HEIGHT: 70PX;
			text-align: left;
			BORDER: #000000 1px solid;
}


.texfield { 
			FONT: 12px arial, verdana, sans-serif;
			background-image: url("shadeform.gif");
			text-align: left;
			BORDER: #000000 1px solid;
}
.textarea { 
			FONT: 12px arial, verdana, sans-serif;
			background-image: url("shadeform.gif");
			text-align: left;
			WIDTH: 275PX;
			HEIGHT: 135PX;
			BORDER: #000000 1px solid;
}

.dropdown {	
           COLOR: #333333;
		   WIDTH: 180PX;
		   FONT: 12px verdana, arial, sans-serif;
}



