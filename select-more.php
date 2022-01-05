<!-- // team SQL test 小專作業練習測試 -->
<?php
require __DIR__ . '/team-parts/__connect_db.php';

?>
<!-- 參考upload07 -->
<?php
$title = '多選TEST';
$pageName = 'select-more';
?>
<?php include __DIR__ . '/team-parts/__html_head.php' ?>

<?php include __DIR__ . '/team-parts/__html_navbar.php' ?>
<style>
#checkbox input[type="checkbox"] {
  display: none;
}



#checkbox input:checked+.button {
  background: #5e7380;
  color: #fff;


}

#checkbox .button {
  display: inline-block;
  margin: 0 5px 10px 0;
  padding: 5px 10px;
  background: #f7f7f7;
  color: #333;
  cursor: pointer;
}

#checkbox .button:hover {
  background: #bbb;
  color: #fff;
}

#checkbox .round {
  border-radius: 5px;
}

/* label {
        display: flex;
        flex-direction: column;
    } */
</style>
<?php

//連線後取資料
$sql = "SELECT * FROM materials";
//資料全部列出來
$rows = $pdo->query($sql)->fetchAll();

?>

<div class="container my-5">
  <div class="row">
    <h2>
      多選測試
    </h2>
  </div>
</div>

<div class="container">
  <div class="row d-flex flex-col">

    <div class="checkSelectAll row d-flex flex-col">
      <?php foreach ($rows as $r) : ?>
      <?php if ($r['material_id'] != 1) : ?>
      <div id="checkbox" class="col-lg-1 col-md-2 col-3 ">
        <div class="row-3 ">
          <label><input type="checkbox" class="selectCheck" name="<?= $r['material_name']; ?>"
              id="<?= $r['material_id'] ?>" /><span class="round button"><?= $r['material_name'] ?></span></label>
        </div>

      </div>
      <?php endif ?>
      <?php endforeach; ?>

    </div>
  </div>
</div>
<div class="container">
  <div class="row">
  </div>
</div>

<!-- 點了之後要出現下面的card -->
<div class="container">
  <div class="row mt-4  d-flex flex-col" id="showCardS">

    <?php foreach ($rows as $r) : ?>
    <div class="col-3 showCard" style="display: none;" id="<?= $r['material_id'] ?>">
      <div class="card">
        <img src="./uploaded/img_materials/<?= $r['material_img_path'];  ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?= $r['material_name'];  ?></h5>

        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<div class="container">
  <div class="row mt-4  d-flex flex-col ">
    <div class="col-3">
      <div class="card border-light">


        <a href="#" class="btn btn-primary my-3">存檔</a>

        <button onclick="reset()" class="btn btn-primary my-3">清除</button>

        <a href="#" class="btn btn-primary my-3">加入購物車</a>

      </div>
    </div>
  </div>
</div>
</div>

<?php include __DIR__ . '/team-parts/__html_scripts.php' ?>
<script>
const check = document.querySelector('#checkbox');
const shows = document.querySelectorAll('.showCard');
const showDiv = document.querySelector('#showCardS');
const inCheckId = document.querySelector('.selectCheck');
const checkSelectAll = document.querySelector('.checkSelectAll');
// const reset = document.querySelector('#reset')


let imgData = [];

checkSelectAll.addEventListener('click', function(event) {
  const t = event.target;
  console.log(t)


  for (show of shows) {
    if (t.classList.contains('selectCheck')) {
      if (t.id === show.id) {
        if (show.style.display === 'none') {
          show.style.display = 'flex';


        } else {
          show.style.display = 'none';

        }
        //         showDiv.innerHTML += `<div class="col-3 showCard" id="<?= $r['material_id'] ?>">
        //     <div class="card">
        //         <img src="./uploaded/img_materials/<?= $r['material_img_path'];  ?>" class="card-img-top" alt="...">
        //         <div class="card-body">
        //             <h5 class="card-title"><?= $r['material_name'];  ?></h5>
        //         </div>
        //     </div>
        // </div>`;
      }


      // if (show.style.display === 'none') {
      //     if (inCheckId.id === show.id) {
      //         show.style.display = 'flex';
      //     }
      // } else {
      //     show.style.display = 'none';

      // }

    }
  }
});
// }


// check.addEventListener('click', function(event) {
//     const t = event.target;
//     console.log("123");

//     renderImgs();
// })

// check.addEventListener('click', renderImgs);



// function cardUnitTpl(r) {
//     return ` < div class = "col-3 showCard"
style = "display: none;"
id = "<?= $r['material_id'] ?>" >
//                 <div class="card">
//                     <img src="./uploaded/img_materials/<?= $r['material_img_path'];  ?>" class="card-img-top" alt="...">
//                     <div class="card-body">
//                         <h5 class="card-title"><?= $r['material_name'];  ?></h5>

//                     </div>
//                 </div>
//             </>`;


// }


//清除按鈕
// function reset() {
//     showS.innerHTML = "";
// }
// reset.addEventListener('click', reset);



// function renderImgs() {
//     show.innerHTML = ''; // 清空
//     for (let i of imgData) { //當  i 在imgData 中
//         //用 show 接他產出得
//         show.innerHTML += cardUnitTpl(i);
//     }
// }


// //當點到 該物件的時候 執行
// check.addEventListener('click', function(event) {
//     const t = event.target;


//     //用來找出有包含''中的classname 的contains 內容
//     if (t.classList.contains('del-icon')) {



//         //closest 找最近的父層
//         const filename = t.closest('.card').getAttribute('card-title');
//         console.log(filename);
//         //找出imgData陣列中filename的索引位置
//         let loc = imgData.indexOf(filename);
//         if (loc !== -1) {
//             //將陣列用splice 切出 用index 的位置
//             imgData.splice(loc, 1);
//             renderImgs();
//         }
//     }
// });
</script>

<?php include __DIR__ . '/team-parts/__html_footer.php' ?>