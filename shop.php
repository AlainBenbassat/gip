<?php 
require_once 'classes/product.php'; 
$product = new Product();
?>
<!DOCTYPE html>
<html lang="en">
<?php
require_once 'snippets/head.html';
require_once 'classes/shopAPI.php';
?>

<body>
  <!--================Header Menu Area =================-->
  <?php
  require_once 'snippets/header.html';
  ?>
  <!--================Header Menu Area =================-->


  <!--================Category Product Area =================-->
  <section class="cat_product_area section_gap">
    <div class="container">
      <div class="row flex-row-reverse">
        <div class="col-lg-9">
          <div class="product_top_bar">
            <div class="left_dorp">
              <select class="sorting">
                <option value="1">Default sorting 00</option>
                <option value="2">Default sorting 01</option>
                <option value="4">Sorteer volgens beoordeling</option>
              </select>
              <select class="show">
                <?php echo _("<option value='1'>Aflopend</option>"); ?>
                <?php echo _("<option value='1'>Oplopend</option>"); ?>
                <option value="2">Show 14</option>
              </select>
            </div>
          </div>

          <?php echo $product->getProducts(); ?>

        <div class="col-lg-3">
          <div class="left_sidebar_area">
            <aside class="left_widgets p_filter_widgets">
              <div class="l_w_title">
                <h3>Browse Categories</h3>
              </div>
              <div class="widgets_inner">
                <ul class="list">
                  <li>
                    <a href="#">Frozen Fish</a>
                  </li>
                  <li>
                    <a href="#">Dried Fish</a>
                  </li>
                  <li>
                    <a href="#">Fresh Fish</a>
                  </li>
                  <li>
                    <a href="#">Meat Alternatives</a>
                  </li>
                  <li>
                    <a href="#">Fresh Fish</a>
                  </li>
                  <li>
                    <a href="#">Meat Alternatives</a>
                  </li>
                  <li>
                    <a href="#">Meat</a>
                  </li>
                </ul>
              </div>
            </aside>

            <aside class="left_widgets p_filter_widgets">
              <div class="l_w_title">
                <h3>Product Brand</h3>
              </div>
              <div class="widgets_inner">
                <ul class="list">
                  <li>
                    <a href="#">Apple</a>
                  </li>
                  <li>
                    <a href="#">Asus</a>
                  </li>
                  <li class="active">
                    <a href="#">Gionee</a>
                  </li>
                  <li>
                    <a href="#">Micromax</a>
                  </li>
                  <li>
                    <a href="#">Samsung</a>
                  </li>
                </ul>
              </div>
            </aside>

            <aside class="left_widgets p_filter_widgets">
              <div class="l_w_title">
                <h3>Color Filter</h3>
              </div>
              <div class="widgets_inner">
                <ul class="list">
                  <li>
                    <a href="#">Black</a>
                  </li>
                  <li>
                    <a href="#">Black Leather</a>
                  </li>
                  <li class="active">
                    <a href="#">Black with red</a>
                  </li>
                  <li>
                    <a href="#">Gold</a>
                  </li>
                  <li>
                    <a href="#">Spacegrey</a>
                  </li>
                </ul>
              </div>
            </aside>

            <aside class="left_widgets p_filter_widgets">
              <div class="l_w_title">
                <h3>Price Filter</h3>
              </div>
              <div class="widgets_inner">
                <div class="range_item">
                  <div id="slider-range"></div>
                  <div class="">
                    <label for="amount">Price : </label>
                    <input type="text" id="amount" readonly />
                  </div>
                </div>
              </div>
            </aside>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Category Product Area =================-->

  <!--================ start footer Area  =================-->
  <?php
  require_once('snippets/footer.php');
  ?>
  <!--================ End footer Area  =================-->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <?php
  require_once('snippets/js.html');
  ?>
</body>

</html>