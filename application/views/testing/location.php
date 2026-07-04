<div class="row row-sm" style="margin:15px -10px 15px -10px;">
  <div class="col-lg-12 col-md-12">
    <div class="card custom-card">
      <div class="card-body">
        <div>
          <h6 class="main-content-label mb-1"><?php echo $title; ?> Summary</h6>
          <p class="text-muted card-sub-title">Get your location on taking attendance</p>
        </div>
        <div class="text-wrap">
          <div class="example">
            <div class="btn-list">
              <button class="btn ripple btn-main-primary" onclick="getLocation()">Get Location</button>
            </div>
          </div>
          <!-- Prism Precode -->
          <figure class="highlight clip-widget" id="buttons1">
            <pre class="language-markup">
                <div id="location"><p><strong>Latitude:</strong> <span id="latitude">Not available</span></p><p><strong>Longitude:</strong> <span id="longitude">Not available</span></p></div>
                <p id="error"></p>
            </pre>
          </figure>
          <!-- End Prism Precode -->
        </div>
      </div>
    </div>
  </div>
</div>
<style>
 
    #location {
      margin-top: -15px;
      padding: 10px;
      border: 1px solid #ccc;
      width: 300px;
      background-color: #f9f9f9;
    }
	 #location p{ margin-bottom:0rem !important;}
	
    #error {
      color: red;
    }
  </style>
<script>
    // Function to get the user's location
    function getLocation() {
      // Check if the browser supports geolocation
      if ("geolocation" in navigator) {
        // Get current position
        navigator.geolocation.getCurrentPosition(
          function(position) {
            // Success: update the location on the webpage
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            document.getElementById("latitude").textContent = latitude;
            document.getElementById("longitude").textContent = longitude;
            document.getElementById("error").textContent = "";  // Clear any previous error messages
          },
          function(error) {
            // Error: handle the error based on the error code
            let errorMessage = "An unknown error occurred.";
            if (error.code === 1) {
              errorMessage = "Permission denied. Please allow location access.";
            } else if (error.code === 2) {
              errorMessage = "Position unavailable. Please check your network or GPS signal.";
            } else if (error.code === 3) {
              errorMessage = "Request timed out. Please try again.";
            }
            document.getElementById("error").textContent = errorMessage;
            document.getElementById("latitude").textContent = "Not available";
            document.getElementById("longitude").textContent = "Not available";
          }
        );
      } else {
        // Geolocation not supported by browser
        document.getElementById("error").textContent = "Geolocation is not supported by your browser.";
        document.getElementById("latitude").textContent = "Not available";
        document.getElementById("longitude").textContent = "Not available";
      }
    }
  </script>
