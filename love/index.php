<!DOCTYPE html>
<?php

$file = fopen('data/restaurants', 'r');
$ary = array();
$restaurant_ary = array();
while(!feof($file)){array_push($ary, trim(fgets($file)));}
fclose($file);
foreach($ary as $val){
array_push($restaurant_ary, explode("\t", $val));
}
# print_r($restaurant_ary); ###
$restaurant_counties = array_unique(
  array_map(function($s){
    return substr($s[0], 0, 6);
  }, $restaurant_ary)
);
# print_r($restaurant_counties); ###
$restaurant_types = array_unique(
  array_map(function($a){
    return $a[3];
  }, $restaurant_ary)
);
# print_r($restaurant_types); ###

$file = fopen('data/county_latlng', 'r');
$ary = array();
$county_latlng = array();
while(!feof($file)){array_push($ary, trim(fgets($file)));}
fclose($file);
foreach($ary as $val){array_push($county_latlng, explode("\t", $val));}
# print_r($county_latlng); ###

$file = fopen('data/foods', 'r');
$ary = array();
while(!feof($file)){array_push($ary, trim(fgets($file)));}
# print_r($ary); ###
$healthy_foods_ruby_ary = array_map(
  function($s){
    $a = array();
    $t = explode("\t", $s);
    array_push($a, isset($t[2]) ? $t[2] : '');
    array_push($a, explode(",", isset($t[7]) ? $t[7] : ''));
    array_push($a, isset($t[8]) ? $t[8] : '');
    array_push($a, isset($t[4]) ? $t[4] : '');
    array_push($a, isset($t[9]) ? $t[9] : '');
    array_push($a, isset($t[10]) ? $t[10] : '');
    return $a;
  }, $ary
);
# print_r($healthy_foods_ruby_ary); ###
$ary = array();
foreach(array_map(function($a){return $a[1];}, $healthy_foods_ruby_ary) as $val){
  foreach($val as $v){
    array_push($ary, $v);
  }
}
# print_r($ary); ###
$healthy_foods_ruby_func_ary = array_unique($ary);
# print_r($healthy_foods_ruby_func_ary); ###

?>
<html>
  <head>
    <title>Jaslyn & Meng-Jiun</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="image/favicon.ico">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/welcome.css">
    
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://www.google.com/jsapi"></script>
    <script src="script/bootstrap.min.js"></script>
    <script src="script/docs.min.js"></script>
    <script src="script/ie-emulation-modes-warning.js"></script>
    <script src="script/ie10-viewport-bug-workaround.js"></script>

    <!-- Add jQuery library -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

    <!-- Add fancyBox -->
    <link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

    <!-- Optionally add helpers - button, thumbnail and/or media -->
    <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
    <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

    <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
    <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

  </head>
  <body>
    <div id="trans_board" style="position: fixed; display: none;"></div>
    <div id="white_board_1" style="position: fixed; display: none;"></div>
    <div id="white_board_2" style="position: fixed; display: none;"></div>

    <div class="navbar-wrapper">
      <div class="container">
        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Jaslyn & Meng-Jiun 3-month Anniversary</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav" id="navbar_header_ui">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About This Love</a></li>
                <li><a href="#hsinchu">Hsinchu</a></li>
                <li><a href="#taipei">Taipei</a></li>
                <li><a href="#tokyo">Tokyo</a></li>
                <li><a href="#hk">Hong Kong</a></li>
                <li><a href="#contact">About The Future</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" id="navibar_header_button">
        <div class="item active">
          <img src="image/taiwan/love.jpg"/>
          <div class="container">
            <div class="carousel-caption">
              <h1>I LOVE U</h1>
              <p>一段從 2016 年 4 月 5 日開始，直到永遠的感情。</p>
              <!-- <p><a class="btn btn-lg btn-primary" href="#about" role="button" >馬上探索</a></p> -->
            </div>
          </div>
        </div>
        <div class="item">
          <img src="image/hk/3.jpg"/>
          <div class="container">
            <div class="carousel-caption">
              <h1>Companion</h1>
              <p>雖然有暫時的分離，但我們還是會一直陪伴對方下去。</p>
              <!-- <p><a class="btn btn-lg btn-primary" href="#restaurant" role="button">我要吃出美味</a></p> -->
            </div>
          </div>
        </div>
        <div class="item">
          <img src="image/hk/4.jpg"/>
          <div class="container">
            <div class="carousel-caption">
              <h1>Your Smile Is My Everything</h1>
              <p>我愛寶貝的笑容，讓你笑是世界上最開心的事。</p>
              <!-- <p><a class="btn btn-lg btn-primary" href="#food" role="button">我要吃出健康</a></p> -->
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>

    <div class="container marketing">
      <div class="row featurette" id="about">
        <div class="col-md-7">
          <h2 class="featurette-heading">關於這份愛<p><span class="text-muted">About This Love</span></p></h2><br>
          <p class="lead">我們一開始只是交大的 buddy。藉由做跨文化夥伴的機會，我更加認識了妳。在二餐吃飯、到清大吃火鍋、到淡水、在象山看101、逛夜市，我漸漸喜歡上妳。終於，我和你表白，然後我們真的在一起了。<br><br>
          之後，我們互相更加認識、一起成長，我們在圖書館有好多好多回憶，我們一起去了好多好多地方，我們創造了好多好多回憶。過程中，我更加喜歡妳，不知不覺已經深愛你了。<br><br>然後今天，我們三個月了！</p>
          <p class="pull-right" style="align: 100% 0% 0% 100%"><a href="#" class="a_back_to_top">Back to top</a></p>
        </div>
        <div class="col-md-5">
          <img src="image/taiwan/kiss.jpg" class="pic"/>
        </div>
      </div>
      <hr class="featurette-divider">

      <!-- Hsinchu -->
      <div class="row featurette" id="hsinchu">
        <div class="col-md-5">

          <a class="fancybox-thumb" rel="fancybox-thumb" href="image/taiwan/grad.jpg" >
  <img src="image/taiwan/grad.jpg" alt="" width="400"/>
