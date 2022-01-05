<?php
require __DIR__ . '/parts/__connect_db.php';

$co_sql = "SELECT *
FROM `share_item` s
WHERE s.`share_order_category`='co' AND s.`share_status` = 1
AND s.`member_id`=1";
$co_rows = $pdo->query($co_sql)->fetchAll();

$cuso_sql = "SELECT *
FROM `share_item` s
WHERE s.`share_order_category`='cuso' AND s.`share_status` = 1  
AND s.`member_id`=1";
$cuso_rows = $pdo->query($cuso_sql)->fetchAll();


?>
<?php include __DIR__ . '/parts/__html_head.php' ?>
<?php include __DIR__ . '/parts/__navbar.php' ?>
<style>
.tag {
  background: #eee;
  padding: 5px 10px;
  text-decoration: none;
  border-radius: 10px;
  margin-right: 5px;
}
</style>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6">

      <div>
        <a href="share.php">待分享區</a>
        <a href="share_shared.php">已分享區</a>
        <a href="#">預覽牆</a>
      </div>

      <div class="row d-flex flex-row justify-content-between">
        <?php foreach($co_rows as $row): ?>



        <div class="card" style="width: 20rem;">

          <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="uploaded/img_share/<?= explode( ',', $row['share_img'])[0]??'';?>"
                  alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="uploaded/img_share/<?= explode( ',', $row['share_img'])[0]??'';?>"
                  alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="uploaded/img_share/<?= explode( ',', $row['share_img'])[0]??'';?>"
                  alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <img src="<?= $row['share_img'];?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?= $row['share_title'];?></h5>
            <p class="card-text"><?= $row['share_desc'];?></p><br>
            <p class="card-text"><small class="text-muted">Last updated <?= $row['share_date'];?></small></p>
            <p class="card-text"><small class="text-muted"><i class="far fa-thumbs-up">
                  <?= $row['share_liked'];?></i></small></p>
            <a href="#" class="tag <?=empty(explode("," ,$row['share_hash'])[0]) ? 'visually-hidden' : ''?>"><small
                class="text-muted"> <?=explode("," ,$row['share_hash'])[0] ?? ''?></small></a>
            <a href="#" class="tag <?=empty(explode("," ,$row['share_hash'])[1]) ? 'visually-hidden' : ''?>"><small
                class="text-muted "> <?=explode("," ,$row['share_hash'])[1] ?? ''?></small></a>
            <a href="#" class="tag <?=empty(explode("," ,$row['share_hash'])[2]) ? 'visually-hidden' : ''?>"><small
                class="text-muted "> <?=explode("," ,$row['share_hash'])[2] ?? ''?></small></a>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>


<?php include __DIR__ . '/parts/__scripts.php' ?>
<script>
$('#myCarousel').carousel();
</script>
<?php include __DIR__ . '/parts/__html_foot.php' ?>