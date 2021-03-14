<?php
// Kết nối CSDL
$conn = new mysqli('localhost', 'root', '', 'faceshop');

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// Câu SQL lấy danh sách
$conn->query("set names utf8");// đồng bộ dữ liệu font tiếng việt không bị lỗi ;
$sql1= "SELECT d.id,d.name FROM `fs_department` as d";
$sql2= "SELECT c.id,c.name,c.department_id FROM `fs_category` as c";
$sql3 = "SELECT * FROM	`fs_product`  LIMIT 20";
// Thực thi câu truy vấn và gán vào $result
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);

$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="style.css">

    <title>Huy</title>
    <script>
    $(document).ready(function(){
      $('navigation-menu ul li').css("display","block");
         $('navigation-menu ul li').css("display","none")
    })
    </script>
</head>
<body>
    <div class="container">
        <header>
            LOGO
        </header>
        <nav class="navigation-menu">
            <ul class="main-menu">
                <!-- <li><button id="btn-menu-bar"><i class="fas fa-bars"></i></i></button></li> -->
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Giới thiệu</a></li>
                <li>
                  <a href="#">Sản phẩm</a>

                    <ul class="sub-main-menu">
                      <?php
                      if ($result1->num_rows > 0){
                       while($row1 = $result1->fetch_assoc())
                         {?>
                        <li><a href="#"><?php echo $row1["name"] ?></a>

                          <ul class="sub-menu">
                            <?php
                                   while($row2 = $result2->fetch_assoc()){
                                    if($row2['department_id'] == $row1['id']){
                                      ?>
                                   <li><a href="listing.php?cat=<?=  $row2["id"];?>"><?php echo $row2["name"] ?></a></li>
                              <?php}}
                              mysqli_data_seek($result2,0);?>
                          </ul>
                        </li>
                      <?php }}?>
                    </ul>

                </li>
                <li><a href="#">Hướng dẫn</a></li>
                <li><a href="#">Liên hệ</a></li>
            </ul>
        </nav>
        <div id="main-content">
            <aside id="aside-left">Left</aside>
            <article>
                <section>

                  <?php
                  if ($result3->num_rows > 0){
                   while($row3 = $result3->fetch_assoc())
                     {?>
                    <div class="product">

                        <span class="product-name">
                          <a href="detail.php?id=<?=   $row3["id"];?>">
                        <?php echo  $row3["name"];?></a>
                        </span>
                        <a href="detail.php?id=<?=   $row3["id"];?>"><img class="product-img" src="iphone.jpg"  ></a>
                        <span class="product-price"><?php echo $row3["price"];?></span>
                        <button class="btn-buy">Mua</button>

                    </div>  <?php        }}
               ?>

                </section>
            </article>
            <aside id="aside-right">right</aside>
        </div>
        <footer><span><strong>Copyright © 20XX Co., Ltd. All Rights Reserved.</strong></span></footer>
    </div>
</body>
</html>