</a> <br><br>
<a class="fancybox-thumb" rel="fancybox-thumb" href="image/taiwan/hs.jpg" >
  <img src="image/taiwan/hs.jpg" alt="" style="display: none;"/>
</a>
<a class="fancybox-thumb" rel="fancybox-thumb" href="image/taiwan/lib.jpg" style="display: none;">
  <img src="image/taiwan/lib.jpg" alt="" />
</a>
<a class="fancybox-thumb" rel="fancybox-thumb" href="image/taiwan/lib2.jpg" style="display: none;">
  <img src="image/taiwan/lib2.jpg" alt="" />
  </a>
  <a class="fancybox-thumb" rel="fancybox-thumb" href="image/taiwan/grad2.jpg" style="display: none;">
  <img src="image/taiwan/grad2.jpg" alt="" />
  </a>
  <a class="fancybox-thumb" rel="fancybox-thumb" href="image/taiwan/caf2.jpg" style="display: none;">
  <img src="image/taiwan/caf2.jpg" alt="" />
</a>

          <!-- <img src="image/rest2-crop.jpg" class="pic"/> -->
        </div>
        <div class="col-md-7">
          <h2 class="featurette-heading">新竹<p><span class="text-muted">Hsinchu</span></p></h2>
          <p class="lead">我們在新竹認識，交大、圖書館、你家我家、市區、巨城，處處是我們的記憶。二月我們在交大認識，三月我們在清大夜市吃飯，四月我們到市區，五月紀念日我們到巨城看電影。</p>
          <!-- <p><a class="btn btn-default" role="button" id="choose_restaurant_button">馬上尋找 &raquo;</a></p> -->
          <p class="pull-right" style="align: 100% 100% 0% 0%">按照片看更多。</p><br><br>
          <p class="pull-right" style="align: 100% 100% 0% 0%"><a href="#" class="a_back_to_top">Back to top</a></p>

        </div>
      </div>

      <!-- Taipei -->
      <hr class="featurette-divider">
      <div class="row featurette" id="taipei">
        <div class="col-md-7">
          <h2 class="featurette-heading">台北<p><span class="text-muted">Taipei</span></p></h2>
          <p class="lead">我們好幾次到台北玩。交往前的淡水、101、象山、夜市，交往後的西門町買衣服買 Pick、饒河街喝芋頭牛奶、士林夜市吃麻糬、永康街吃抹茶冰，甚至是在我老家煮的魚湯，在新家我們共處的時光，都讓我好想念好想念。</p>

          <p class="pull-right" style="align: 100% 100% 0% 0%">按照片看更多。</p><br><br>
          <p class="pull-right" style="align: 100% 0% 0% 100%"><a href="#" class="a_back_to_top">Back to top</a></p>

        </div>
        <div class="col-md-5">
          <a class="fancybox-thumb" rel="fancybox-thumb" href="image/taiwan/mrt.jpg" >
  <img src="image/taiwan/mrt.jpg" alt="" width="400"/>
