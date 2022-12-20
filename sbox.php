<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajax demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>

	<div class="container my-5">
		<div class="row">
			<div class="col-md-4 offset-4">
				<div class="text-start">
					<input type="text" placeholder="Search something . . ." id="name" name="" class="form-control my-3" onkeyup="showHint(this.value)">
					<p>Suggested Name: <span id="hint"></span></p>
				</div>				
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function showHint($str){
			//alert('key pressed!');
			if($str.length == 0){
				document.getElementById('hint').innerHTML = '';
				return;
			}
			//ajax
			var val = new XMLHttpRequest();
			val.onload = function(){
				document.getElementById('hint').innerHTML = this.responseText;
			}
			val.open("GET", "hint.php?q="+$str, true);
			val.send();

		}
	</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>