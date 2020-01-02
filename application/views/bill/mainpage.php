<html>
<head>
<title>CODEMANIA.BLOGSPOT.COM</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/bootstrap.min.css">

<style>

    .highlight {
        background-color: #FFFF88;
    }

    .red_text{
        color : red;
    }
   
    table th,table td{
        text-align: center !important;
    }
</style>
</head>
<body>
   
    <div class="container">
   
    
     
    <form class="form-horizontal" method="GET" action="meter_list.php">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">เลือกเดือน : </label>
           
             <input type="text" class="form-control" name="year" placeholder="เดือน" value="">
             <input type="text" class="form-control" name="month" placeholder="เดือน" value="">
            <input type="submit" value="ประมวลผล" />
        </div>
    </form>
   
      <div class="row">       
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th rowspan=2>ห้อง</th>
                    <th colspan=2>ค่าน้ำ</th>
                    <th colspan=2>ค่าไฟ</th>
                </tr>
                <tr>
                    <td align="center">เดือนที่แล้ว</td>
                    <td align="center">เดือนปัจจุบัน</td>
                    <td align="center">เดือนที่แล้ว</td>
                    <td align="center">เดือนปัจจุบัน</td>
                </tr>
            </thead>
            <tbody>
                <?php if( !empty($results) ) {
                    foreach($results as $row){
                ?>
                <tr>
                    <td><?php echo $row['billroomnum'];?></td>
                    <td><?php echo $row['Electricbill'];?></td>
                    <td><?php echo $row['Waterbill'];?></td>
                    <td><?php echo $row['Rates'];?></td>
                    <td><?php echo $row['date'];?></td>
                </tr>
                <?php }}?>
            </tbody>
        </table>
      </div>
     
    </div><!-- container -->

    <footer class="footer">
        <br/><br/>
      
    </footer>

</div> <!-- /container -->
</body>
</html>
