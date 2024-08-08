<?php include'header.php';?>

<?php
// Handle the selected county
$selected_county = isset($_GET['selection']) ? $_GET['selection'] : '911';

// Include the JSON reading logic
$json_path = 'https://github.com/apondok/apso/tree/bbe3a0781e7326f677966614a516dc0ce1426882/properties/' . $selected_county . '_data.json';
$json = file_get_contents($json_path);
$data = json_decode($json, true);

// Extract the list of properties
$properties = $data['data']['cat1']['searchResults']['listResults'];
?>

<div class="">

            <div id="slider" class="sl-slider-wrapper">

        <div class="sl-slider">
        
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-1"></div>
              <h2><a href="#"></a></h2>
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-2"></div>
              <h2><a href="#"></a></h2>
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-3"></div>
              <h2><a href="#"></a></h2>
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-4"></div>
              <h2><a href="#"></a></h2>
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-5"></div>
              <h2><a href="#"></a></h2>
            </div>
          </div>
        </div><!-- /sl-slider -->

        <nav id="nav-dots" class="nav-dots">
          <span class="nav-dot-current"></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </nav>

      </div><!-- /slider-wrapper -->
</div>

<div class="banner-search">
  <div class="container"> 
    <!-- banner -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- banner -->
<div class="container">
	<p></p>
		<form method="GET" action="index.php">
			<style>
				label[for="selection"] {
					font-size: 24px; /* Match the font size of <h2> */
					font-weight: bold; /* Match the font weight if needed */
					/* Add other styles like color, margin, etc., to match the <h2> */
				}
			</style>
			<label for="selection">Select County:</label>
			<select class="form-control" id="selection" name="selection" onchange="this.form.submit()">
				<option value="911" <?php if ($selected_county == '911') echo 'selected'; ?>>Camden County</option>
				<option value="2896" <?php if ($selected_county == '2896') echo 'selected'; ?>>Burlington County</option>
				<option value="2929" <?php if ($selected_county == '2929') echo 'selected'; ?>>Gloucester County</option>
				<option value="1201" <?php if ($selected_county == '1201') echo 'selected'; ?>>Mercer County</option>
				<!-- Add more options as needed -->
			</select>
		</form>
        <div class="properties-listing spacer"><a href="buysalerent.php" class="pull-right viewall">View All Listing</a>
            <h2>Featured Properties</h2>
            <div id="owl-example" class="owl-carousel">
						<?php foreach ($properties as $property): ?>
							<div class="properties">
								<div class="image-holder">
									<img src="<?php echo $property['imgSrc']; ?>" class="img-responsive" alt="properties"/>
									<div class="status <?php echo strtolower($property['statusText']); ?>"><?php echo $property['statusText']; ?></div>
								</div>
								<h4><a href="property-detail.php?selected_county=<?php echo $selected_county; ?>&id=<?php echo $property['id']; ?>"><?php echo $property['addressStreet']; ?></a></h4>
								<p class="price">Price: <?php echo $property['price']; ?></p>
								<div class="listing-detail">
									<span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"><?php echo $property['beds']; ?></span>
									<span data-toggle="tooltip" data-placement="bottom" data-original-title="Baths"><?php echo $property['baths']; ?></span>
								</div>
								<a href="property-detail.php?selected_county=<?php echo $selected_county; ?>&id=<?php echo $property['id']; ?>">View Detail</a>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
	<div class="spacer">
		<div class="row">
		  <div class="col-lg-6 col-sm-9 recent-view">
			<h3>About Us</h3>
			<p>TLS Real Estate is a premier real estate firm with over 5 years of experience in the industry. Specializing in both residential and commercial properties, our team of licensed professionals is dedicated to providing exceptional service and market expertise. We pride ourselves on our deep knowledge of local market trends and our commitment to client satisfaction.<br><a href="about.php">Learn More</a></p>
		  
		  </div>
		  
		</div>
	</div>
</div>
<?php include'footer.php';?>
