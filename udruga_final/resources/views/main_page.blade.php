@extends('layout')

@section('content')


           
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"> <img src="img/image2.png"/ class="slika1"> <img src="img/image.png"/ class="slika2"> UDRUGA </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span> 
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">O nama</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Vijesti</a>
            </li>
              <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#sluzbeni_dokumenti">Službeni Dokumenti</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Galerija</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Kontakt</a>
            </li>
            @if(isset(Auth::user()->email))
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{ url('/main/logout') }}">Odjavi se</a>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
           @if(session('successPost')) 
                  <div class="alert alert-success"  role="alert">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('successPost') }}  


                  </div>
                  @endif
                        @if(session('editPost')) 
                  <div class="alert alert-info" role="alert">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('editPost') }}  


                  </div>
                  @endif

                    @if(session('deleteDocument')) 
                  <div class="alert alert-danger" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('deleteDocument') }}  


                  </div>
                  @endif
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong style="    color: rgba(255, 255, 255, 1); text-shadow: 2px 2px black;">Udruga "Pomoć u kući starijim osobama" <br> Donji Lapac</strong>
            </h1>
            <hr style="border-color: white">
          </div>
          <div class="col-lg-8 mx-auto">
          
     
                 <a class="far fa-arrow-alt-circle-down fa-5x js-scroll-trigger"  href="#about" style="color: rgba(255, 255, 255, 0.9); "></i></a>
                 <a style="text-shadow: 2px 2px black;"><br><br>Saznaj više o nama</a>
          </div>
        </div>
      </div>
    </header>

    <section class="bg-primary" id="about">
        <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
               <h2 class="section-heading text-white" style="font-weight: bold;">O nama</h2>
            <hr class="light my-4">
          </div>
        </div>
      </div>
   
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mx-auto text-center">
            <p class="text-faded mb-4" id="o_nama_prvi_tekst"> Udruga "POMOĆ U KUĆI STARIJIM OSOBAMA" je osnovana 2010 godine kao nevladina,neprofitna i nestranačka udruga sa ciljem  poboljšanja kvalitete života  starih i nemoćnih osoba u sredini u kojoj žive, poboljšanje kvalitete života, te rješavanje statusa i prava i svih dokumenata koje nisu u  mogućnosti sami riješiti.
<br>„Pomoć u kući starijim osobama“ je nezavisna građanska udruga koja surađuje sa svim drugim udrugama ,organizacijama ,pojedincima ,uključujuću nevladine i vladine organizacije u Hrvatskoj i izvan Hrvatske koje prihvaćaju načela humanitarnog i mirovnog djelovanja udruga. Djelovanje udruge „Pomoć u kući starijim osobama“ je javno i otvoreno svim ljudima dobre volje bez obzira na nacionalno,vjersko ili neko drugo svjetonazorsko opredjeljenje.

 


  </p>
            
          </div>
           <div class="col-lg-6 mx-auto text-center"  id="youtube_snimak">
             <div class="embed-responsive embed-responsive-16by9">
               <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/yyrGmdxk-Fk"></iframe>
            </div>
          </div>
            <div class="row">
          <div  class="col-lg-12 mx-auto text-center">
       <p class="text-faded mb-4" id="o_nama_drugi_tekst"> Dijelatnostima kojim se bavi udruga su:<br> <br> 
Održavanje osobne higijene, te higijene stambenog prostora, pripremanje toplih obroka u kući bolesnika
ili organizirano pripremanje obroka, održavanje i pranje rublja, pomoć u težim poslovima u kući i oko
kuće korisnika, nabava namirnica i lijekova, popravci u kući i oko kuće, mjerenje tlaka, mjerenje šećera
u krvi, laboratorijske pretrage, preventivno djelovanje, razgovor o prehrani, fizikalna terapija, pratnja k
liječniku i u druge ustanove, raspodjela humanitarne pomoći korisnicima usluga zavisno od donacija,
privremeni ili dugotrajni smještaj starijih, bolesnih i invalidnih osoba u vlastiti dom ili drugu vrstu
smještaja, ostale vrste socijalnih usluga. </p>
          </div>
       </div> 
      </div>
    </section>

  <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading" style="color: #d21826; font-weight: bold;">Vijesti</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
    
      <div class="container">
      
                    
        
            <div id="tag_container">
      
    @include('presult')
       </div>   


 


    </div>     
    </section>

