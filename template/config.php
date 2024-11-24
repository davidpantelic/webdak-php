<?php
# Configuration file

# domain and base url for links
define('DOMAIN', '/webdak/template/');
# root path for requiring files
define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . DOMAIN);

##########################

# websites info
$website_name = "Webdak Accessible";
$website_meta_description = "Dizajn i izrada pristupacnih i modernih web sajtova. Pružamo jednostavno iskustvo za sve posetioce. Povecajte svoju publiku, poboljsajte svoj sajt i doprinesite internet zajednici.";
$website_og_title = $website_name;
$website_og_image = "img/desk.webp";
$website_og_url = "https://www.webdak/template.com";

# contact info and social networks
$website_email = "info@webdak.net";
$website_phone = "+381677204115";
$website_address = "Karadjordjeva 126, 14253 Osecina, Srbija";
$website_facebook_url = "https://www.facebook.com/";
$website_instagram_url = "https://www.instagram.com/";
$website_google_url = "https://www.google.com/";
$website_linkedin_url = "https://www.linkedin.com/";

$logo_url = "img/webdak_logo_small.png";

# nav type [v1, v2, v3]
$nav_type = "v1";

##########################

# nav tabs and social icons
$nav_tabs  = array (
array ("title" => "HOME", "text" => "Pocetna", "href" => "home", "target" => "_self", "li-class" => ""),
array ("title" => "ABOUT", "text" => "O nama", "href" => "about", "target" => "_self", "li-class" => ""),
array ("title" => "EXAMPLES", "text" => "Primeri", "href" => "examples", "target" => "_self", "li-class" => ""),
array ("title" => "CONTACT", "text" => "Kontakt", "href" => "contact", "target" => "_self", "li-class" => ""),
array ("title" => "DROPDOWN FIRST", "text" => "Proizvodi", "href" => "#", "target" => "_self", "li-class" => ""),
#array ("title" => "DROPDOWN SECOND", "text" => "Dropdown second tab", "href" => "#", "target" => "_self", "li-class" => ""),
array ("title" => "EXTERNAL", "text" => "External", "href" => "https://www.google.com", "target" => "_blank", "li-class" => ""),
);

$nav_subtabs  = array (
array ("title" => "DROPDOWN FIRST", "text" => "Dropdown 1", "href" => "about", "target" => "_self", "li-class" => ""),
array ("title" => "DROPDOWN FIRST", "text" => "Dropdown 2", "href" => "examples", "target" => "_self", "li-class" => ""),
array ("title" => "DROPDOWN SECOND", "text" => "Dropdown 3", "href" => "examples", "target" => "_self", "li-class" => ""),
array ("title" => "DROPDOWN SECOND", "text" => "Dropdown 4", "href" => "examples", "target" => "_self", "li-class" => ""),
);

$social_icons  = array (
array ("title" => "facebook", "fa-class" => "bi bi-facebook", "href" => "{$website_facebook_url}", "li-class" => ""),
array ("title" => "instagram", "fa-class" => "bi bi-instagram", "href" => "{$website_instagram_url}", "li-class" => ""),
array ("title" => "google", "fa-class" => "bi bi-google", "href" => "{$website_google_url}", "li-class" => ""),
array ("title" => "linkedin", "fa-class" => "bi bi-linkedin", "href" => "{$website_linkedin_url}", "li-class" => ""),
array ("title" => "phone", "fa-class" => "bi bi-telephone", "href" => "tel:{$website_phone}", "li-class" => ""),
array ("title" => "envelope", "fa-class" => "bi bi-envelope-at", "href" => "mailto:{$website_email}", "li-class" => ""),
);

##########################

# sections, turn on or off by commenting
$sections  = array (
  "_cover_img_txt",
  "_welcome",
  "_about",
  "_section_v1",
  "_section_v3",
  "_section_v4",
  #"_section_v2",
  "_partners",
  "_contact_map",
);

##########################

##########################

