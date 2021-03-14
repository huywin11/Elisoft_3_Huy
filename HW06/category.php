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
$sql1 = "SELECT `id`,`name` FROM 	fs_department";
$sql2 = "SELECT * FROM 	fs_category " ;
$sql3 = "SELECT * FROM fs_product  LIMIT 20 " ;

$sql4="SELECT c.id, c.name, d.name FROM fs_category as c LEFT JOIN fs_department as d ON  d.`id` = c.`department_id`  ";
$sql5 = "SELECT * FROM `fs_product` WHERE 1" ;

$result6 = mysqli_query($conn,"SELECT * FROM `fs_department` WHERE id=".$_GET["id"]);
$product_list =mysqli_fetch_assoc($result6);

// $menu = mysqli_query($conn,"SELECT * FROM `fs_category` WHERE department_id = ".$_GET["id"]);
// $product_list['menus'] =mysqli_fetch_all($menu,MYSQLI_ASSOC);
// $list =mysqli_query($conn,$sql3);
// $product_list['lists'] =mysqli_fetch_all($list,MYSQLI_ASSOC);


$result7 = mysqli_query($conn,"SELECT * FROM `fs_product` WHERE category_id=".$_GET["id"]);
$showproduct =mysqli_fetch_assoc($result7);
$show = mysqli_query($conn,"SELECT * FROM `fs_category` WHERE id=".$_GET["id"]);
$showproduct['showproduct'] =mysqli_fetch_all($show,MYSQLI_ASSOC);

var_dump($showproduct);
// Thực thi câu truy vấn và gán vào $result
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
$result4 = $conn->query($sql4);
$result5 = $conn->query($sql5);



// Kiểm tra số lượng record trả về có lơn hơn 0
// Nếu lớn hơn tức là có kết quả, ngược lại sẽ không có kết quả
// if (($result->num_rows > 0) && ($result2->num_rows > 0))
// {
//     //Sử dụng vòng lặp while để lặp kết quả
//     while($row = $result->fetch_assoc()) {
//         echo "<b>". $row['name']."</b>: <br>";
//         // echo "</pre>";
//             while($row2 = $result2->fetch_assoc()){
//                 if($row2['department_id'] == $row['id']) {
//                     echo $row2['name'];
//                 }
//             }
//             //mysqli_data_seek($result2,offset,0);
//
//     }
//
// }
// else {
//     echo "Không có record nào";
// }

// ngắt kết nối
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
                  <a href="">Sản phẩm</a>

                    <ul class="sub-main-menu">
                      <?php
                      if ($result4->num_rows > 0){
                       while($row1 = $result1->fetch_assoc())
                         {?>
                        <li><a href="trangchu.php?id=<?=  $row1["id"];?>"><?php echo $row1["name"] ?></a>

                          <ul class="sub-menu">
                            <?php
                                   while($row2 = $result2->fetch_assoc()){
                                 if($row2['department_id'] == $row1['id']){

                                 ?>
                              <li><a href="listing.php?id=<?=  $row2["id"];?>"><?php echo $row2["name"] ?></a></li>
                            <?php        }}?>
                          </ul>
                        </li>
                      <?php        }}
                    ?>
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

                        <?php echo  $showproduct["name"];?></a>
                        </span>
                        <a href="detail.php?id=<?=   $row3["id"];?>"><img class="product-img" src="iphone.jpg"  ></a>
                        <span class="product-price"><?php echo $showproduct["price"];?></span>
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
