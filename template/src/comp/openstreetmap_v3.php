<?php

if (empty($address)){
    $address = getSpotAddress($spot);
}

if (empty ($longitude)){
    $longitude = $spot->longitude;
}

if (empty ($latitude)){
    $latitude = $spot->latitude;
}

if (empty ($city)){
    $city = $spot->city;
}

$map_place_string = "";

if ($map_place_include_spot_name && !empty($spot->name)) {
    $map_place_string .= $spot->name;
}

if ($map_place_include_address && !empty($spot->address)) {
    $map_place_string .= ",".$spot->address;
}

if ($map_place_include_city && !empty($spot->city)){
    $map_place_string .= ",".$spot->city;
}

if ($map_place_include_state && !empty($spot->state)){
    $map_place_string .= ",".$spot->state;
}

if ($map_place_include_zip && !empty($spot->zip)) {
    $map_place_string .= ",".$spot->zip;
}


if (!empty($open_street_map_style)) {
    $tile_layer_provider =  $open_street_map_style;
}else{
    $tile_layer_provider = "CartoDB.Positron";
}

?>

<style>
.map-newsletter .text-wrapper:before {
  background-image: url('<?php echo $googlemap_v3_newsletter_background; ?>');
  <?php if ($googlemap_v3_background_right_filter): ?>
    -webkit-filter: <?php echo $googlemap_v3_newsletter_background_image_style; ?>;
    -moz-filter: <?php echo $googlemap_v3_newsletter_background_image_style; ?>;
    -o-filter: <?php echo $googlemap_v3_newsletter_background_image_style; ?>;
    -ms-filter: <?php echo $googlemap_v3_newsletter_background_image_style; ?>;
    filter: <?php echo $googlemap_v3_newsletter_background_image_style; ?>;
  <?php endif; ?>
}

<?php if ($googlemap_v3_show_top_border || $googlemap_v3_show_bottom_border) { ?>
.googlemap-v3-wrapper .top-svg-border path,
.googlemap-v3-wrapper .top-svg-border polygon,
.googlemap-v3-wrapper .top-svg-border rect {
  fill: <?php echo $googlemap_v3_top_border_color; ?>;
}
.googlemap-v3-wrapper .bottom-svg-border path,
.googlemap-v3-wrapper .bottom-svg-border polygon,
.googlemap-v3-wrapper .bottom-svg-border rect {
  fill: <?php echo $googlemap_v3_bottom_border_color; ?>;
}
.googlemap-v3-wrapper .top-line-border:before {
  background: <?php echo $googlemap_v3_top_border_color; ?>;
}
.googlemap-v3-wrapper .bottom-line-border:before {
  background: <?php echo $googlemap_v3_bottom_border_color; ?>;
}
<?php } ?>
</style>


<?php if (!empty($longitude) && !empty($latitude)): ?>
    <div id="<?php echo $sections_menu_config['openstreetmap_v3']['id'] ?>" class="googlemap-v3-wrapper openstreetmap-v3-wrapper maps-wrapper section-wrapper">

      <?php if ($googlemap_v3_show_top_border) {
        if ($googlemap_v3_top_border_type == "svg") {
          require 'src/custom/top_svg_border.php';
        } else {
          require 'src/custom/top_line_border.php';
        } 
      }?>

        <div class="row map-holder">

          <?php if ($show_map_newsletter) { ?>
          <section>
            <div class="col-md-6 col-sm-12 col-xs-12 map-item map-newsletter">
              <div class="text-wrapper">
                <div class="text-content">

                  <?php if (!empty($newsletter_title)) { ?>
                    <h1 class="section-header"><?php echo $newsletter_title ?></h1>
                  <?php } ?>
                  
                  <script type="text/javascript" id="sph-widget-<?php echo SPOT_ID ?>" >
                  (function() {
                      function async_load(){
                          var s = document.createElement('script');
                          s.type = 'text/javascript';
                          s.async = true;
                          s.src = 'https://www.spothopperapp.com/spots/<?php echo SPOT_ID ?>/widgets/newsletter.js?template=newsletter_widget1';
                          var embedder = document.getElementById('sph-widget-<?php echo SPOT_ID ?>');
                          embedder.parentNode.insertBefore(s, embedder);

                          //Inject html
                          setTimeout(function(){
                            $( '<span class="bar"></span>' ).insertAfter( '.sph-email-input' );
                            $('.sph-submit-button').addClass('custom-temp-btn hvr-fade');
                          }, 2000);

                      }
                      if (window.attachEvent)
                          window.attachEvent('onload', async_load);
                      else
                          window.addEventListener('load', async_load, false);
                  })();
                  </script>

                </div>
              </div>
            </div>
          </section>
          <?php } ?>

          <section>
            <div class="<?php echo ($show_map_newsletter)? 'col-md-6' : 'col-md-12'; ?> col-sm-12 col-xs-12 map-item">
            <?php if ($additional_map_locations): ?>
              <button class="custom-temp-btn reset-zoom-btn" tabindex="-1" aria-hidden="true"><?php echo $map_reset_zoom_btn_name; ?></button>
            <?php endif; ?>
              <div id="map-v3-container" role="region" aria-label="OpenStreet map"></div>
            </div>
          </section>
        </div>

        <div class="map-footer text-center">
            <div class="triangle"></div>
        </div>

      <?php if ($googlemap_v3_show_bottom_border) {
        if ($googlemap_v3_bottom_border_type == "svg") {
          require 'src/custom/bottom_svg_border.php';
        } else {
          require 'src/custom/bottom_line_border.php';
        }
      }?>

    </div>
