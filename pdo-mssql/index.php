<?php
   try {
      $conn = new PDO( "sqlsrv:Server=FIERYDEVS;Database=CheckPlease", 'fierydevs', 'redhat123@'); 
      $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
   }

   catch( PDOException $e ) {
      die( "Error connecting to SQL Server" ); 
   }

   echo "Connected to SQL Server\n";

   $pre = 'tbl';
   $tblArr = ['Banks','CheckNums','CheckTrans','CheckTransDetails','Company','Departments','DeptCategory','EmailDetails','EmailProviders','LinkData','PayeeCompDeptAssign','PayeeDeptCatDeptAssign','Payees','States','TempCT','TempCTD','TextProviders','UserCompAssign','Users'];
   if(isset($_POST['table'])){
	   $selectedTable = $_POST['table'];
   }else{
	   $selectedTable = $tblArr[0];
   }
   
   $query = 'select * from '.$pre.$selectedTable; 
   $stmt = $conn->query( $query ); 
?>
<form method="post">
	Select Table : 
	<select name="table">
		<?php foreach($tblArr as $v){?>
			<option value="<?php echo $v?>" <?php echo $v==$selectedTable?'selected':''?>>
				<?php echo $v?>
			</option>
		<?php }?>
	</select>
	<input type="Submit" value="Submit"/>
</form>
<?php
   while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){ 
      echo "<pre>";print_r( $row ); 
   }
?>