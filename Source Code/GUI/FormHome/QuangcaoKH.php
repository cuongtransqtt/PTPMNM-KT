<style>
table tr td mark{
 text-align:center;
}
</style>  
<!--  kết nối tạo câu lệnh truy vấn-->
  <?php
   //KẾt nối với Thông tin sách để quảng cáo
   require("../../Data/Connect.php");
	  $abcd = "SELECT * FROM  Sach.Sach inner join SAch.NXB on Sach.Sach.maNXB=Sach.NXB.manxb inner join SAch.TheLoai on Sach.Sach.MaTL=Sach.TheLoai.MaTL";//SQL
	  $stmt = db2_prepare($conn, $abcd);//thực hiện kết nối truy vấn
		
		if ($stmt) {		
			$result = db2_execute($stmt);
       if (!$result) {
				echo "exec errormsg: " .db2_stmt_errormsg($stmt);
			}	
   ?> 
   <!--  Show bảng quảng cáo-->   
    <table width="1000px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
            	<tr id="main-navbar" height="36px"class="menu-item" >
                	<td colspan="6">Sản Phẩm Nổi Bật</td>
                </tr>
         
        <?php  while($row=db2_fetch_array($stmt)){//duyệt các cột truy vấn được in ra màn hình?>
				<tr>
                	<td id="info">
<img width="90px" height="80px" src="../sach/<?php echo "$row[2]";?>"/> 
                    </td>
                <td align="justify" id="info" ><h5><font color="#0000CC"><?php echo "$row[1] :";?> </font></h5><?php echo "$row[6]";?></td>
                <td align="justify" id="info" ><?php echo "Giá :$row[5]";?></td> 
                <td align="justify" id="info" ><?php echo "Tác Giả:$row[7]";?></td> 
                <td align="justify" id="info" ><img src="../images/phonghop.png"/> <a href="admin.php?page=suasach&idtv=<?php echo"$row[0]";?>">Mua</a></td> 
                </tr>
                <?php }}?>
            </table>