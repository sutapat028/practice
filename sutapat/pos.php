<?php
//1.start session
session_start();
 $empno = $_SESSION['empno'];

 //2. connect database
 require_once 'db.php';
 //3.query string
$sql = "SELECT * FROM emp WHERE EMPNO= ? ";
$statement = $connection->prepare($sql);
$statement->execute([$empno]);
$emp = $statement->fetch(PDO::FETCH_OBJ);
$ename = $emp->ENAME;
echo  $ename;
?>
<?php require 'header.php'; ?>
<php?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
    <center> <h3> Profile </h3></center>
    </div><br>
    <div class="container">
        <label for="ENAME">Employee ID : </label>
        <input type="text" value="<?= $emp->EMPNO; ?>"<button class="btn">
        
    </div>
    <br>
    <div class="container">
        <label for="ENAME">Empolyee Name : </label> 
        <input type="text" value="<?= $emp->ENAME; ?>"<button class="btn">
        
    </div>
    <br>
    <div class="container">
        <label for="ENAME">Job : </label> 
        <input type="text" value="<?= $emp->JOB; ?>"<button class="btn">
       
    </div>
    <br>
    <div class="container">
        <label for="ENAME">Menager : </label> 
        <input type="text" value="<?= $emp->MGR ?>"<button class="btn">
       
    </div>
    <br>
    <div class="container">
        <label for="ENAME">Hiredate : </label> 
          <input type="text" value="<?= $emp->HIREDATE ?>"<button class="btn">
         
    </div>
    <br>
    <div class="container">
        <label for="ENAME">Salary : </label> 
        <input type="text" value="<?= $emp->SAL ?>"<button class="btn">
     
    </div>
    <br>
    <div class="container">
        <label for="ENAME">Commission : </label>
        <input type="text" value="<?= $emp->COMM ?>"<button class="btn">
       
    </div>
    <br>
    <div class="container">
        <label for="ENAME">Department : </label> 
        <input type="text" value="<?= $emp->DEPTNO ?>"<button class="btn">
 
    </div>
    <br>
    <div class="container">
        <label for="ENAME">อีเมล : </label>
        <input type="text" value="<?= $emp->USERNAME ?>"<button class="btn">
     
    </div>
    <br>
    <div class="container">
        <label for="ENAME">รหัสผ่าน : </label> 
        <input type="text" value="<?= $emp->PASSWORD ?>"<button class="btn">
   
    </div>
    <br>
    <div class="container">
        <label for="ENAME">สถานะ : </label> 
        <input type="text" type="<?= $emp->ROLE ?>"<button class="btn">
       
    </div>

    <div class="form-group"><br>
        <center><input type="button" class="btn btn-primary" onclick="window.location='index.php'" value="ออกจากระบบ"></center> 
    </div>