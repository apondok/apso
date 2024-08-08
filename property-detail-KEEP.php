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

<div class="hot-properties hidden-xs">
<h4>Hot Properties</h4>
<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/4.jpg" class="img-responsive img-circle" alt="properties"/></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div>
<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties"/></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div>

<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/3.jpg" class="img-responsive img-circle" alt="properties"/></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div>

<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/2.jpg" class="img-responsive img-circle" alt="properties"/></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div>

</div>



<div class="advertisement">
  <h4>Advertisements</h4>
  <img src="images/advertisements.jpg" class="img-responsive" alt="advertisement">

</div>

</div>

<div class="col-lg-9 col-sm-8 ">

<?php
// Include the JSON reading logic
$json = file_get_contents('C:/Users/Alex Pondok/Desktop/zillow_property_data.json');
$data = json_decode($json, true);

// Extract the property ID from the URL
$property_id = $_GET['id'];

// Find the property details
$property_details = null;
foreach ($data['data']['cat1']['searchResults']['listResults'] as $property) {
    if ($property['id'] == $property_id) {
        $property_details = $property;
        break;
    }
}

if ($property_details):
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Property Details</title>
    <!-- Include your CSS and JS here -->
</head>
<body>
    <div class="container">
        <h1>Property Details for <?php echo $property_details['addressStreet']; ?></h1>
        <img src="<?php echo $property_details['imgSrc']; ?>" alt="Property Image" class="img-responsive">
        <p>Price: <?php echo $property_details['price']; ?></p>
        <p>Beds: <?php echo $property_details['beds']; ?></p>
        <p>Baths: <?php echo $property_details['baths']; ?></p>
        <p>Area: <?php echo $property_details['area']; ?> sqft</p>
        <p>Status: <?php echo $property_details['statusText']; ?></p>
        <div class="listing-detail">
            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"><?php echo $property_details['beds']; ?></span>
            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room"><?php echo $property_details['area']; ?> sqft</span>
            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Baths"><?php echo $property_details['baths']; ?></span>
        </div>

        <!-- Google Maps Section -->
        <div>
            <h4><span class="glyphicon glyphicon-map-marker"></span> Location</h4>
            <div class="well">
                <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                        src="https://maps.google.com/maps?q=<?php echo $property_details['latLong']['latitude']; ?>,<?php echo $property_details['latLong']['longitude']; ?>&hl=en&z=14&output=embed"></iframe>
            </div>
        </div>

    </div>
</body>
</html>
<?php else: ?>
<p>Property not found.</p>
<?php endif; ?>


  </div>
  

  <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
<p class="price">$ 200,000,000</p>
  <p class="area"><span class="glyphicon glyphicon-map-marker"></span> 344 Villa, Syndey, Australia</p>
  
  <div class="profile">
  <span class="glyphicon glyphicon-user"></span> Agent Details
  <p>John Parker<br>009 229 2929</p>
  </div>
</div>

    <h6><span class="glyphicon glyphicon-home"></span> Availabilty</h6>
    <div class="listing-detail">
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>

</div>
<div class="col-lg-12 col-sm-6 ">
<div class="enquiry">
  <h6><span class="glyphicon glyphicon-envelope"></span> Post Enquiry</h6>
  <form role="form">
                <input type="text" class="form-control" placeholder="Full Name"/>
                <input type="text" class="form-control" placeholder="you@yourdomain.com"/>
                <input type="text" class="form-control" placeholder="your number"/>
                <textarea rows="6" class="form-control" placeholder="Whats on your mind?"></textarea>
      <button type="submit" class="btn btn-primary" name="Submit">Send Message</button>
      </form>
 </div>         
</div>
  </div>
</div>
</div>
</div>
</div>
</div>

<?php include'footer.php';?>