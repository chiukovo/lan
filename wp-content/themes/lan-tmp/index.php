<!--include header-->
<?php get_header(); ?>
<div id="ticket">
    <div class="ticket-wrap containers">
        <div class="ticket-search">
            <div class="container">
                <button class="btn-search"><i class="la la-filter"></i>自訂搜尋店家條件</button>
            </div>
        </div>
        <div class="container">
          <div class="ticket-search-wrap row" style="display: none">
              <div class="dropdown">
                  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      最低消費
                  </button>
                  <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript: void(0)">無低消</a>
                  </div>
              </div>
              <div class="dropdown">
                  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      地點
                  </button>
                  <div class="dropdown-menu">
                     <a class="dropdown-item" href="javascript: void(0)">地點</a>
                  </div>
              </div>
              <div class="dropdown">
                  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      最近捷運站
                  </button>
                  <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript: void(0)">最近捷運站</a>
                  </div>
              </div>
              <div class="dropdown">
                  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      營業時間
                  </button>
                  <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript: void(0)">星期日</a>
                      <a class="dropdown-item" href="javascript: void(0)">星期一</a>
                      <a class="dropdown-item" href="javascript: void(0)">星期二</a>
                      <a class="dropdown-item" href="javascript: void(0)">星期三</a>
                      <a class="dropdown-item" href="javascript: void(0)">星期四</a>
                      <a class="dropdown-item" href="javascript: void(0)">星期五</a>
                      <a class="dropdown-item" href="javascript: void(0)">星期六</a>
                      <a class="dropdown-item" href="javascript: void(0)">國定假日營業</a>
                  </div>
              </div>
              <div class="dropdown">
                  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      座位數量
                  </button>
                  <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript: void(0)">10個以內</a>
                      <a class="dropdown-item" href="javascript: void(0)">20個以內</a>
                      <a class="dropdown-item" href="javascript: void(0)">30個以內</a>
                      <a class="dropdown-item" href="javascript: void(0)">31個以上</a>
                      <a class="dropdown-item" href="javascript: void(0)">只開放外帶</a>
                  </div>
              </div>
              <div class="dropdown">
                  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      優惠代碼
                  </button>
                  <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript: void(0)">僅顯示有提供優惠代碼的店家</a>
                      <a class="dropdown-item" href="javascript: void(0)">全部顯示</a>
                  </div>
              </div>
              <div class="dropdown">
                  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      搜尋方式
                  </button>
                  <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript: void(0)">以照片&簡介為優先搜尋條件</a>
                      <a class="dropdown-item" href="javascript: void(0)">以地圖為優先搜尋條件</a>
                  </div>
              </div>
          </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
          <?php while ( have_posts() ) : the_post();?>
          <?php $data = getPostsDtails(get_the_ID());?>
          <div class="col-12 col-sm-6 col-md-4 element">
              <a href="<?php the_permalink();?>">
              <div class="element-body">
                  <div class="element-span"><?php echo $data['res_type'][0];?></div>
                  <div class="element-img">
                      <img src="<?php echo $data['main_img_url'][0];?>">
                  </div>
                  <div class="element-title"><?php the_title();?></div>
                  <div class="element-star"><i class="la la-star"></i>4.2(120)</div>
              </div>
              </a>
          </div>
          <?php endwhile;?>
        </div>
    </div>
</div>
<div id="map">
  <div class="map-wrap">
    <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1-Yutz5qjVKhymKIrkmB_Btejz-OKzNsj"></iframe>
  </div>
</div>

<script>
$(function() {
    $('.btn-search').click(function(event) {
        $('.ticket-search-wrap').toggle()
    });
})
</script>
<?php get_footer(); ?>