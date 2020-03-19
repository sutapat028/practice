<?php
    require 'db.php';
    $sql = "select EMPNO,ENAME from emp where JOB = 'MANAGER' OR JOB ='PRESSIDENT'";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $emp = $statement->fetchAll(PDO::FETCH_OBJ);
    ?>
    <select name ="MGR">
    <?php
    foreach($emp as $person){
    ?>
        <option value="<?=$person->EMPNO?>"><?=$person->ENAME?></option>
<?php                 
    }
?>
    </select>