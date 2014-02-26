<form method="post" enctype="multipart/form-data">
	<ul>
		<li>
			Id: <input type="hidden" name="idduty" value="<?=isset($duty['idduty'])?$_GET['id']:'';?>"/>
		</li>
		<li>
			Nombre del Cargo: <input type="text" name="duty" value="<?=isset($duty['duty'])?$duty['duty']:'';?>"/>
		</li>
		

		
		<li>
			Submit: <input type="submit" name="submit"/>
		</li>
		<li>
			Reset: <input type="reset" name="reset"/>
		</li>
		
	
	</ul>
</form>