# sections and elements for animating only once or always
$animate_once  = array (
  "section.cover-img-txt > div:first-of-type" => "animation-slide-down",
  "section.about-section .content-holder" => "animation-slide-down",
  "section.section-v1 .content-holder .img-wrapper" => "animation-slide-right",
  "section.section-v1 .content-holder .text-wrapper" => "animation-slide-left",
  "section.section-v3 .content-holder" => "animation-slide-up",
  "section.map-section .map-holder button.reset-zoom-btn" => "animation-slide-left",
);

// $animate_once  = array (
//   "section.cover-img-txt > div",
//   "section.about-section .content-holder",
//   "section.section-v1 .content-holder > div",
//   "section.section-v3 .text-wrapper",
// );

$animate_always  = array (
  "section.cover-img-txt > div",
  "section.about-section .content-holder",
  "section.section-v1 .content-holder > div",
  "section.section-v3 .text-wrapper",
);

##########################

#
# Cover section with back image and text
#
$cover_section_img_txt = <<<HTML
<div>
  <h1>Pristupacni i moderni<span> web sajtovi i aplikacije</span></h1>
</div>
<div class="scroll-indicator" aria-hidden="true"><span><i hidden>arrow</i></span><span><i hidden>arrow</i></span><span><i hidden>arrow</i></span></div>
HTML;

#
# Welcome section
#
$welcome_section = <<<HTML
<h2 class="welcome-text">Dobrodosli na {$website_name}</h2>
HTML;

#
# about section
#
$about_section_content = <<<HTML
<h2>Pristupačan veb sajt za sve!</h2>
<p>Dizajniran po najnovijim standardima <a href="https://www.w3.org/TR/WCAG22/" target="_blank">WCAG 2.2</a>, pružamo jednostavno iskustvo za sve posetioce. Kroz jednostavan dizajn, jasne boje i lako snalaženje, želimo da svako uživa u kvalitetnom online doživljaju. U srcu našeg rada nalazi se predanost stvaranju online iskustava koja su dostupna svim posetiocima, bez obzira na njihove individualne sposobnosti ili invaliditet.</p>
<p>Povecajte svoju publiku i doprinesite internet zajednici, kontaktirajte nas i narucite svoj pristupacan i moderan web-sajt.</p>
<a class="a-button a-btn-2" href="contact">Kontakt</a>
<a class="a-button a-btn-2" href="about">Vise o nama</a>
HTML;

#
# section v1
#
$section_v1_img = "img/nature.jpg";
$section_v1_text = <<<HTML
<h2>Dizajn i izrada</h2>
<p>Kreiramo vizualno privlačne veb sajtove sa fokusom na funkcionalnost i jednostavno korisničko iskustvo. Od dinamičkih portfolia do obimnih prezentacionih websajtova, svaki projekat oblikujemo sa pažnjom prema najnovijim standardima pristupačnosti (<a href="https://www.w3.org/TR/WCAG22/" target="_blank">WCAG 2.2</a>). Naša strast je stvaranje veb sajtova koji su ne samo lepi, već i pristupačni svima. Prepustite nam da vašu ideju pretvorimo u digitalnu stvarnost koja ostavlja utisak.</p>
<a class="a-button a-btn-2" href="examples">Usluge</a>
HTML;

#
# section v2
#
$section_v2_img = "img/desk.webp";
$section_v2_text = <<<HTML
<h2>Zasto je bitno?</h2>
<p>Imati pristupačan veb sajt donosi niz koristi kako za posetioce tako i za vlasnike sajta. Evo nekoliko ključnih razloga zašto je pristupačnost od suštinskog značaja:</p>
<ul dir="rtl">
  <li><p><i class="bi bi-check2-circle"></i> <strong>Povećava dostupnost publike</strong></p></li>
  <li><p><i class="bi bi-check2-circle"></i> <strong>Smanjuje pravne rizike</strong></p></li>
  <li><p><i class="bi bi-check2-circle"></i> <strong>SEO prednosti</strong></p></li>
</ul>
<a class="a-button a-btn-2" href="about">Procitaj vise<span class="visually-hidden"> o tome zasto je bitno</span></a>
HTML;

