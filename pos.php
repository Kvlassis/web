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
      <h3>Θετικό Τεστ</h3>
	  <div id="msg">
	
		</div>
		  <form action="" id=form8>
			  <div class="form-group">
				<label >Ημερομηνία Θετικού Τεστ:</label>
				<input type="date" class="form-control" id="date1" name="date1" required>
			  </div>
			
			  <button type="submit" class="btn btn-default">Δηλώνω θετικός</button>
		</form>
		
    </div>
	
	
	
	
   
  </div>
</div>

</body>
</html>