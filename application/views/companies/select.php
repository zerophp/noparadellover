<h2 class="sub-header">Companies</h2>
<a href="companies.php?action=insert">Insert new company</a>
<br/>
<table class="table table-striped">
    <?php foreach($data as $row):?>
    <tr>
        <td><b><?=$row['name']?></b></td>
        <td>
            <a href="companies.php?action=update&id=<?=$row['idcompany'];?>">Update</a>
                &nbsp;
            <a href="companies.php?action=delete&id=<?=$row['idcompany'];?>">Delete</a>
        </td>
    </tr>
    <?php endforeach;?>
</table>