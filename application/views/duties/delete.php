¿Seguro que deseas borrar el cargo?
<form method="post" enctype="multipart/form-data">
<ul>
<li>
Id: <input type="hidden" name="idduty" value="<?=isset($duty['idduty'])?$_GET['id']:'-';?>"/>
</li>
<li>
Cargo: <?=isset($duty['duty'])?$duty['duty']:'';?>
</li>


<li>
Si: <input type="submit" name="borrar" value="Si"/>
</li>
<li>
No: <input type="submit" name="borrar" value="No"/>
</li>


</ul>
</form>