</a> <br><br>
<a class="fancybox-thumb" rel="fancybox-thumb" href="image/taiwan/kiss.jpg" >
  <img src="image/taiwan/kiss.jpg" alt="" style="display: none;"/>
</a>
<a class="fancybox-thumb" rel="fancybox-thumb" href="image/taiwan/love.jpg" style="display: none;">
  <img src="image/taiwan/love.jpg" alt="" />
</a>
<a class="fancybox-thumb" rel="fancybox-thumb" href="image/taiwan/macha.jpg" style="display: none;">
  <img src="image/taiwan/macha.jpg" alt="" />
  </a>
  <a class="fancybox-thumb" rel="fancybox-thumb" href="image/taiwan/hsinyi.jpg" style="display: none;">
  <img src="image/taiwan/hsinyi.jpg" alt="" />
  </a>
  <a class="fancybox-thumb" rel="fancybox-thumb" href="image/taiwan/car.jpg" style="display: none;">
  <img src="image/taiwan/car.jpg" alt="" />
</a>

        </div>
      </div>

            <!-- Tokyo -->
      <div class="row featurette" id="tokyo">
        <div class="col-md-5">

          <a class="fancybox-thumb" rel="fancybox-thumb" href="image/tokyo/0.jpg" >
  <img src="image/tokyo/0.jpg" alt="" width="400"/>
</a>
<a class="fancybox-thumb" rel="fancybox-thumb" href="image/tokyo/1.jpg" >
  <img src="image/tokyo/1.jpg" alt="" style="display: none;"/>
</a>
<a class="fancybox-thumb" rel="fancybox-thumb" href="image/tokyo/2.jpg" style="display: none;">
  <img src="image/tokyo/2.jpg" alt="" />
</a>
<a class="fancybox-thumb" rel="fancybox-thumb" href="image/tokyo/3.jpg" style="display: none;">
  <img src="image/tokyo/3.jpg" alt="" />
 </a> 
  <a class="fancybox-thumb" rel="fancybox-thumb" href="image/tokyo/4.jpg" style="display: none;">
  <img src="image/tokyo/4.jpg" alt="" />
  </a>
  <a class="fancybox-thumb" rel="fancybox-thumb" href="image/tokyo/5.jpg" style="display: none;">
  <img src="image/tokyo/5.jpg" alt="" />
</a>
<a class="fancybox-thumb" rel="fancybox-thumb" href="image/tokyo/6.jpg" style="display: none;">
  <img src="image/tokyo/6.jpg" alt="" />
</a>
<a class="fancybox-thumb" rel="fancybox-thumb" href="image/tokyo/7.jpg" style="display: none;">
  <img src="image/tokyo/7.jpg" alt="" />
</a>
<a class="fancybox-thumb" rel="fancybox-thumb" href="image/tokyo/8.jpg" style="display: none;">
  <img src="image/tokyo/8.jpg" alt="" />
</a>
<a class="fancybox-thumb" rel="fancybox-thumb" href="image/tokyo/9.jpg" style="display: none;">
  <img src="image/tokyo/9.jpg" alt="" />
</a>
<a class="fancybox-thumb" rel="fancybox-thumb" href="image/tokyo/10.jpg" style="display: none;">
  <img src="image/tokyo/10.jpg" alt="" />
