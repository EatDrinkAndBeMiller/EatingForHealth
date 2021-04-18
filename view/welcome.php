<?php include('header.php') ?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/download.jpeg" class="d-block w-100" alt="meal">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/download1.jpeg" class="d-block w-100" alt="food">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  
  <br>
<div class="container text-center">    
  <h3>Recommended Recipes</h3><br>
  <div class="row">
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-md-5">
          <img src="images/recipes/cabbagesoup.jpg" style="width:100%" alt="cabbage soup">
        </div>
        <div class="col-md-7">
          <div class="card-body">
            <h5 class="card-title">Cabbage Soup</h5>
            <p class="card-text">Free of dairy, gluten, eggs, sugar, nuts, coconut, oats and shellfish</p>
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-md-5">
          <img src="images/recipes/cabbagesoup.jpg" style="width:100%" alt="cabbage soup">
        </div>
        <div class="col-md-7">
          <div class="card-body">
            <h5 class="card-title">Cabbage Soup</h5>
            <p class="card-text">Free of dairy, gluten, eggs, sugar, nuts, coconut, oats and shellfish</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

 <br>

<?php include('footer.php') ?>