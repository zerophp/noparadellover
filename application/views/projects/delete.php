¿Seguro que deseas borrar el usuario?
<form method="post" enctype="multipart/form-data">
<ul>
<li>
Id: <input type="hidden" name="id" value="<?=isset($project['idproject'])?$_GET['id']:'-';?>"/>
</li>
<li>
Project: <?=isset($project['name'])?$project['name']:'';?>
</li>
<li>
Si: <input type="submit" name="borrar" value="Si"/>
</li>
<li>
No: <input type="submit" name="borrar" value="No"/>
</li>


</ul>
</form>