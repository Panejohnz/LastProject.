<html>
<title>สัญญาห้องพัก</title>
<head>
<meta charset="utf-8">
<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.2.3/paper.css">
  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
  <style>@page { size: A4-L portrait}</style>
 
  <style>
    body   { font-family: Kanit; }
	#pdf   { text-align:justify;  }
    h1     { font-family: 'Kanit', cursive; font-size: 40pt; line-height: 18mm; text-align:justify;}
    h2, h3 { font-family: 'Kanit', cursive; font-size: 24pt; line-height: 7mm; text-align:justify; }
    h4     { font-size: 32pt; line-height: 14mm }
    h2 + p { font-size: 18pt; line-height: 7mm }
    h3 + p { font-size: 14pt; line-height: 7mm }
    li     { font-size: 11pt; line-height: 5mm }
    h1      { margin: 0 }
    h1 + ul { margin: 2mm 0 5mm }
    h2, h3  { margin: 0 3mm 3mm 0; float: left }
    h2 + p,
    h3 + p  { margin: 0 0 3mm 50mm }
    h4      { margin: 2mm 0 0 50mm; border-bottom: 2px solid black }
    h4 + ul { margin: 5mm 0 0 50mm }
    article { border: 4px double black; padding: 5mm 10mm; border-radius: 3mm }
  </style>
</head>
<?php   $stringrow = base_url(uri_string());
        $arraystate = (explode("/", $stringrow));
        $idtestt = ($arraystate[5]);
       ?>
    <?php $this->db->where('contract_id',$idtestt);
   $qq =  $this->db->get('contract');
   $data = $qq->row_array();
   
   $this->db->where('user_id', $data['user_id']);
        $qq2 = $this->db->get('users');
        $data2 = $qq2->row_array();
        
        $this->db->where('room_id', $data['room_id']);
        $qq3 = $this->db->get('room');
        $data3 = $qq3->row_array();

        $this->db->where('roomcategory_id', $data3['roomcate_id']);
        $mana1 = $this->db->get('roomcategory');
        $hh1 = $mana1->row_array();


        $this->db->where('employee_id', $data['employee_id']);
        $qq4= $this->db->get('emmployee');
        $data4 = $qq4->row_array();
        
        //$this->db->where('room_id',$data['room_id']);
        $this->db->where('pricebill_id', 1);
        $query1 = $this->db->get('pricebill');
        $data5 = $query1->row_array();

        $this->db->where('pricebill_id', 2);
        $query2 = $this->db->get('pricebill');
        $data8 = $query2->row_array();
        
      //   $this->db->select('*'); //
      //   $this->db->from('pricebill');
      //  $aa =  $this->db->get();
      //   $data6 = $aa->row_array();
    
      //   $this->db->where('pricebill_id', $data6['pricebill_id']);
      //   $qq5= $this->db->get('pricebill');
      //   $data5 = $qq5->row_array(); //


      //   $this->db->select('*');//
      //   $this->db->from('pricebillelec');
      //  $bb =  $this->db->get();
      //   $data7 = $bb->row_array();
      //   $this->db->where('pricebillelec_id', $data7['pricebillelec_id']);
      //   $qq6= $this->db->get('pricebillelec');
      //   $data8 = $qq6->row_array();//
        ?>
        
        <button onClick="window.print()">Print this page</button>
<body class="A4-L portrait">
<section class="sheet padding-20mm" id="pdf">
  <p class="ex1" align="right">วันที่ทำสัญญา  <?php echo $data['datecontract_start']; ?></p>
    <p class="ex2" align="left">สัญญาเช่าห้องพักฉบับนี้ ทำขึ้นระหว่าง</p>
    <p class="ex3" align="left">(ก) นาย/นาง/นางสาว <?php echo $data4['firstname_emp']; ?> <?php echo $data4['lastname']; ?> (ผู้มีอำนาจในการทำสัญญา)</p>
    <p class="ex3" align="left">ที่อยู่ <?php echo $data['address']; ?></p>
    <p class="ex3" align="left"> หมายเลขโทรศัพท์ <?php echo $data4['tel']; ?></p>
    <p class="ex3" align="left">ซึ่งต่อไปสัญญาฉบับนี้ จะเรียกว่า “ผู้ให้เช่า” ฝ่ายหนึ่งกับ</p>
    <p class="ex3" align="left">นาย/นาง/นางสาว ..<?php echo $data2['firstname']; ?>.. นามสกุล ..<?php echo $data2['lastname']?>.. หมายเลขโทรศัพท์ ..<?php echo $data2['tel'] ?>..</p>
    <p class="ex3" align="left">หมายเลขบัตรประชาชนเลขที่ ..<?php echo $data['identity_card'] ?>..</p>
    <p class="ex3" align="left">ซึ่งต่อไปสัญญาฉบับนี้ จะเรียกว่า “ผู้เช่า”</p>
        <br>
        <p class="ex2" align="left">ทั้งสองฝ่ายตกลงทำสัญญาโดยมีสาระสำคัญ ดังนี้</p>
