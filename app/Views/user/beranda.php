
<main>
  <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <!-- <div class="carousel-inner">
        <div class="carousel-item active">
            <video autoplay muted loop id="video-background" style="width: 100%;">
                <source src="<?= base_url('public/asset/video_1.mp4') ?>" type="video/mp4">
            </video>
            <div class="carousel-caption text-start">
                <h1>Various types of <b>fruits</b> available.</h1>
                <p class="opacity-75">We sell various kinds of fruit that are guaranteed to be fresh because they are purchased directly from farmers.</p>
                <p><a class="btn btn-lg btn-primary" href="#">Let's buy fruit</a></p>
            </div>
        </div>
        <div class="carousel-item">
            <video autoplay muted loop id="video-background" style="width: 100%;">
                <source src="<?= base_url('public/asset/video_2.mp4') ?>" type="video/mp4">
            </video>
            <div class="carousel-caption">
                <h1>Want to buy something?</h1>
                <p>please press the button below and find what you want to buy in our store</p>
                <p><a class="btn btn-lg btn-primary" href="<?= base_url('produk')?>">Buy something</a></p>
            </div>
        </div>
        <div class="carousel-item">
            <video autoplay muted loop id="video-background" style="width: 100%;">
                <source src="<?= base_url('public/asset/video_3.mp4') ?>" type="video/mp4">
            </video>
            <div class="carousel-caption text-end">
                <h1>Providing vegetables and spices.</h1>
                <p>The vegetables we sell are guaranteed to be fresh because they are stored in a room that can keep the vegetables fresh and our kitchen spices are of the best quality.</p>
                <p><a class="btn btn-lg btn-primary" href="#">Let's buy fruit and spices</a></p>
            </div>
        </div>
    </div> -->
    <div class="carousel-inner">
      <div class="carousel-item active">
          <img src="<?= base_url('public/asset/toko1.jpg') ?>" alt="Toko 1" class="d-block w-100" style="object-fit: cover; height: 56.25vw; max-height: 100%;">
          <div class="carousel-caption text-start">
              <h1><b>Putra Jaya</b>store location.</h1>
              <p class="opacity-75">Desa Bumi Ratu, Kec. Sungkai Selatan, Kab. Lampung Utara, Lampung <br>
              <a href="https://maps.app.goo.gl/n6ALHA2j4v6PSBqu5" target="_blank">https://maps.app.goo.gl/n6ALHA2j4v6PSBqu5</a></p>
              <p><a class="btn btn-lg btn-primary" href="https://maps.app.goo.gl/n6ALHA2j4v6PSBqu5">Let's shop offline!</a></p>
          </div>
      </div>
      <div class="carousel-item">
          <img src="<?= base_url('public/asset/toko2.jpg') ?>" alt="Toko 2" class="d-block w-100" style="object-fit: cover; height: 56.25vw; max-height: 100%;">
          <div class="carousel-caption">
              <h1>Want to buy something?</h1>
              <p>please press the button below and find what you want to buy in our store</p>
              <p><a class="btn btn-lg btn-primary" href="<?= base_url('produk')?>">Buy something</a></p>
          </div>
      </div>
      <div class="carousel-item">
          <img src="<?= base_url('public/asset/toko3.jpg') ?>" alt="Toko 3" class="d-block w-100" style="object-fit: cover; height: 56.25vw; max-height: 100%;">
          <div class="carousel-caption text-end">
              <h1>selling weed medicine and tools and building materials.</h1>
              <p>Quality and cheap grass medicine and building materials are here</p>
              <p><a class="btn btn-lg btn-primary" href="#">let's buy hair medicine and building materials</a></p>
          </div>
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <br>
  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <hr>
    <div class="row">
        <div class="h1">
            <h1>Our team</h1>
        </div>
        <div div class="col-lg-4">
            <img src="<?=base_url('public/asset/rama.jpeg')?>" class="bd-placeholder-img rounded-circle" width="140" height="140" role="img" aria-label="Placeholder" alt="foto">
            <h2 class="fw-normal">Rama Apriando</h2>
            <p>2259201023</p>
            <p>Students of the Information Systems and Technology Study Program, 4th semester.</p>
            <p><a class="btn btn-secondary" href="#">As programmer &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div div class="col-lg-4">
            <img src="<?=base_url('public/asset/alika.png')?>" class="bd-placeholder-img rounded-circle" width="140" height="140" role="img" aria-label="Placeholder" alt="foto">
            <h2 class="fw-normal">Alika Nur Fitria Sari</h2>
            <p>2259201022</p>
            <p>Students of the Information Systems and Technology Study Program, 4th semester.</p>
            <p><a class="btn btn-secondary" href="#">As analyst &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div div class="col-lg-4">
            <img src="<?=base_url('public/asset/dyah.png')?>" class="bd-placeholder-img rounded-circle" width="140" height="140" role="img" aria-label="Placeholder" alt="foto">
            <h2 class="fw-normal">Dyah Sulani Fahdah</h2>
            <p>2259201029</p>
            <p>Students of the Information Systems and Technology Study Program, 4th semester.</p>
            <p><a class="btn btn-secondary" href="#">As a database &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div div class="col-lg-4">
            <img src="<?=base_url('public/asset/nurul.png')?>" class="bd-placeholder-img rounded-circle" width="140" height="140" role="img" aria-label="Placeholder" alt="foto">
            <h2 class="fw-normal">Nurul Nabila Fitri</h2>
            <p>2259201030</p>
            <p>Students of the Information Systems and Technology Study Program, 4th semester.</p>
            <p><a class="btn btn-secondary" href="#">As design &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div div class="col-lg-4">
            <img src="<?=base_url('public/asset/anabil.jpg')?>" class="bd-placeholder-img rounded-circle" width="140" height="140" role="img" aria-label="Placeholder" alt="foto">
            <h2 class="fw-normal">Anabil Ilham Ramadhan</h2>
            <p>2259201002</p>
            <p>Students of the Information Systems and Technology Study Program, 4th semester.</p>
            <p><a class="btn btn-secondary" href="#">As documentation &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">Universitas Muhammadiyah Kotabumi <span class="text-body-secondary">Our campus.</span></h2>
        <p class="lead">Muhammadiyah University of Kotabumi (UMKO) is a college that is a merger of STKIP and STIH Muhammadiyah Kotabumi. The merger permit to become Muhammadiyah University of Kotabumi was marked by the issuance of Decree/Merger Permit No. 477/KPT/I/2019 by the Ministry of Research, Technology, and Higher Education.</p>
    </div>
    <div class="col-md-5">
        <img src="<?=base_url('public/asset/logo-umko.png')?>" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500"  dy=".3em">
    </div>
