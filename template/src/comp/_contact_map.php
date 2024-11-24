<section class="map-section">
<div class="info-holder">
    <div class="contact-info">
      <h2>Informacije i kontakt</h2>
      <h3><?= $website_name ?></h3>
      <p><?= $website_meta_description ?></p>
      <div>
        <div>
          <p><a href="mailto:<?php echo $website_email ?>" aria-label="Email us at <?php echo $website_email ?>"><?php echo $website_email ?></a></p>
          <p><a href="tel:<?php echo $website_phone ?>" aria-label="Call us at <?php echo $website_phone ?>"><?php echo $website_phone ?></a></p>
          <ul><?php require (ROOT_PATH."src/comp/nav_social_icons_foreach.php"); ?></ul>
        </div>
        <div>
          <p><?= implode(",<br>", explode(', ', $website_address)); ?></p>
        </div>
      </div>
    </div>

    <div class="contact-form">
      <div ng-app="contactFormApp" ng-controller="ContactFormController">
        <form name="contactForm" ng-submit="submitForm(contactForm.$valid)" novalidate>

          <div>
            <label for="name">Ime:</label>
            <span class="error-message required-message" ng-show="contactForm.name.$error.required && (contactForm.name.$dirty || contactForm.$submitted)">Polje je obavezno.</span>
            <input type="text" id="name" name="name" ng-model="formData.name" autocomplete="on" placeholder="npr. Marko Markovic" required>
          </div>

          <div>
            <label for="phone">Telefon:</label>
            <input type="text" id="phone" name="phone" ng-model="formData.phone" autocomplete="on" placeholder="npr. 06123456789">
          </div>

          <div>
            <label for="email">Email:</label>
            <span class="error-message required-message" ng-show="contactForm.email.$error.required && (contactForm.email.$dirty || contactForm.$submitted)">Polje je obavezno.</span>
            <span class="error-message" ng-show="contactForm.email.$dirty && contactForm.email.$error.email">Uneti email nije ispravan.</span>
            <input type="email" id="email" name="email" ng-model="formData.email" autocomplete="on" placeholder="npr. markomarkovic@mail.com" required>
          </div>

          <div>
            <label for="message">Poruka:</label>
            <span class="error-message required-message" ng-show="contactForm.message.$error.required && (contactForm.message.$dirty || contactForm.$submitted)">Polje je obavezno.</span>
            <textarea id="message" name="message" ng-model="formData.message" autocomplete="on" placeholder="npr. Poruka..." required></textarea>
          </div>
          
          <button class="a-button a-btn-3" type="submit">Posalji</button>
        </form>
        <p class="message-after-submit" ng-show="sendingMessage" ng-hide="errorMessage || successMessage">{{ sendingMessage }}</p>
        <p class="message-after-submit" ng-show="errorMessage">{{ errorMessage }}</p>
        <p class="message-after-submit" ng-show="successMessage">{{ successMessage }}</p>
      </div>
    </div>

  </div>
  <?php if ($map_display) : ?>
  <div id="map" class="map-holder" role="region" aria-label="OpenStreet map"><button class="a-button reset-zoom-btn" tabindex="-1">reset zoom</button></div>
  <?php endif; ?>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.2/angular.min.js"></script>
<script>
angular.module('contactFormApp', [])
    .controller('ContactFormController', ['$scope', '$http', function($scope, $http) {
      $scope.formData = {};

      $('section.map-section .info-holder .contact-form form > div span.error-message').show();
      $('section.map-section .info-holder .contact-form p.message-after-submit').show();

      $scope.submitForm = function(isValid) {
        if (!isValid){
          $('form .ng-invalid:first').focus();
          return;
        }

        var formattedData = {
          Name: $scope.formData.name,
          Phone: $scope.formData.phone,
          Email: $scope.formData.email,
          Message: $scope.formData.message,
          Message2: "test"
        };

        console.log(formattedData);

        $scope.sendingMessage = 'Poruka se salje...';

        $http({
          method: "POST",
          headers: {
            'Content-Type': 'application/json'
          },
          url: "src/comp/send-email.php",
          data: formattedData
        }).then(function(response) {
          console.log('Email sent successfully!');
          $scope.formData = {};
          $scope.contactForm.$setPristine();
          $scope.contactForm.$setUntouched();
          $scope.successMessage = 'Vaša poruka je uspešno poslata. Uskoro ćemo Vas kontaktirati.';
        }).catch(function(error) {
          console.error('Greska pri slanju:', error);
          $scope.errorMessage = 'Greska pri slanju. Molimo vas pokušajte kasnije.';
        });

        setTimeout(() => $('p.message-after-submit').attr('tabindex', '-1').focus(), 300);
      };
    }]);
</script>

<?php if ($map_display) : ?>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="//unpkg.com/leaflet-gesture-handling"></script>
<script>
  $(document).ready(function() {
  var coordinates = <?php echo json_encode($map_coordinates); ?>.split(", ");
  var address = <?php echo json_encode($map_address); ?>;
  var additionalMapPins = <?php echo json_encode($additional_map_pins); ?>;
  var additionalMapPinsArray = JSON.parse('<?php echo json_encode($additional_map_pins_array); ?>');
  var google_map_url = 'https://www.google.com/maps/place/' + <?php echo json_encode($map_address); ?>.split(' ').join('+');
  var allMarkers = [];
  // console.log(google_map_url);

  var map = L.map('map', {
    center: [coordinates[0], coordinates[1]],
    zoom: 9,
    minZoom: 3,
    zoomControl: true,
    zoomSnap: 1,
    // dragging: false, // it doesnt have effect while gestureHandling: true
    gestureHandling: true
  });

  var marker = L.marker([coordinates[0], coordinates[1]], {title: address, alt: 'Check address ' + address + ' on Google maps - opens in a new tab'}).addTo(map);

  marker.on('click keypress', function() {
    window.open(google_map_url, '_blank');
  });
  
  allMarkers.push(marker);

  if (additionalMapPins) {

    for (const [coord, address] of Object.entries(additionalMapPinsArray)) {
      var additionalMarker = L.marker([coord.split(', ')[0], coord.split(', ')[1]], {title: address, alt: 'Check address ' + address + ' on Google maps - opens in a new tab'}).addTo(map);
  
      additionalMarker.on('click keypress', function() {
        window.open('https://www.google.com/maps/place/' + address.split(' ').join('+'), '_blank');
      });
  
      allMarkers.push(additionalMarker);
    }

    function fitBoundsToMarkers(osmap, markers) {
      osmap.invalidateSize();
      var group = new L.featureGroup(markers);
      osmap.fitBounds(group.getBounds(), {padding: [50, 50]});
    }
  
    fitBoundsToMarkers(map, allMarkers);

    $('.reset-zoom-btn').click(function(){
      fitBoundsToMarkers(map, allMarkers);
    });

    $(window).resize(function(){
      setTimeout(function() {
        fitBoundsToMarkers(map, allMarkers);
      }, 500);
    });
    
  } else {
    $('.reset-zoom-btn').click(function(){
      map.setView([coordinates[0], coordinates[1]], 9);
    });
  }

  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map);

  $('.leaflet-container').removeAttr('tabindex');
  $('.leaflet-control-zoom a').attr('tabindex', '-1');
  $('.leaflet-marker-icon').attr('role', 'link');
});
</script>
<?php endif; ?>