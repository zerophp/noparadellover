<form method="post" enctype="multipart/form-data">
	<ul>
		<li>
			Id: <input type="hidden" name="idproject" value="<?=isset($project['idproject'])?$_GET['id']:'-';?>"/>
		</li>
		<li>
			Alias: <input type="text" name="alias" value="<?=isset($project['alias'])?$project['alias']:'';?>"/>
		</li>
		<li>
			Nombre: <input type="text" name="name" value="<?=isset($project['name'])?$project['name']:'';?>"/>
		</li>
		<li>
			Twitter: <textarea rows="5" cols="15" name="tweet"><?=isset($project['tweet'])?$project['tweet']:'';?></textarea>
		</li>
		<li>
			Presupuesto: <input type="number" name="budget" value="<?=isset($project['budget'])?$project['budget']:'';?>"/>
		</li>
		<li>
			Descripcion: <textarea rows="5" cols="15" name="description"><?=isset($project['description'])?$project['description']:'';?></textarea>
		</li>
		<li>
			Fecha inicio: <input type="date" name="date_ini" value="<?=isset($project['date_ini'])?$project['date_ini']:'';?>"/>
		</li>
		<li>
			Fecha fin: <input type="date" name="date_fini" value="<?=isset($project['date_fini'])?$project['date_fini']:'';?>"/>
		</li>
		
		<!-- 			Datos leídos de la tabla tipos de proyecto -->
		<!-- 			LEER DE LAS BASES DE DATOS -->
		
				</li>
		
		<!-- 			Datos leídos de la tabla tipos de proyecto -->
		<!-- 			LEER DE LAS BASES DE DATOS -->
		
		<li>
			Tipo de proyecto: 
					<?php foreach ($projects_type as $key => $type_of_project):?>
					<?php echo $type_of_project ['type']." "?>
					<input type="radio" value="<?php echo $type_of_project ['idproject_type']?>" name="project_types_idproject_type" <?=(isset($project['project_types_idproject_type'])&&$project['project_types_idproject_type']==$type_of_project ['idproject_type'])?'checked':'';?>/>
			<?php endforeach?>
		</li>
		<li>
			Empresa: 
			<?php foreach ($companies as $key => $company):?>
					<?php echo $company ['name']." "?>
					<input type="radio" value="<?php echo $company ['idcompany']?>" name="companies_idcompany" <?=(isset($project['companies_idcompany'])&&$project['companies_idcompany']==$company ['idcompany'])?'checked':'';?>/>
			<?php endforeach?>
		</li>
		
		<li>
			Tipo de proyecto: 

		</li>
		<li>
			Empresa: 

		</li>

		<li>
			Submit: <input type="submit" name="submit"/>
		</li>
		<li>
			Reset: <input type="reset" name="reset"/>
		</li>
	
	</ul>
</form>