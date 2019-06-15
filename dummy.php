<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
 .affix {
      top: 50px;
  }
body {
  background-color: #eeeeee;
}
#topnav {
  background-color: #263947;
  height: 50px;
  left: 0;
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 2;
}
#banner {
  background-color: #365063;
  color: #ffffff;
  top: 50px;
  width: 100%;
}
.border-left {
  border-left: 1px solid #ddd;
}
.border-right {
  border-right: 1px solid #ddd;
}
</style>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div id="topnav"></div>
<div id="banner">
  <div class="container" style="height: 130px; margin-top: 50px;">
  <h1>Bootstrap Affix Example</h1>
  <h3>Fixed (sticky) vertical sidenav on scroll</h3>
  </div>
</div>

<div class="container">
  <div class="row">
    <nav class="col-lg-2">
      <ul class="nav nav-stacked" style="margin-top: 20px;">
        <li><a href="#section1">Section 1</a></li>
        <li><a href="#section2">Section 2</a></li>
        <li><a href="#section3">Section 3</a></li>
      </ul>
    </nav>
    <div class="col-lg-7 border-left border-right">
      <h3>Scroll this page to see how the left navigation menu behaves with data-spy="affix".</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc id pulvinar massa. Donec erat purus, tincidunt vitae massa et, molestie facilisis metus. Vivamus ultrices vel massa non aliquet. Nunc urna ex, congue at lectus vel, sollicitudin lobortis libero. Pellentesque sollicitudin scelerisque condimentum. Vestibulum ultricies eget lorem at eleifend. Sed efficitur venenatis justo sed porttitor. Nulla nec posuere lorem, a facilisis ex. Donec nec lectus vestibulum, rhoncus nulla feugiat, pulvinar libero. Praesent vehicula maximus metus, quis gravida justo lacinia ut. Sed ut suscipit ligula, id lobortis urna. Donec id aliquet arcu. Sed dignissim commodo diam vitae aliquet.</p>
      <p>Curabitur pharetra finibus volutpat. Morbi nec elit nisi. Cras pretium venenatis enim. Pellentesque eget nisl non dolor imperdiet tincidunt vel et nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas a nisl egestas, vestibulum mauris ac, dapibus arcu. Etiam et euismod massa. Suspendisse ac ultricies lorem. Sed vitae quam erat. Aenean ac eros non ex tincidunt rhoncus vel viverra metus. Duis eu dolor molestie, lobortis mi nec, egestas dolor. Donec dui tortor, congue nec porta ac, dignissim feugiat metus. Maecenas nec malesuada nisi. Vestibulum eu lacus ante.</p>
      <p>Cras tincidunt in orci et facilisis. Pellentesque ac sagittis ligula. Vestibulum a gravida mauris. Quisque mattis tellus eget ipsum dictum, sit amet blandit mauris venenatis. Vestibulum sagittis lectus tellus, nec consectetur mi bibendum vehicula. Curabitur non metus id quam feugiat sollicitudin. Nullam nec sollicitudin erat.</p>
      <p>Morbi vel turpis vulputate, ultrices odio in, commodo elit. Vestibulum posuere vel felis at mattis. Cras auctor maximus leo, quis sagittis orci vehicula non. Curabitur tincidunt dolor in turpis tincidunt, id cursus nisl tempor. Sed bibendum tellus ac venenatis ullamcorper. Nunc dapibus, risus vitae sagittis malesuada, ligula massa consectetur enim, vitae ullamcorper turpis sapien sit amet sem. Pellentesque aliquam ligula non tellus iaculis, non volutpat nulla vehicula. Phasellus rutrum dolor erat, sed dictum leo faucibus vitae. Aenean placerat eget mauris id elementum. Nam id porttitor turpis. Duis at tristique risus. Nunc posuere eleifend sapien nec fermentum. Nunc ac placerat mi, quis sollicitudin felis. Donec metus urna, ornare vel mattis efficitur, lacinia et sapien. Vivamus nec consectetur ex. Mauris maximus ornare erat sed placerat.</p>
      <p>Cras dignissim sed justo vitae malesuada. Quisque eget interdum tortor. Maecenas tristique nec nulla id tincidunt. Donec lacinia, mauris nec pellentesque commodo, erat libero commodo ligula, nec condimentum sem purus malesuada diam. Curabitur eget porta nibh. Aenean ipsum massa, ullamcorper ac massa pretium, posuere varius leo. Aliquam ultricies, velit id ornare sodales, dolor ipsum euismod mi, sed mattis augue justo eu dui. Integer in elit libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi porta rhoncus dolor, nec tempus ipsum.</p>
      <p>Cras dignissim sed justo vitae malesuada. Quisque eget interdum tortor. Maecenas tristique nec nulla id tincidunt. Donec lacinia, mauris nec pellentesque commodo, erat libero commodo ligula, nec condimentum sem purus malesuada diam. Curabitur eget porta nibh. Aenean ipsum massa, ullamcorper ac massa pretium, posuere varius leo. Aliquam ultricies, velit id ornare sodales, dolor ipsum euismod mi, sed mattis augue justo eu dui. Integer in elit libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi porta rhoncus dolor, nec tempus ipsum.</p>
      <p>Cras dignissim sed justo vitae malesuada. Quisque eget interdum tortor. Maecenas tristique nec nulla id tincidunt. Donec lacinia, mauris nec pellentesque commodo, erat libero commodo ligula, nec condimentum sem purus malesuada diam. Curabitur eget porta nibh. Aenean ipsum massa, ullamcorper ac massa pretium, posuere varius leo. Aliquam ultricies, velit id ornare sodales, dolor ipsum euismod mi, sed mattis augue justo eu dui. Integer in elit libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi porta rhoncus dolor, nec tempus ipsum.</p>
    </div>
    <div class="col-lg-3">
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
    $('.nav').affix({offset: {top: 130} }); 
});
</script>
</body>
</html>