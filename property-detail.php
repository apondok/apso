<!-------------------------------- Property Carousel CSS ------------------------------------------------->
	<!-- Bootstrap CSS -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<!-- jQuery and Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-------------------------------- Property Carousel CSS ------------------------------------------------->

<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Buy</span>
    <h2>Buy</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 hidden-xs">


<div class="advertisement">
  <h4>Advertisements</h4>
  <img src="images/advertisements.jpg" class="img-responsive" alt="advertisement">

</div>

</div>

<div class="col-lg-9 col-sm-8 ">

<?php
// Get the property ID and county from the URL parameters
$selected_county = isset($_GET['selected_county']) ? $_GET['selected_county'] : '911';
$property_id = isset($_GET['id']) ? $_GET['id'] : null;

if ($property_id) {
    // Include the JSON reading logic
    $json_path = 'C:/Projects/MyProject/real_estate_bot/PHP/website/properties/' . $selected_county . '_data.json';
    $json = file_get_contents($json_path);
    $data = json_decode($json, true);

    // Extract the property details
    $properties = $data['data']['cat1']['searchResults']['listResults'];
    $property_details = null;

    foreach ($properties as $property) {
		if ($property['id'] == $property_id) {
			$property_details = $property;
			break;
		}
	}
}
?>

<?php if ($property_details): ?>

<h2>Property Details</h2>
<div class="row">
  <div class="col-lg-8">
  <div id="propertyCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <?php if (isset($property_details['carouselPhotos']) && !empty($property_details['carouselPhotos'])): ?>
          <?php foreach ($property_details['carouselPhotos'] as $index => $photo): ?>
            <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
              <img src="<?php echo $photo['url']; ?>" class="d-block w-100" alt="Property Image">
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="carousel-item active">
            <img src="<?php echo $property_details['imgSrc']; ?>" class="d-block w-100" alt="Property Image">
          </div>
        <?php endif; ?>
      </div>
      <a class="carousel-control-prev" href="#propertyCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#propertyCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
  </div>
  
  <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Property Details for <?php echo $property_details['addressStreet']; ?></h4>
  	<p>Beds: <?php echo $property_details['beds']; ?></p>
  	<p>Baths: <?php echo $property_details['baths']; ?></p>
  	<p>Area: <?php echo $property_details['area']; ?> sqft</p>
  	<p>Status: <?php echo $property_details['statusText']; ?></p>

  </div>
  <!-- Google Maps Section -->
    <div><h4><span class="glyphicon glyphicon-map-marker"></span> Location</h4>
  <div class="well"><iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo $property_details['latLong']['latitude']; ?>,<?php echo $property_details['latLong']['longitude']; ?>&hl=en&z=16&output=embed"></iframe></div>
    </div>

  </div>
  <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
<p class="price"><?php echo $property_details['price']; ?></p>
  <p class="area"><span class="glyphicon glyphicon-map-marker"></span> <?php echo $property_details['addressStreet']; ?></p>
  
  <div class="profile">
  <span class="glyphicon glyphicon-user"></span> Agent Details
  <p>Traci Lassiter Spell<br>(856) 266 0729</p>
  </div>
</div>

    <h6><span class="glyphicon glyphicon-home"></span> Availabilty</h6>
    <div class="listing-detail">
    	    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"><?php echo $property_details['beds']; ?></span>
            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Baths"><?php echo $property_details['baths']; ?></span>

</div>
<div class="col-lg-12 col-sm-6 ">
  
</div>
  </div>
</div>
</div>
</div>
</div>
</div>

<?php include 'footer.php'; ?>
<?php else: ?>
<p>Property not found.</p>
<?php endif; ?>