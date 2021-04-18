<?php include('header.php') ?>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <a href="diet.php">
        <img src="images/welcome_carousel.png" class="d-block w-100" alt="welcome slide with link to The Diet">
          <!-- <div class="carousel-caption d-none d-md-block">
            <h5>title</h5>
            <p>Caption</p>
          </div> --></a>
    </div>
    <div class="carousel-item">
      <a href="resources.php">
        <img src="images/video_carousel.png" class="d-block w-100" alt="screenshot of tutorial video with link">
          <!-- <div class="carousel-caption d-none d-md-block">
            <h5>title</h5>
            <p>Caption</p>
          </div> --></a>
    </div>
    <div class="carousel-item">
    <a href="resources.php">
        <img src="images/membership_carousel.png" class="d-block w-100" alt="slide about membership and link to sign up">
          <!-- <div class="carousel-caption d-none d-md-block">
            <h5>title</h5>
            <p>Caption</p>
          </div> --></a>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="##carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="##carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
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