<br>
<p class="ex3" align="left">ข้อ ๑ ผู้เช่าตกลงเช่าและผู้ให้เช่าตกลงให้เช่าห้องพักเลขที่  ..<?php echo $data3['roomnum']; ?>..</p>
<p class="ex3" align="left">ตั้งอยู่ <?php echo $data['address']; ?></p>
<p class="ex3" align="left">ค่าน้ำยูนิตละ......<?php echo $data5['pricemeter']; ?>......บาท &nbsp; ค่าไฟยูนิตละ....<?php echo $data8['pricemeter']; ?>....บาท</p>
<p class="ex3" align="left">เพื่อใช้เป็นที่อยู่อาศัยเท่านั้น ในอัตราค่าเช่าเดือนละ ..<?php echo $data['totalprice']; ?>.. บาท</p>
<p class="ex3" align="left">โดยมีกำหนดระยะเวลาในการเช่า ตั้งแต่วันที่ ..<?php echo $data['datecontract_start']; ?>.. ถึงวันที่ ..<?php echo $data['datecontract_end']; ?>..</p>

<p class="ex3" align="left">โดยมีกำหนดชำระค่าบริการก่อนวันที่ 25 ของทุกเดือน</p>
<br>
<p class="ex3" align="left">ข้อ ๒ ผู้เช่าตกลงเช่าและผู้ให้เช่าตกลงให้เช่า อุปกรณ์ไฟฟ้าและเฟอร์นิเจอร์ ภายในห้องพัก</p>
<p class="ex3" align="left">ในอัตราค่าเช่าเดือนละ .. <?php echo $data['totalprice']; ?>.. บาท โดยมีกำหนดชำระค่าบริการก่อนวันที่ 25</p>
<p class="ex3" align="left">ของทุกเดือน โดยมีสภาพของอุปกรณ์ไฟฟ้าและเฟอร์นิเจอร์ ปรากฎตามรายละเอียดหลักฐาน</p>
<p class="ex3" align="left">การตรวจรับสภาพอาคารแนบท้ายสัญญาฉบับนี้และถือว่าเป็นส่วนหนึ่งของสัญญาเช่า</p>
<br>
<br>
<br><br><br><br>

