<!DOCTYPE html>
<html>
<head>
  <title>COVID19</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="my.css">
  <script src="my.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>COVID19 CHECK POIS</h1>
  <p>Try our application to have more COVID19 security</p> 
</div>
  <nav class="navbar ">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" style='border-color:black;' data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="login.php">COVID19</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="login.php">Αρχική</a></li>
        <li><a href="pos.php">Δήλωση Θετικού Covid</a></li>
		<li><a href="cont.php">Επαφές με κρούσμα</a></li>
		<li><a href="prof.php">Τα στοιχεία μου</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    
    </div>
  </div>
</nav>
<hr>
<div class="container">
  <div class="row">
    <div class="col-sm-4">  
	  
    </div>
    <div class="col-sm-4">
      <h3>Τα στοιχεία μου</h3>
	  <div id="msg">
	
		</div>
		  <form action="" id=form4>
			  <div class="form-group">
				<label for="usr">Username:</label>
				<input type="text" class="form-control" id="usr" name="usr" required>
			  </div>
			  <div class="form-group">
				<label for="eml">email:</label>
				<input type="email" class="form-control" id="eml" name="eml" required>
			  </div>
			  <div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control" id="pwd" name="pwd" pattern="(?=.*\d)(?=.*[@$!%*#?&])(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
			  </div>
			  <button type="submit" class="btn btn-default">Αποθήκευση</button>
		</form>
		
		
    </div>
	</div>
	<div class=row>
	<div id=istoriko class='col-md-6'></div>
		<div id=diloseis class='col-md-6'></div>
	</div>
	<script>
		$.get("backend.php?q=7", function(res){
			var O=JSON.parse(res);
			$("#usr").val(O.username);
			$("#eml").val(O.email);
			$("#pwd").val(O.password);
			
		});
	
		$.get("backend.php?q=10", function(res){
			var js=JSON.parse(res);
			$("#istoriko").append("<h1>Ιστορικό επισκέψεων</h1><table class=table><tr><th>Σημείο</th><th>Hμερομηνία</th></tr>");
			for (i=0;i<js.length;i++)
			{
				$("#istoriko").append("<tr><td>"+js[i].name+"</td><td>"+js[i].datetime1+"</td></tr>");
			
			}
			$("#istoriko").append("</table>");
					
		});
		
		$.get("backend.php?q=11", function(res){
			var js=JSON.parse(res);
			$("#diloseis").append("<h1>Δηλώσεις σαν κρούσμα</h1><table class=table><tr><th>Hμερομηνία</th></tr>");
			for (i=0;i<js.length;i++)
			{
				$("#diloseis").append("<tr><td>"+js[i].date1+"</td></tr>");
			
			}
			$("#diloseis").append("</table>");
			
		});
	
	</script>
	
	
   
  </div>
</div>

</body>
</html>