<?php endif; ?>


<?php

$external_javascripts[] = <<<EOT
  <script type="text/javascript" src="//www.spothopperapp.com/lib/iframe-resizer/iframeResizer.js"></script>
  <script src="//unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
  <script src="//static.spotapps.co/web-lib/leaflet/leaflet-providers.js"></script>
  <script src="//unpkg.com/leaflet-gesture-handling"></script>
EOT;

if ($additional_map_locations) {
  $locations_json_array = json_encode($additional_map_locations_items);
} else {
  $locations_json_array = "";
}

$javascripts[] = <<<JS
iFrameResize({
  enablePublicMethods: true,
  enableInPageLinks: true
});

var marker_icon = "{$open_street_map_marker_icon}";
var additionalPins = '{$additional_map_locations}';
if (additionalPins) {
  var locationsArray = JSON.parse('{$locations_json_array}');
}

var google_map_url = 'https://www.google.com/maps/place/' + "{$map_place_string}".split(' ').join('+');
function open_google_map() {
  window.open(google_map_url, '_blank')
}

function discontinuous(func){
  var timer;
  return function(event){
    if(timer) clearTimeout(timer);
    timer = setTimeout(func,200,event);
  };
}

function init_open_street_map() {
  if (additionalPins) {
    var map = L.map('map-v3-container', {
      minZoom: 3,
      zoomControl: false,
      zoomSnap: 1,
      gestureHandling: true
    });
    
    var allMarkers = [];
    
    var marker = L.marker([$latitude, $longitude], {title: '{$address}', alt: 'View {$address} on Google maps - opens in a new tab'}).addTo(map);
    allMarkers.push(marker);

    marker.on('click keypress', open_google_map);

    locationsArray.forEach(function(element, index) {
      var additionalMarker = L.marker([element.lat_coords, element.lng_coords], {title: element.pin_title, alt: 'View ' + element.pin_title + ' on Google maps - opens in a new tab'}).addTo(map);
  
      additionalMarker.on('click keypress', function() {
        window.open(element.pin_link, '_blank');
      });
  
      allMarkers.push(additionalMarker);
  
    });
    
    function fitBoundsToMarkers(osmap, markers) {
      osmap.invalidateSize();
      var group = new L.featureGroup(markers);
      osmap.fitBounds(group.getBounds(), {padding: [50, 50]});
    }
  
    fitBoundsToMarkers(map, allMarkers);
  
    document.querySelector('.reset-zoom-btn').addEventListener('click', function () {
      fitBoundsToMarkers(map, allMarkers);
    });

    window.addEventListener("resize", discontinuous(function(e) {
      fitBoundsToMarkers(map, allMarkers);
    }));
  } else {
    var map = L.map('map-v3-container', {
      center: [ $latitude, $longitude],
      zoom: 16,
      dragging: false,
      minZoom: 3,
      zoomControl: false,
    });

    var marker = L.marker([$latitude, $longitude], {title: '{$address}', alt: 'View {$address} on Google maps - opens in a new tab'}).addTo(map);

    marker.on('click keypress', open_google_map);

    map.scrollWheelZoom.disable();
  }

  if (marker_icon.length>0){
    var myIcon = L.icon({
      iconUrl: marker_icon,
      iconSize: {$open_street_map_marker_icon_size}
    });

    if(allMarkers) {
      allMarkers.forEach(marker => {
        marker.setIcon(myIcon);
        marker.update();
      });
    } else {
      marker.setIcon(myIcon);
      marker.update();
    }
  }

  L.tileLayer.provider('{$tile_layer_provider}').addTo(map);
  L.control.zoom({
    position:'bottomright'
  }).addTo(map);

  $('.openstreetmap-v3-wrapper #map-v3-container').removeAttr('tabindex');
  $('.leaflet-touch .leaflet-bar a').attr('tabindex', '-1');
  $('.leaflet-container .leaflet-marker-pane img').attr('role', 'link');
}

$(document).ready(function() {
  $('.nav a').on('click', function () {
    $('.navbar-collapse').collapse('hide');
  });
  init_open_street_map();
});
JS;
?>