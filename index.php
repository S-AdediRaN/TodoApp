<?php
//starting Session
session_start();

//Stops Resubmission of Input Field
if($_POST){
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width , initial-scale=1">
		<link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	</head>
		<body>
			<div class="wrapper">
			
	
          <div class="main-container">		
			  
			  
			<div class="container" id="first-container">
					<header>
						<div class="main-header">
							<img src="image/codespace.svg" width="150px"><br>
							<h1><i class="fas fa-tasks" style= "color: red;"></i>TimeKeeper</h1>
							<a href="#"><p class="button"><i class="far fa-list-alt" style= "color: red;"></i>&nbsp;ToDoApp V1 Beta </p></a>&nbsp;&nbsp;&nbsp;
							
						</div>
					</header>
			</div><!--container-->
		

		
			<div class="container" id="second-container">
					<header>
						<div id="inner1">
							<div id = "inner2">
									     <!---- Form to catch user Input--->
									<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
										<input type="submit" style="position: absolute; left: -9999px"/>
										<h3>My ToDo List</h3>
										<input type="text" name = "todoEntry" id = "todoEntry" placeholder=" Enter your Todo list here......">
									</form>
							</div>

	<?php
                            
                            ////////MAIN PROGRAM////////
                            

if(isset($_POST['todoEntry'])){
    if(!isset($_SESSION['todolist'])){
        $_SESSION['todolist'] = array();
        $_SESSION['todolist'] []= $_POST['todoEntry'];
    }else{
        $_SESSION['todolist'] []= $_POST['todoEntry'];
   
    }
}
     displayMsg();

   function displayMsg(){

   	  if (isset($_SESSION['todolist'])){
	   	  	echo "<ul class = \"list\">";
		    foreach( $_SESSION['todolist'] as $value){
		    echo "<li>"."<i class=\"fas fa-tags\"></i>"."&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;".$value."&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;"."</li>"."<br>";
		    } 
		    echo "</ul>";

   	  }


	  	
  }
   
?>
							
						</div>
					</header>
			</div><!--container-->
			  
			  
		</div><!--main-container-->
				
		</div><!--wrapper-->	
			
			
	        <footer>
				<div class="footer">
					<p class="copyright">&copy; Oluwasina Adediran Codespace</p>
				</div>
			</footer>
			
			
		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
		<script>
  $(document).ready(function(){
    var itemStrick= 0;
      $('li').each(function(i) {
          $(this).click(function(){
            checkNum = i;
            if(itemStrick == 0){
                   $(this).css("text-decoration", "line-through");
                    $(this).css("color", "red");
                
                   itemStrick = 1;
                   sessionStorage.setItem(checkNum,itemStrick);

            }else{
                    $(this).css("text-decoration", "none");
                    $(this).css("color", "white");
                    itemStrick = 0;
                    sessionStorage.setItem(checkNum,itemStrick);

           }
       });
      });
      $('li').each(function(i) {
         if(sessionStorage.getItem(i)==1){
            $(this).css("text-decoration", "line-through");
            $(this).css("color", "red");
          }
      });
    
  });
  
  </script>







		</body>
</html>