</a>
          
        </div>
        <div class="col-md-7">
          <h2 class="featurette-heading">東京<p><span class="text-muted">Tokyo</span></p></h2>
          <p class="lead">交往一個月後，我們一起到東京玩。迪士尼樂園、上野穿和服、六本木看夜景、大吃生魚片，途中雖然吵了不少架，但我真的很開心能帶你認識我喜歡的地方，我曾經唸書的地方，認識我的老師、最好的朋友。未來，我一定會帶妳再一次來，補完許許多多這次沒有達成的遺憾。</p>
          <!-- <p><a class="btn btn-default" role="button" id="choose_restaurant_button">馬上尋找 &raquo;</a></p> -->
          <p class="pull-right" style="align: 100% 100% 0% 0%">按照片看更多。</p><br><br>
          <p class="pull-right" style="align: 100% 100% 0% 0%"><a href="#" class="a_back_to_top">Back to top</a></p>

        </div>
      </div>

            <!-- Hong Kong -->
      <hr class="featurette-divider">
      <div class="row featurette" id="hk">
        <div class="col-md-7">
          <h2 class="featurette-heading">香港<p><span class="text-muted">Hong Kong</span></p></h2>
          <p class="lead">6 月底，我送你到香港交換。雖然只是短短的三天，我們吃了好多港式點心、甜品，吃了 108 港幣的鮑魚麵，坐船看維多利亞港的夜景、上太平山看浪漫的百萬夜景。最後一天，我送你到中文大學，雖然跟你走過一次新環境，但我還是好擔心，我不在你身邊照顧你會怎麼樣。你要好好的過下去，好嗎？我不在你身邊，但我們的心卻一直在一起唷！</p>

          <p class="pull-right" style="align: 100% 100% 0% 0%">按照片看更多。</p><br><br>
          <p class="pull-right" style="align: 100% 0% 0% 100%"><a href="#" class="a_back_to_top">Back to top</a></p>

        </div>
        <div class="col-md-5">
          <a class="fancybox-thumb" rel="fancybox-thumb" href="image/hk/2.jpg" >
  <img src="image/hk/2.jpg" alt="" width="400"/>
</a>
          <a class="fancybox-thumb" rel="fancybox-thumb" href="image/hk/1.jpg" style="display: none;">
  <img src="image/hk/1.jpg" alt="" width="400"/>
</a>
          <a class="fancybox-thumb" rel="fancybox-thumb" href="image/hk/0.jpg" style="display: none;">
  <img src="image/hk/0.jpg" alt="" width="400"/>
</a>
          <a class="fancybox-thumb" rel="fancybox-thumb" href="image/hk/3.jpg" style="display: none;">
  <img src="image/hk/3.jpg" alt="" width="400"/>
</a>
          <a class="fancybox-thumb" rel="fancybox-thumb" href="image/hk/4.jpg" style="display: none;">
  <img src="image/hk/4.jpg" alt="" width="400"/>
</a>
          <a class="fancybox-thumb" rel="fancybox-thumb" href="image/hk/5.jpg" style="display: none;">
  <img src="image/hk/5.jpg" alt="" width="400"/>
</a>
          <a class="fancybox-thumb" rel="fancybox-thumb" href="image/hk/6.jpg" style="display: none;">
  <img src="image/hk/6.jpg" alt="" width="400"/>
</a>

        </div>
      </div>


      <hr class="featurette-divider"/>
      <div class="row featurette" id="contact">
        <div class="col-md-12">
          <h2 class="featurette-heading">關於未來<p><span class="text-muted">About The Future</span></p></h2>
          <p class="lead">到 7/5 我們三個月了。然而卻因為我要當兵，未來這一年，我沒辦法去找妳。我們會每天 line 每天視訊，兩個月見一次面，相信我們能一起努力撐過去的。一年後，我會到新加坡唸書，接下來我們就會一直在一起，直到永遠。寶貝，好好等我好嗎 :)</p><br>
          <p class="lead">寶貝，我愛你。</p>
        </div>
      </div>
      <hr class="featurette-divider"/>
      <footer>
        <p class="pull-right"><a href="#" class="a_back_to_top">Back to top</a></p>
        <p>&copy; 2016/7/5, by Meng-Jiun Chiou</p>
      </footer>
    </div>

    <iframe width="854" height="480" style="display:none;"  
      src="https://www.youtube.com/embed/GCgvpwLNvtY?autoplay=1&loop=1&playlist=GCgvpwLNvtY" 
      frameborder="0" allowfullscreen></iframe>

  </body>
