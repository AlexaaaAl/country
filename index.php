<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Города</title>
</head>
<body>
	<div id="content">
	
			<script type="text/javascript" src="/jquery.js"></script>
			<script type="text/javascript">
			function getList(type, obj) {
				$('#loading_' + type).show();
				$.post('city.php', {type: type, id: $('#'+obj).val()}, onAjaxSuccess);
				function onAjaxSuccess(data) {
			        	out = document.getElementById(type);
			 			for (var i = out.length - 1; i >= 0; i--) {
			      			out.options[i] = null;
			 			}
			        	eval(data);
			        	$('#loading_' + type).hide();
				}
			}
			</script>
<div id="openModal" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Фильтр</h3>
        <a href="#close" title="Close" class="close">×</a>
      </div>
      <div class="modal-body">  
			<div>страна</div>
			<div>
		   		<select name="countryid" id="country"  onchange="getList('region', 'country')" style="width:300px;">
												  <?php 
													include "city.php";

													$sql = mysqli_query ($connect, "SELECT 
													*
													 FROM country");

													while ($result = mysqli_fetch_array($sql)){

													echo ' <option value="'.$result['country_id'].'">'.$result['name'].'</option>';

													}
													?>
		   		    		   		       
		   		    		   		</select>
			</div>	
			<div>регион</div>
			<div style="display: none" id="loading_region"><img alt="" src="/img/ajax_loader.gif" />Загрузка...</div>
			<div>

		   		<select name="regionid" id="region" onchange="getList('city', 'region')" style="width:300px;">
		   		    		   		         
		   		    		   		</select>
			</div>

			<div>город</div>
			<div style="display: none" id="loading_city"><img alt="" src="/img/ajax_loader.gif" />Загрузка...</div>
			<div>
		   		<select name="city_id" id="city" style="width:300px;">
		   		    		   		        
		   		    		   		</select>
			</div>	
			
			<br /><br />
			
	</div>
	</div>
    </div>
  </div>
</div>
<div class="button_center" style="text-align: center"><a href="#openModal">Откуда вы?</a></div>
 
</body>
</html>