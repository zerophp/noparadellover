<form method="post" enctype="multipart/form-data">
    <table class="table table-striped">
        <tr>
            <td>Nombre</td>
            <td><input type="text" name="name" value="<?=isset($data['name'])?$data['name']:'';?>"/></td>
        </tr>
        <tr>
            <td>Submit</td>
            <td><input type="submit" name="submit"/></td>
        </tr>
        <tr>
            <td>Reset</td>
            <td><input type="reset" name="reset"/></td>
        </tr>
    </table>
</form>