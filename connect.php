<?php
/*if(!mysql_connect("localhost","admin_auction","passw0rd"))
		die(mysql_error());
	if(!mysql_select_db("admin_auction"))
	{	
		die("Error in selection database ".mysql_error());
	
	}*/
	
	if(!mysql_connect("localhost","root",""))
		die(mysql_error());
	if(!mysql_select_db("coh_auction"))
	{	
		die("Error in selection database ".mysql_error());
	
	}
	?>