</div>

    <hr class="featurette-divider">
    
    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading fw-normal lh-1">Our progress. <span class="text-body-secondary">See for yourself.</span></h2>
        <p class="lead">Don't say you can't, say you can and see the magic. If you don't dare to try, Mr. Ryan will say "nah, kusut kalian ini".</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="<?=base_url('public/asset/progres.jpg')?>" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500"  dy=".3em">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">A brief overview of the engineering process. <span class="text-body-secondary">Exciting.</span></h2>
        <p class="lead">Coding is the activity of communicating with a computer through a series of lines of code from a programming language, which aims to execute commands. The computer only understands data in the form of on and off which is symbolized by binary code in the form of digits 1 and 0. This on and off change is regulated by a transistor, and this binary code is grouped under the name bytes.</p>
      </div>
      <div class="col-md-5">
        <img src="<?=base_url('public/asset/ss.png')?>" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500"  dy=".3em">
      </div>
    </div>

    <main>
  <!-- Konten lainnya ... -->

  <hr class="featurette-divider">

    <div style="display: flex; justify-content: center; align-items: flex-start; margin-top: 50px;">
        <div style="flex: 1;">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7951.560178551559!2d104.86589643893603!3d-4.807781089542956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e38a8cb47225a21%3A0xd2e026f22c44746f!2sUniversitas%20Muhammadiyah%20Kotabumi!5e0!3m2!1sid!2sid!4v1721169804193!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div style="flex: 1; padding-left: 20px;">
          <form action="send_email" method="post" style="max-width: 600px;">
            <?= csrf_field() ?>
            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Pesan</label>
              <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
          </form>
        </div>
    </div>
    <hr>
</main>