<p class="ex3" align="left">ข้อ ๓ ผู้ให้เช่าจะจัดส่งใบแจ้งค่าใช้จ่ายต่าง ๆ ที่ผู้เช่าต้องชำระให้แก่ผู้เช่าทราบล่วงหน้า</p>
<p class="ex3" align="left">ไม่น้อยกว่า ๗ วันก่อนถึงกำหนดวันชำระค่าใช้จ่ายต่าง ๆ โดยผู้ให้เช่ามีสิทธิตรวจสอบความถูกต้อง</p>
<p class="ex3" align="left">เกี่ยวกับค่าใช้จ่ายต่าง ๆที่เรียกเก็บ หากไม่ถูกต้องผู้เช่าสามารถโต้แย้งได้ก่อนถึงกำหนดวันชำระค่าใช้จ่ายดังกล่าว</p>
ิ<br>
<p class="ex3" align="left">ข้อ ๔ เมื่อสัญญาเช่าสิ้นสุดลง ผู้ให้เช่าจะทำการชำระเงินประกันคืนให้แก่ผู้เช่าทันที ในกรณ</p>
<p class="ex3" align="left">ที่ต้องมีการตรวจสอบความเสียหายผู้ให้เช่าจะชำระเงินประกันคืนให้แก่ผู้เช่าภายใน ๗ วัน นับจาก</p>
<p class="ex3" align="left">วันที่สัญญาเช่าสิ้นสุดและได้กลับเข้าครอบครองพื้นที่และทรัพย์สินที่ให้เช่า ทั้งนี้ ผู้ให้เช่าจะ</p>
<p class="ex3" align="left">รับผิดชอบค่าใช้จ่ายเกี่ยวกับการชำระเงินประกันคืนให้แก่ผู้เช่าตามวิธีการที่ผู้เช่ากำหนด</p>
<br>
<p class="ex3" align="left">ข้อ ๘ ผู้ให้เช่ามีสิทธิบอกเลิกสัญญาเช่ากับผู้เช่า หากผู้เช่าไม่ปฏิบัติตามเงื่อนไข ดังต่อไปนี้</p>
<p class="ex3" align="left">๘.๑ นำสัตว์เลี้ยงเข้ามาในพื้นที่เช่า</p>
<p class="ex3" align="left">๘.๒ ก่อเสียงดังหรือรบกวนสร้างความเดือนร้อนรำคาญกับผู้เช่ารายอื่น</p>
<p class="ex3" align="left">๘.๓ นำสิ่งของผิดกฎหมาย สิ่งเสพติด เล่นการพนัน และดื่มสิ่งมึนเมาในพื้นที่เช่า</p>
<p class="ex3" align="left">๘.๔ ดัดแปลง ต่อเติม รื้อถอน เคลื่อนย้ายทรัพย์สินต่าง ๆ หรือสร้างความเสียหายแก่พื้นที่เช่า</p>
<p class="ex3" align="left">๘.๕ นำบุคคลภายนอกเข้ามาในพื้นที่เช่าหรือพักอาศัยก่อนได้รับอนุญาตจากผู้ให้เช่า</p>
<p class="ex3" align="left">๘.๖ ไม่ชำระค่าเช่า หรือค่าใช้จ่ายอื่น ๆ ตามกำหนด</p>
<p class="ex3" align="left">ข้อ ๙ ผู้ให้เช่าไม่มีสิทธิยึดเงินค่าเช่าล่วงหน้า และ เงินประกัน เว้นแต่ ผู้เช่าผิดนัดไม่ชำระค่าเช่า</p>
<p class="ex3" align="left">หรือทำความเสียหายต่อทรัพย์สินที่เช่า โดยหักเงินดังกล่าวตามความจำเป็น และ มีเหตุผลอันสมควร</p>
<p class="ex3" align="left">ข้อ ๑๐ กรณีที่ผู้ให้เช่ามีความประสงค์เข้าตรวจสอบพื้นที่เช่า ผู้ให้เช่าต้องแจ้งให้ผู้เช่าทราบ</p>
<p class="ex3" align="left">ก่อนล่วงหน้าทุกครั้ง เว้นแต่ มีเหตุฉุกเฉินหรือจำเป็นที่ต้องเข้าไปทันที หากไม่เข้าไปจะเกิดความเสียหาย</p>
<p class="ex3" align="left">ข้อ ๑๑ ผู้ให้เช่าไม่มีสิทธิปิดกั้นไม่ให้ผู้เช่าเข้าใช้ประโยชน์หรือเข้าไปในพื้นที่เช่าเพื่อยึดทรัพย์สิน</p>
<p class="ex3" align="left">หรือขนย้ายทรัพย์สินของผู้เช่า ในกรณีที่ผู้เช่าไม่ชำระค่าเช่าหรือค่าใช่จ่ายอื่นๆ เกี่ยวกับสัญญา</p>
<p class="ex3" align="left">ข้อ ๑๒ ผู้เช่าต้องรับผิดชอบต่อความเสียหายหรือความชำรุดบกพร่องที่เกิดขึ้นจากการใช้งาน</p><br><br><br>
<p class="ex3" align="left">หรือเกิดจากการเสื่อมสภาพจากการใช้งานตามปกติกับพื้นที่เช่า ทรัพย์สิน และอุปกรณ์เครื่องใช้ต่างๆ ที่เช่า</p>
<p class="ex3" align="left">หากเกิดความเสียหายหรือความชำรุดบกพร่องที่เกิดจากหรือประมาทเลินเล่อของผู้เช่า</p>
<p class="ex3" align="left">ตามความเสียหายที่เกิดขึ้นจริงและมีเหตุผลอันสมควร</p>
<p class="ex3" align="left">ข้อ ๑๓ ในกรณีที่ผู้ให้เช่าจะใช้สิทธิบอกเลิกสัญญาต้องเป็นเงื่อนไขอันเป็นสาระสำคัญที่กำหนดไว้ในสัญญาเช่า</p>
<p class="ex3" align="left">ซึ่งผู้ให้เช่าได้แจ้งให้ผู้เช่าทราบแล้วก่อนเข้าทำสัญญาเช่าฉบับนี้</p>
<p class="ex3" align="left">ข้อ ๑๔ สัญญาเช่าฉบับนี้จัดทำขึ้น 2 ฉบับ ซึ่งมีข้อความถูกต้องตรงกันทุกประการ</p>
<p class="ex3" align="left">คู่สัญญาทั้งสองฝ่ายได้อ่านและทำความเข้าใจในสัญญาดีแล้ว จึงลงลายมือชื่อไว้เป็นหลักฐานต่อหน้าพยาน</p>
<p class="ex3" align="left">และยืดถือไว้ฝ่ายละฉบับ</p>
<br>
<p class="ex1" align="right">ลงชื่อ.................................................ผู้เช่า</p>
<p class="ex1" align="right">(.............................<?php echo $data2['firstname']; ?>.............................)</p>
<p class="ex1" align="right">ลงชื่อ.................................................ผู้ให้เช่า</p>
<p class="ex1" align="right">(....................<?php echo $data4['firstname_emp'];?>..........................)</p>

  </section>



<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://html2canvas.hertzen.com/build/html2canvas.js"></script>	 -->
<script>
var baseURL = "<?php echo base_url(); ?>";
function downloadPDF($pdf_id){
	$("#"+$pdf_id).css({ opacity: 0 });
	html2canvas([document.getElementById($pdf_id)], {
		onrendered: function(canvas) {
		   var image = canvas.toDataURL('image/png');
		   SaveImage(image);
		}
	});
}
function SaveImage(image){
	$.ajax({
		type: 'POST',
		url: baseURL+'Welcome/save',
		data: {base64Image:image,image_name:"pdf"},
		success: function(image) {
			var d = new Date();
			var n = d.getTime();
			window.location = image+"?t="+n;
		}
	});
}
$(document).ready(function(){
	setTimeout(init, 3000); 
});
function init(){
	downloadPDF("pdf");
}
</script>	
</body>
</html>
