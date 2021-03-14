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

if(isset($_GET['id']))
{
  $id = $_GET['id'] ;
}

$conn->query("set names utf8");// đồng bộ dữ liệu font tiếng việt không bị lỗi ;
//lấy menu
$sql1= "SELECT d.id,d.name FROM `fs_department` as d";
$sql2= "SELECT c.id,c.name,c.department_id FROM `fs_category` as c";
//lấy view
$updateView= "UPDATE `fs_product`  SET `view` = `view` + 1 WHERE id = $id";
//lấy trung bình lượt đánh giá
$rating ="SELECT AVG(star) as `sum` FROM `fs_rating_product` WHERE product_id =$id";
//lấy số sao
// Thực thi câu truy vấn và gán vào $result
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($updateView);
$result4 = $conn->query($rating);

$result6 = $conn->query($rating);//lấy sao ở đây
$s = $result6->fetch_assoc();
$result6 = mysqli_query($conn,"SELECT * FROM `fs_product` WHERE id=".$_GET["id"]);
$product =mysqli_fetch_assoc($result6); // đặt biến chuẩn dô
$image = mysqli_query($conn,"SELECT * FROM `fs_product_img` WHERE product_id=".$_GET["id"]);
$product['images'] =mysqli_fetch_all($image,MYSQLI_ASSOC);

$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
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
                              <?php
            }
          }
mysqli_data_seek($result2,0);

          ?>
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

                  <div class="hh ">


                <div class="trai">
                  <div class="image">

                    <img src="iphone.jpg" alt="">
                  </div>
                </div>
                <div class="phai ">
                  <div class="name_product">
                    <h1> <?= $product['name'];?></h1>
                  </div>
                  <div class="star">
                    <ul class="list-inline">


                      <?php
                    for($i =0; $i < 5; $i++){
                      if($i < $s['sum']){ ?>
                      <li title="star_rating" class="rating" style="cursor:pointer;color:yellow ; font-size:30px;">&#9733;
                      </li>
                    <?php  }else { ?>
                      <li title="star_rating" class="rating" style="cursor:pointer;color:gray ; font-size:30px;">&#9733;
                      </li>
                  <?php  }}
                      ?>
                    </ul>
                       <span class="fas fa-star"></span>

                  </div>
                  <div class="price_product">
                    Giá:<?=  $product['price'];?>
                  </div>
                  <div class="price_product_discount">
                    Giá giảm:<?=  $product['discount'];?>
                  </div>
                  <div class="desc">
                     <?=  $product['desc'];?>
                  </div>
                  <div class="view">
                    View:
                  <?= $product['view'];?>

                  </div>
                </div>


</div>


            <aside id="aside-right">right</aside>
        </div>
        <footer><span><strong>Copyright © 20XX Co., Ltd. All Rights Reserved.</strong></span></footer>
    </div>
</body>
</html>
