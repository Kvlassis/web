$(document).ready(function()
	{
		
		$("#form1").submit(function(){
			event.preventDefault();
			$.post("backend.php?q=1",$("#form1").serialize(), function(res)
				{
					if(res=="1")
					{
					   $("#msg").html("<a href='index.php'><div class='correct'>Your data saved ! Try to login </div></a>");
					}
					else
					{
					   $("#msg").html("<div class='error'>Your data not saved ! Try again </div>");
					}
				}
			);


		});
		
		
		$("#form2").submit(function(){
			event.preventDefault();
			$.post("backend.php?q=2",$("#form2").serialize(), function(res)
				{
					
					if(res=="1")
					{
					   window.location.href = "login.php";
					}
					else
					{
					   $("#msg").html("<div class='error'>User with this username and password not found </div>");
					}
				}
			);


		});

		
		$("#form3").submit(
		
		function(){
			event.preventDefault();
			$.post("backend.php?q=3",$("#form3").serialize(), function(res)
				{
					if(res=="1")
					{
					   $("#msg").html("<a href='login.php'><div class='correct'>H επίσκεψη καταχωρήθηκε </div></a>");
					}
					else
					{
					   $("#msg").html("<div class='error'>Λάθος στην αποθήκευση </div>");
					}
				}
			);
			
			 
			
			
				
			


		});



		
		
		
		
		$("#form4").submit(
		
		function(){
			event.preventDefault();
			$.post("backend.php?q=6",$("#form4").serialize(), function(res)
				{
					if(res=="1")
					{
					   $("#msg").html("<a href='index.php'><div class='correct'>Τα στοιχεία αποθηκεύτηκαν</div></a>");
					}
					else
					{
					   $("#msg").html("<div class='error'>Λάθος στην αποθήκευση </div>");
					}
				}
			);
			
			 
			
			
				
			


		});

		
		
		$("#form8").submit(
		
		function(){
			event.preventDefault();
			$.post("backend.php?q=8",$("#form8").serialize(), function(res)
				{
					if(res=="1")
					{
					   $("#msg").html("<div class='correct'>H Δήλωση καταχωρήθηκε</div>");
					}
					else
					{
					   $("#msg").html("<div class='error'>Λάθος στην αποθήκευση </div>");
					}
				}
			);
			
			 
			
			
				
			


		});

		
		
		




	});
	
