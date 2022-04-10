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
  
<div class="container">
  <div class="row">
    <div class="col-sm-4">  
	  
    </div>
    <div class="col-sm-4">
      <h3>SignUp</h3>
	  <div id="msg">
	
		</div>
		  <form action="" id=form1>
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
			  <button type="submit" class="btn btn-default">SignUp</button>
		</form>
		
    </div>
	
   
  </div>
</div>

</body>
</html>