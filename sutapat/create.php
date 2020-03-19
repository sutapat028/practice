<?php
require 'db.php';
$message = '';
if (isset ($_POST['EMPNO'])  && isset($_POST['ENAME'])
    && isset ($_POST['JOB'])  && isset($_POST['MGR'])
    && isset ($_POST['HIREDATE'])  && isset($_POST['SAL'])
    && isset ($_POST['COMM'])  && isset($_POST['DEPTNO'])) {
  
  $EMPNO = $_POST['EMPNO'];
  $ENAME = $_POST['ENAME'];
  $JOB = $_POST['JOB'];
  $MGR = $_POST['MGR'];
  $HIREDATE = $_POST['HIREDATE'];
  $SAL = $_POST['SAL'];
  $COMM = $_POST['COMM'];
  $DEPTNO = $_POST['DEPTNO'];

  $sql = 'INSERT INTO emp(EMPNO, ENAME,JOB,MGR,HIREDATE,SAL,COMM,DEPTNO) VALUES(:EMPNO, :ENAME,:JOB,:MGR,:HIREDATE,:SAL,:COMM,:DEPTNO)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':EMPNO' => $EMPNO, ':ENAME' => $ENAME,
                          ':JOB' => $JOB, ':MGR' => $MGR,
                          ':HIREDATE' => $HIREDATE, ':SAL' => $SAL,
                          ':COMM' => $COMM, ':DEPTNO' => $DEPTNO
                          ])) {
    $message = 'data inserted successfully';
  }



}


 ?>
<?php
require 'db.php';
//$sql = 'SELECT * FROM emp';
$sql = "SELECT  e.EMPNO,e.ENAME,e.JOB,m.ENAME as MGRNAME,e.HIREDATE,e.SAL,e.COMM,d.DNAME
FROM emp e
INNER JOIN dept d
ON d.DEPTNO = e.DEPTNO
LEFT OUTER JOIN emp m
ON e.MGR = m.EMPNO";
$statement = $connection->prepare($sql);
$statement->execute();
$emp = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>

    
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>รหัสพนักงาน</th>
          <th>ชื่อ</th>
          <th>อาชีพ</th>
          <th>หัวหน้า</th>
          <th>วันที่เข้าทำงาน</th>
          <th>เงินเดือน</th>
          <th>คอมมิชชั่น</th>
          <th>แผนก</th>
        </tr>
        <?php foreach($emp as $person):?>
          <tr>
            <td><?= $person->EMPNO; ?></td>
            <td><?= $person->ENAME; ?></td>
            <td><?= $person->JOB; ?></td>
            <td><?= $person->MGRNAME; ?></td>
            <td><?= $person->HIREDATE; ?></td>
            <td><?= $person->SAL; ?></td>
            <td><?= $person->COMM; ?></td>
            <td><?= $person->DNAME;?></td>
            <td>
              <a href="edit.php?EMPNO=<?= $person->EMPNO ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?EMPNO=<?= $person->EMPNO ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