</html>


<script>
$(function(){

$('#navbar_header_ui li a, #navibar_header_button a')
  .css('color', 'rgb(200, 200, 200)')
  .click(function(){
    $('html, body').animate({scrollTop: $($(this).attr('href')).offset().top}, 'slow');
    return false;
  });
$('.a_back_to_top').click(function(){
  $('html, body').animate({scrollTop: 0}, 1000);
  return false;
});

$('#trans_board').css('display', 'none');
$('#white_board_1, #white_board_2').css('display', 'none');

$('#trans_board').click(function(){
  $('#white_board_1, #white_board_2, #choose_restaurant, #choose_food').css('display', 'none');
  $(this).css('display', 'none');
}).scroll(function(){return false;});

$('#choose_restaurant_button').click(function(){
  $(this).blur();
  $('#trans_board').css('display', 'block');
  $('#white_board_1')
    .css('display', 'block')
    .animate({opacity: 1}, 700)
    .html($('#choose_restaurant').css('display', 'block'));
  init_google_map_restaurant();
  return false;
});
$('#choose_food_button').click(function(){
  $(this).blur();
  $('#trans_board').css('display', 'block');
  $('#white_board_2')
    .css('display', 'block')
    .animate({opacity: 1}, 700)
    .html($('#choose_food').css('display', 'block'));
  $('#select_food').change(function(){
    var func = $(this).val();
    var ary = [];
    $.each(healthy_food_ary, function(i, val){
      if(val.func.indexOf(func) > -1){
        ary.push(val);
      }
    });
    edit_food_table(ary);
  });
  $('#select_food_text').change(function(){
    var text = $('#select_food_text').val();
    if(text != ''){
      var ary = [];
      $.each(healthy_food_ary, function(i, val){
        if(val.name.indexOf(text) > -1){
          ary.push(val);
        }
      });
      edit_food_table(ary);
    }
  });
  return false;
});


var healthy_food_ary = [];
function add_healthy_food(name, func, func_long, company, warning, notice){
  healthy_food_ary.push({
    name: name,
    func: func,
    func_long: func_long,
    company: company,
    warning: warning,
    notice: notice
  });
}
<?php
foreach($healthy_foods_ruby_ary as $val){
  $func = '[';
  foreach($val[1] as $v){
    $func = $func."'$v', ";
  }
  $func = $func.']';
  echo "add_healthy_food('${val[0]}', $func, '${val[2]}', '${val[3]}', '${val[4]}', '${val[5]}');\n";
}

?>
function edit_food_table(ary){
  $('#healty_food_table').html($('<tr></tr>').append('<td class="choose_food_th_class">名稱</td><td class="choose_food_th_class">公司</td>'));
  $.each(ary, function(i, val){
    $('#healty_food_table').append(
      $('<tr></tr>').append(
        $('<td class="right_table_food_td_style"></td>').append(
          $('<a style="cursor: pointer;"></a>').html(val.name).click(function(){
            // $.getJSON(encodeURI('https://ajax.googleapis.com/ajax/services/search/images?v=1.0&q='+val.name),
            //  function(data){
            //     console.log(data.responseData.results[0].url);
            //   });
            $('#select_food_info_div')
              .html($('<div style="align: center; font-size: 20px;"></div>').html(val.name))
              .append($('<div style="align: center; font-size: 16px;" class="biao_kai">功效：</div>').append(val.func=='' ? '無' : val.func))
              .append($('<div style="align: center; font-size: 16px;" class="biao_kai">注意事項：</div>').append(val.notice=='' ? '無' : val.notice))
              .append($('<div style="align: center; font-size: 16px;" class="biao_kai">搜尋更多商品資訊：</div>').append('<a target="_blank" href="http://ecshweb.pchome.com.tw/search/v3.2/?q='+encodeURI(val.name)+'"><img class="brand_icon" src="image/pchome.jpg"/></a>'));
            return false;
          })
        )
      ).append(
        $('<td class="right_table_food_td_style"></td>').append(val.company)
      )
    );
  });
}

var googleMapRestaurant = 0;
var googleMapMarkers = [];
function init_google_map_restaurant(){
  if(googleMapRestaurant == 0){
    googleMapRestaurant = new google.maps.Map(document.getElementById('google_map_restaurant'), {
      zoom: 11,
      center: new google.maps.LatLng(25.046337, 121.517444),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      panControl: false,
      streetViewControl: false,
      mapTypeControl: false});
    <?php
      foreach($restaurant_ary as $val){
        echo "addMarkerToGoogleMap(\"${val[0]}\", \"${val[1]}\", \"${val[2]}\", \"${val[3]}\", ${val[4]}, ${val[5]});\n";
      }
    ?>
  }
  $('#select_county').change(function(){
    var cty = $(this).val();
    var type = $('#select_restaurant_type').val();
    $.each(county_latlng, function(i, val){
      if(val.name == cty){
        googleMapRestaurant.setCenter(new google.maps.LatLng(val.lat, val.lng));
      }
    });
    $.each(googleMapMarkers, function(i, m){
      if(m.county.substring(0,2) == cty && (type == 'all' || m.type == type)){
        m.marker.setMap(googleMapRestaurant);
      } else {
        m.marker.setMap(null);
      }
    });
  });
  $('#select_restaurant_type').change(function(){
    var type = $(this).val();
    var cty = $('#select_county').val()
    $.each(googleMapMarkers, function(i, m){
      if((type == 'all' || m.type == type) && (cty == 'null' || m.county.substring(0,2) == cty)){
        m.marker.setMap(googleMapRestaurant);
      } else {
        m.marker.setMap(null);
      }
    });
  });
  $('#select_restaurant_name_text').change(function(){
    $.each(googleMapMarkers, function(i, m){
      if(m.name.indexOf($('#select_restaurant_name_text').val()) > -1){
        m.marker.setMap(googleMapRestaurant);
      } else {
        m.marker.setMap(null);
      }
    });
    googleMapRestaurant.setCenter(new google.maps.LatLng(24.1556056, 121.4318678));
    googleMapRestaurant.setZoom(7);
  });
}


var county_latlng = [
<?php
foreach($county_latlng as $val){
  echo "{name: '${val[0]}', lat: ${val[2]}, lng: ${val[1]}},\n";
}
?>
];

function addMarkerToGoogleMap(county, addr, name, type, lat, lng){
  var marker = new google.maps.Marker({
    map: null,
    position: new google.maps.LatLng(lat, lng)
  });
  marker.infowindow = new google.maps.InfoWindow({
    content: '<div>地址：'+addr+'<br>名稱：'+name+'</div>'
  });
  google.maps.event.addListener(marker, 'click', function(){
    $('#restaurant_info_name').html($('<div class="biao_kai"></div>').append(name));
    $('#restaurant_info_addr').html($('<div class="biao_kai"></div>').append(addr));
    $('#restaurant_info_a1').html('<img src="image/google.jpg" class="brand_icon"/>').attr('href', encodeURI('https://www.google.com.tw/webhp?hl=zh-tw&gws_rd=ssl#hl=zh-tw&q='+name));
    $('#restaurant_info_a2').html('<img src="image/ipeen.jpg" class="brand_icon"/>').attr('href', encodeURI('http://www.ipeen.com.tw/search/taiwan/000/0-100-0-0/'+name));
  });
  googleMapMarkers.push({
    name: name,
    marker: marker,
    county: county,
    type: type
  });
}

});
</script>

<script>
  $(document).ready(function() {
  $(".fancybox-thumb").fancybox({
    prevEffect  : 'none',
    nextEffect  : 'none',
    helpers : {
      title : {
        type: 'outside'
      },
      thumbs  : {
        width : 50,
        height  : 50
      }
    }
  });
});

</script>