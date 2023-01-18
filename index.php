<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en-US" class="">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>DAMSASHS</title>
  <link href="img/logo/damsashs.jpg" rel="icon">
  <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,500italic,700,900' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800:latin' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="indexfiles/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="indexfiles/css/responsive.css">
  <link rel="stylesheet" type="text/css" href="indexfiles/css/media-screens.css">
  <link rel="stylesheet" type="text/css" href="indexfiles/css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="indexfiles/css/owl.theme.css">
  <link rel="stylesheet" type="text/css" href="indexfiles/css/animate.css">
  <link rel="stylesheet" type="text/css" href="indexfiles/css/style.css">

  <!-- SKIN COLORS -->
  <!-- Default color: BLUE -->
  <link rel="stylesheet" type="text/css" href="css/skin-colors/skin-default.css">
  <!-- Color: GREEN -->
  <!-- <link rel="stylesheet" type="text/css" href="css/skin-colors/skin-green.css"> -->
  <!-- Color: GREY -->
  <!-- <link rel="stylesheet" type="text/css" href="css/skin-colors/skin-grey.css"> -->
  <!-- Color: ORANGE -->
  <!-- <link rel="stylesheet" type="text/css" href="css/skin-colors/skin-orange.css"> -->
  <!-- Color: PURPLE -->
  <!-- <link rel="stylesheet" type="text/css" href="css/skin-colors/skin-purple.css"> -->
  <!-- Color: RED -->
  <!-- <link rel="stylesheet" type="text/css" href="css/skin-colors/skin-red.css"> -->
  <!-- Color: TURQUOISE -->
  <!-- <link rel="stylesheet" type="text/css" href="css/skin-colors/skin-turquoise.css"> -->
  <!-- Color: YELLOW -->
  <!-- <link rel="stylesheet" type="text/css" href="css/skin-colors/skin-yellow.css"> -->
  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>
</head>