#
# section v3
#
$section_v3_text = <<<HTML
<h2>Osigurajte se na vreme</h2>
<p>U digitalnom dobu, pristupačnost veb sajtova postaje ključni element kako bismo osigurali da naša poruka dopre do svih. Investiranje u pristupačan veb sajt ne samo da proširuje doseg vaše publike, već i pruža pravnu sigurnost koja postaje sve važnija u savremenom poslovanju.</p>
<p>Širenjem pristupačnosti, vaš veb sajt postaje dostupan širokom spektru korisnika, uključujući osobe sa invaliditetom, starije osobe i one koji koriste različite tehnološke uređaje. To ne samo što doprinosi inkluzivnosti, već i otvara vrata novim poslovnim prilikama.</p>
<p>Osim širenja publike, pristupačnost postaje ključna za pravnu sigurnost u svetu sve sofisticiranijih regulativa. U Srbiji, kao i globalno, zakoni koji se odnose na pristupačnost veb sajtova postaju sve izraženiji. Obezbedite se na vreme pridržavanjem najnovijih standarda (<a href="https://www.w3.org/TR/WCAG22/" target="_blank">WCAG 2.2</a>) i izgradite temelj za uspešnu digitalnu prisutnost koja se razvija u skladu sa pravnim normama.</p>
<p>Ulaganje u pristupačnost veb sajta nije samo poslovna strategija, već i odgovoran korak ka stvaranju otvorenog i pravno sigurnog digitalnog prostora za sve. Pustite nas da zajedno obezbedimo vašu digitalnu budućnost.</p>
<a class="a-button a-btn-2" href="contact">Kontakt</span></a>
HTML;

#
# section v4
#
$section_v4_title = "Zasto je bitno?";
$section_v4_text = "Imati pristupačan veb sajt donosi niz koristi kako za posetioce tako i za vlasnike sajta. Evo nekoliko ključnih razloga zašto je pristupačnost od suštinskog značaja:";
$section_v4_wrapper_1 = <<<HTML
<h3>Veća publika</h3>
<p>Pristupačnost širi doseg vaše veb stranice, čineći je dostupnom osobama sa invaliditetom, starijim korisnicima, i onima koji koriste različite tehnološke uređaje. Ovo ne samo što čini vašu stranicu etičkom, već i povećava vašu publiku.</p>
HTML;
$section_v4_wrapper_2 = <<<HTML
<h3>Pravna Sigurnost</h3>
<p>Pravne regulative koje se odnose na pristupačnost veb sajtova postaju sve prisutnije. Pridržavanjem ovih standarda sprečavate potencijalne pravne probleme i poboljšavate reputaciju vašeg brenda.</p>
HTML;
$section_v4_wrapper_3 = <<<HTML
<h3>SEO poboljsanje</h3>
<p>Pravilno implementirana pristupačnost može poboljšati rangiranje vašeg sajta na pretraživačima. Kroz kvalitetan HTML i pravilno označene elemente, poboljšavate i SEO performanse.</p>
HTML;

#
# partners (carousel)
#
$partners_array = array(
  "img/logos/logo_1.jpg" => "Name of the partner 1",
  "img/logos/logo_2.jpg" => "Name of the partner 2",
  "img/logos/logo_3.jpg" => "Name of the partner 3",
  "img/logos/logo_4.jpg" => "Name of the partner 4",
  "img/logos/logo_5.jpg" => "Name of the partner 5",
  "img/logos/logo_6.jpg" => "Name of the partner 6",
  "img/logos/logo_7.jpg" => "Name of the partner 7",
  "img/logos/logo_8.jpg" => "Name of the partner 8",
  "img/logos/logo_9.jpg" => "Name of the partner 9",
);
$partners_carousel_controls = false;

#
# Contact form
#
$form_subject = "";
$form_sender = "";
$form_recipient = "";

#
# map
#
$map_display = true;
$map_coordinates = "44.37384440035018, 19.597718330771002";
$map_address = $website_address;

$additional_map_pins = true;
$additional_map_pins_array = array(
  "44.26821519398744, 19.552361734637852" => "Skadar",
  "44.272640265784176, 19.87645839862692" => "Valjevo",
  "44.54879075411644, 19.52764249755394" => "Tekeris",
);

#
#
#

?>