<section class="bg-primary" id="sluzbeni_dokumenti">
       <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading" style="color: white; font-weight: bold;">Službeni Dokumenti</h2>
            <hr class="light my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 mx-auto text-center">
                 <div id="table_container" class="table-responsive">
                   @include('table')

                  </div>

          </div>
              
      </div>
    
  </div>
         
</section>
    <section class="p-0" id="portfolio">
      <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/1.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/1.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                   Pomoc u kući starijim osobama 
                  </div>
                  <div class="project-name">
                    Donji Lapac
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/2.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/2.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                  Pomoc u kući starijim osobama 
                  </div>
                  <div class="project-name">
                    Donji Lapac
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/3.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/3.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                      Pomoc u kući starijim osobama 
                  </div>
                  <div class="project-name">
                     Donji Lapac
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/4.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/4.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                   Pomoc u kući starijim osobama 
                  </div>
                  <div class="project-name">
                    Donji Lapac
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/5.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/5.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Pomoc u kući starijim osobama 
                  </div>
                  <div class="project-name">
                    Donji Lapac
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Pomoc u kući starijim osobama 
                  </div>
                  <div class="project-name">
                     Donji Lapac
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-dark text-white">
      <div class="container text-center">
        <h2 class="mb-4">Ovdje možete videti kako izgleda naš radni dan !</h2>
      </div>
    </section>

    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading" style="color: #d21826; font-weight: bold;">Kontakt</h2>
            <hr class="my-4">
            
          </div>
        </div>
         <div class="container" style="padding-top: 5%">
        <div class="row">
          <div class="col-lg-6 mx-auto">
             <h4 class="section-heading" style="color: #d21826; text-align: center;">Pošaljite nam Email</h4>  
              <div id="validation-info"> </div>
              <div id="loading" style="display: none;">
                <img SRC="{{URL::to('/')}}/img/Spinner-1s-200px.gif" id="img_loader">  

             
              </div>
            <form class="form-horizontal" id="contact">
      <div class="form-group">
      <label for="ime">Ime: </label>
      <input type="text" class="form-control {{ $errors->has('ime') ? 'is-invalid' : '' }}" id="ime" placeholder="Unesite vaše ime" name="ime" required>
    </div>

    <div class="form-group">
      <label for="email">Email: </label>
      <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder="Unesite vašu email adresu" name="email" required>
    </div>

    <div class="form-group">
      <label for="poruka">Poruka: </label>
      <textarea type="text" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" id="poruka" placeholder="Napišite vašu poruku " name="poruka" required></textarea>
    </div>

      <div class="form-group">
   
         <input id="submit" class="btn btn-hot text-capitalize btn-xs  js-scroll-trigger"  name="submit" type="submit" value="Pošalji Email" />
      </div>
    </form>
  </div>
            


         
         
         


       
           <div class="col-lg-6 mx-auto" style="padding-left: 10%; ">
             <h4 class="section-heading" style="color: #d21826; text-align: center;">Informacije</h4><br>
                      <i class="fas fa-home mb-3 sr-contact-1""></i> 
             Stojana Matića 10.<br>
                Donji Lapac 53250, Hrvatska<br><br>
              <i class="fas fa-phone  mb-3 sr-contact-1"></i> <b>+385 98 179 0236</b><br>
              
              <i class="fas fa-envelope mb-3 sr-contact-2"></i> <a href="mailto:example@info.com">jazic74@net.hr</a><br><br>
              <i class="fas  fa-home  mb-3 sr-contact-2"></i> <b>Ponedeljak - Petak 8.00 - 16.00</b><br>
            
          </div>
 
       </div>

       </div>
    </section>


  <p text align="center" style="color: #d21826; font-weight:bold;">Developed by: Nenad Šijan</p>




@endsection