<body class="skin_00aeef">
  <header class="mt-full-screen" data-scroll-index="0">
    <div class="mt-fancy-overlay"></div>
    <div class="container">
      <div class="mt-top-bar row">
        <div class="col-md-5">
          <h1 class="logo">
            <a href="index.html">DAMSA<span> SHS</span></a>
          </h1>
        </div>
        <div class="col-md-5 pull-right">
          <div class="nav_search_holder">
            <div id="trend-search" class="trend-search">
              <form action="search.html">
                <input class="trend-search-input" placeholder="Enter your search term..." type="search" value="" name="search" id="search" hidden>
                <input class="trend-search-submit" type="submit" value="">

              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-height-centered">
        <h1 class="mt-title mt-uppercase">Delfin Albano <span>(Magsaysay)</span> Stand-Alone</h1>
        <h1 class="mt-title mt-uppercase">Senior High School</h1>
      </div>
    </div>
  </header>
  <nav class="navbar navbar-default" id="trend-main-head">
    <div class="container">
      <div class="row">
        <div class="navbar-header col-md-3">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <h1 class="logo">
            <a href="index.html">DAMSA<span>SHS</span></a>
          </h1>
        </div>

        <div id="navbar" class="navbar-collapse collapse col-md-9">
          <ul class="menu nav navbar-nav pull-right nav-effect">


            <li class="item"><a href="#tracks">Offered Tracks</a></li>
            <li class="item"><a href="#activities">Activities</a></li>
            <li class="item"><a href="#people">People</a></li>
            <li class="item"><a href="#contacts">Contacts</a></li>
            <li class="item"><a href="newstudent.php">Apply Now</a></li>
            <li class="item"><a href="login.php">Login</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <section class="services high-margin" data-scroll-index="1" id="tracks">
    <header class="section-header">
      <div class="container">
        <div class="row">
          <h1 class="section-title">Our offered<span> Tracks</span></h1>
          <div class="section-border"></div>
          <div class="section-subtitle">We have a lot of opportunities for you. Come check them out!</div>
        </div>
      </div>
    </header>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="block-container animateIn" data-animate="fadeInLeft">
            <div class="block-icon">
              <div class="block-triangle">
                <div data-angle="SE" class="flat-icon">
                  <i class="fa fa-gavel"></i>
                </div>
              </div>
            </div>
            <div class="block-title">
              <p>TVL</p>
            </div>
            <div class="block-content">
              <p>Technical Vocational Courses</p>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="block-container animateIn" data-animate="fadeInUp">
            <div class="block-icon">
              <div class="block-triangle">
                <div data-angle="SE" class="flat-icon">
                  <i class="fa fa-flask"></i>
                </div>
              </div>
            </div>
            <div class="block-title">
              <p>Academic</p>
            </div>
            <div class="block-content">
              <p>Academic Track</p>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="block-container animateIn" data-animate="fadeInUp">
            <div class="block-icon">
              <div class="block-triangle">
                <div data-angle="SE" class="flat-icon">
                  <i class="fa fa-futbol-o"></i>
                </div>
              </div>
            </div>
            <div class="block-title">
              <p>Sports</p>
            </div>
            <div class="block-content">
              <p>Sports Track</p>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="block-container animateIn" data-animate="fadeInRight">
            <div class="block-icon">
              <div class="block-triangle">
                <div data-angle="SE" class="flat-icon">
                  <i class="fa fa-paint-brush"></i>
                </div>
              </div>
            </div>
            <div class="block-title">
              <p>AAD</p>
            </div>
            <div class="block-content">
              <p>Arts and Design</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="spacer"></div>


  </section>



  <section class="portfolio high-margin" data-scroll-index="2" id="activities">
    <header class="section-header">
      <div class="container">
        <div class="row">
          <h1 class="section-title">Our <span>PORToFOLIO</span></h1>
          <div class="section-border"></div>
          <p class="section-subtitle">A glimpse of work we’ve done for forward thinking brands and clients</p>
        </div>
      </div>
    </header>

    <div class="filter-container animateIn" data-animate="zoomIn">
      <div class="container" id="filter-nav">
        <div class="row">
          <div class="portfolio-items">
            <div class="col-md-2 photography">
              <div class="portfolio-container">
                <div class="portfolio-item">
                  <div class="portfolio-square">
                    <div class="content">
                      <img src="indexfiles/images/portfolio/damsashs3.jpg" alt="">
                      <div class="portfolio-hover text-center">
                        <i class="fa fa-plus-square-o"></i>
                        <p>Awesome Design</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2 seo">
              <div class="portfolio-container">
                <div class="portfolio-item">
                  <div class="portfolio-square">
                    <div class="content">
                      <img src="indexfiles/images/portfolio/damsashs4.jpg" alt="">
                      <div class="portfolio-hover text-center">
                        <i class="fa fa-plus-square-o"></i>
                        <p>Awesome Design</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2 photography">
              <div class="portfolio-container">
                <div class="portfolio-item">
                  <div class="portfolio-square">
                    <div class="content">
                      <img src="indexfiles/images/portfolio/damsashs2.jpg" alt="">
                      <div class="portfolio-hover text-center">
                        <i class="fa fa-plus-square-o"></i>
                        <p>Awesome Design</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2 branding">
              <div class="portfolio-container">
                <div class="portfolio-item">
                  <div class="portfolio-square">
                    <div class="content">
                      <img src="indexfiles/images/portfolio/damsashs1.jpg" alt="">
                      <div class="portfolio-hover text-center">
                        <i class="fa fa-plus-square-o"></i>
                        <p>Awesome Design</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-2 webdesign">
              <div class="portfolio-container">
                <div class="portfolio-item">
                  <div class="portfolio-square">
                    <div class="content">
                      <img src="indexfiles/images/portfolio/damsashs5.jpg" alt="">
                      <div class="portfolio-hover text-center">
                        <i class="fa fa-plus-square-o"></i>
                        <p>Awesome Design</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2 seo">
              <div class="portfolio-container">
                <div class="portfolio-item">
                  <div class="portfolio-square">
                    <div class="content">
                      <img src="indexfiles/images/portfolio/damsashs6.jpg" alt="">
                      <div class="portfolio-hover text-center">
                        <i class="fa fa-plus-square-o"></i>
                        <p>Awesome Design</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2 branding">
              <div class="portfolio-container">
                <div class="portfolio-item">
                  <div class="portfolio-square">
                    <div class="content">
                      <img src="indexfiles/images/portfolio/damsashs7.jpg" alt="">
                      <div class="portfolio-hover text-center">
                        <i class="fa fa-plus-square-o"></i>
                        <p>Awesome Design</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2 social-media">
              <div class="portfolio-container">
                <div class="portfolio-item">
                  <div class="portfolio-square">
                    <div class="content">
                      <img src="indexfiles/images/portfolio/damsashs8.jpg" alt="">
                      <div class="portfolio-hover text-center">
                        <i class="fa fa-plus-square-o"></i>
                        <p>Awesome Design</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2 seo">
              <div class="portfolio-container">
                <div class="portfolio-item">
                  <div class="portfolio-square">
                    <div class="content">
                      <img src="indexfiles/images/portfolio/damsashs9.jpg" alt="">
                      <div class="portfolio-hover text-center">
                        <i class="fa fa-plus-square-o"></i>
                        <p>Awesome Design</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2 webdesign">
              <div class="portfolio-container">
                <div class="portfolio-item">
                  <div class="portfolio-square">
                    <div class="content">
                      <img src="indexfiles/images/portfolio/damsashs11.jpg" alt="">
                      <div class="portfolio-hover text-center">
                        <i class="fa fa-plus-square-o"></i>
                        <p>Awesome Design</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2 social-media">
              <div class="portfolio-container">
                <div class="portfolio-item">
                  <div class="portfolio-square">
                    <div class="content">
                      <img src="indexfiles/images/portfolio/damsashs10.jpg" alt="">
                      <div class="portfolio-hover text-center">
                        <i class="fa fa-plus-square-o"></i>
                        <p>Awesome Design</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="our-work bottom-margin bottom-background" id="orgchart">
    <div class="container">
      <div class="row">
        <div class="col-md-4 animateIn" data-animate="bounceInRight">
          <h2 class="left-border">Organizational <br><span>Chart</span></h2>

        </div>
        <div class="col-md-5 text-center animateIn" data-animate="bounceInRight">
          <img src="indexfiles/images/orgchart.png" class="" alt="">
        </div>
      </div>
    </div>
  </section>
  <section class="testimonials high-margin">
    <div class="container">
      <div class="row">
        <div class="testimonials-container owl-carousel owl-theme">
          <div class="item">
            <div class="text-center">
              <img src="indexfiles/images/damsashsbg2-modified.png" alt="">
              <div class="testimonial-author">Vision</div>

            </div>
            <div class="textcenter">
              <blockquote>
                We dream of Filipinos who passionately love their country <br> and whose values and competencies enable them to realize their <br> full potential and contribute meaningfully br to building the nation. <br> As a learner-centered public institution, the Department of <br> Education continuously improves itself to better serve its stakeholders.
              </blockquote>
            </div>
          </div>
          <div class="item">
            <div class="text-center">
              <img src="indexfiles/images/damsashsbg2-modified.png" alt="">
              <div class="testimonial-author">Mission</div>

            </div>
            <div class="textcenter">
              <blockquote>
                To protect and promote the right of every Filipino to quality, equitable, culture-based, and complete basic education where:
                <b>Students</b> learn in a child-friendly,gender-sensitive, safe, and motivating environment.
                <b>Teachers </b> facilitate learning and constantly nurture every learner
                <b> Administrators and staff</b>, as stewards of the institution, ensure an enabling and supportive environment for effective learning to happen.
                <b> Family, community, and other stakcholders</b> are actively engaged and share responsibility for developing life-long learners.


              </blockquote>
            </div>
          </div>


        </div>
      </div>
    </div>
  </section>
  <section class="high-margin" data-scroll-index="3" id="people">
    <header class="section-header">
      <div class="container">
        <div class="row">
          <h1 class="section-title">Meet the people that provide the <span>ideas</span></h1>
          <div class="section-border"></div>
        </div>
      </div>
    </header>
    <div class="container">
      <div class="row">
        <div class="col-md-3 animateIn" data-animate="bounceInLeft">
          <div class="member-container">
            <div class="member-header text-center">
              <h4>Manuel, Preciousa</h4>
              <p>Principal</p>
            </div>
            <div class="member-content text-center">
              <img src="indexfiles/images/Manuel, Preciousa.png" class="img-responsive" alt="">
            </div>
            <div class="member-footer text-center">
              <h4>Preciousa Manuel</h4>
              <p>Principal</p>
              <div class="social">
                <ul>
                  <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                  <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                  <li><a href="#"><i class="fa fa-youtube-square"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 animateIn" data-animate="fadeInUp">
          <div class="member-container">
            <div class="member-header text-center">
              <h4>Sheridan-J Tangonan</h4>
              <p>ADAS II</p>
            </div>
            <div class="member-content text-center">
              <img src="indexfiles/images/Tangonan, Sheridan-J.png" class="img-responsive" alt="">
            </div>
            <div class="member-footer text-center">
              <h4>Sheridan-J Tangonan</h4>
              <p>ADAS II</p>
              <div class="social">
                <ul>
                  <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                  <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                  <li><a href="#"><i class="fa fa-youtube-square"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 animateIn" data-animate="fadeInUp">
          <div class="member-container">
            <div class="member-header text-center">
              <h4>Jaime Domingo Lopez</h4>
              <p>IT</p>
            </div>
            <div class="member-content text-center">
              <img src="indexfiles/images/Lopez, Jaime Domingo A.png" class="img-responsive" alt="">
            </div>
            <div class="member-footer text-center">
              <h4>Jaime Domingo Lopez</h4>
              <p>IT</p>
              <div class="social">
                <ul>
                  <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                  <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                  <li><a href="#"><i class="fa fa-youtube-square"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 animateIn" data-animate="fadeInUp">
          <div class="member-container">
            <div class="member-header text-center">
              <h4>Sheridan-J Tangonan</h4>
              <p>Registrar</p>
            </div>
            <div class="member-content text-center">
              <img src="indexfiles/images/Tangonan, Sheridan-J.png" class="img-responsive" alt="">
            </div>
            <div class="member-footer text-center">
              <h4>Sheridan-J Tangonan</h4>
              <p>Registrar</p>
              <div class="social">
                <ul>
                  <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                  <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                  <li><a href="#"><i class="fa fa-youtube-square"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <footer>
    <section class="high-margin contact" data-scroll-index="6" id="contacts">
      <header class="section-header">
        <div class="container">
          <div class="row">
            <h1 class="section-title">CONTACT <span>US</span></h1>
            <div class="section-border"></div>
            <p class="section-subtitle">Do you have any idea in mind? Contact us, we will give you the answer you expect.</p>
          </div>
        </div>
      </header>
      <div class="container">
        <div class="row">
          <div class="col-md-3 animateIn" data-animate="zoomIn">
            <div class="block-container">
              <div class="block-icon">
                <div class="block-triangle">
                  <div data-angle="SE" class="flat-icon">
                    <i class="fa fa-map-marker"></i>
                  </div>
                </div>
              </div>
              <div class="block-title">
                <p>Address</p>
              </div>
              <div class="block-content">
                <p>San Antonio <br> Delfin Albano, Isabela</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 animateIn" data-animate="zoomIn">
            <div class="block-container">
              <div class="block-icon">
                <div class="block-triangle">
                  <div data-angle="SE" class="flat-icon">
                    <i class="fa fa-mobile"></i>
                  </div>
                </div>
              </div>
              <div class="block-title">
                <p>Phone number</p>
              </div>
              <div class="block-content">
                <p>+639 263 661 950</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 animateIn" data-animate="zoomIn">
            <div class="block-container">
              <div class="block-icon">
                <div class="block-triangle">
                  <div data-angle="SE" class="flat-icon">
                    <i class="fa fa-envelope-o"></i>
                  </div>
                </div>
              </div>
              <div class="block-title">
                <p>Email</p>
              </div>
              <div class="block-content">
                <p>delfinalbano.sashs@gmail.com</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 animateIn" data-animate="zoomIn">
            <div class="block-container">
              <div class="block-icon">
                <div class="block-triangle">
                  <div data-angle="SE" class="flat-icon">
                    <i class="fa fa-question-circle"></i>
                  </div>
                </div>
              </div>
              <div class="block-title">
                <p>Online support</p>
              </div>
              <div class="block-content">
                <p>Facebook<br>Delfin Albano Magsaysay Stand-Alone <br> Senior High School</p>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="mt-spacer"></div>

        </div>
      </div>
    </section>


  </footer>




  <!-- ### Begin: JS Scripts ##################################################################### -->
  <script src="indexfiles/js/jquery.min.js"></script>
  <script src="indexfiles/js/modernizr.custom.js"></script>
  <script src="indexfiles/js/classie.js"></script>
  <script src="indexfiles/js/jquery.form.js"></script>
  <script src="indexfiles/js/jquery.ketchup.all.min.js"></script>
  <script src="indexfiles/js/jquery.validate.min.js"></script>
  <script src="indexfiles/js/scrollIt.min.js"></script>
  <script src="indexfiles/js/jquery.sticky.js"></script>
  <script src="indexfiles/js/uisearch.js"></script>
  <script src="indexfiles/js/jquery.flatshadow.js"></script>
  <script src="indexfiles/js/jquery.parallax.js"></script>
  <script src="indexfiles/js/count/jquery.appear.js"></script>
  <script src="indexfiles/js/count/jquery.countTo.js"></script>
  <script src="indexfiles/js/owl.carousel.min.js"></script>
  <script src="indexfiles/js/modernizr.viewport.js"></script>
  <script src="indexfiles/js/bootstrap.min.js"></script>
  <script src="indexfiles/js/animate.js"></script>
  <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAl-EDTJ5_uU3zBIX7-wNTu-qSZr1DO5Dw'></script>
  <script src='indexfiles/js/google-maps-v3.js'></script>
  <script src='indexfiles/js/jquery.mb.YTPlayer.min.js'></script>
  <script src="indexfiles/js/custom.js"></script>
  <!-- ### End: JS Scripts ##################################################################### -->

  <a href="#0" class="back-to-top">Top</a>

</body>

</html>
<?php include("includes/alerts.php"); ?>