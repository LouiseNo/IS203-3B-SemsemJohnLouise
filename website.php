<?php
session_start();
// Assuming the user's name is stored in a session variable named 'username'
$user_name = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; // Default to 'Guest' if not logged in
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camping Gear Website | CodingNepal</title>
    <link rel="stylesheet" href="website.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <h2 class="logo"><a href="#">LCGE</a></h2>
            <input type="checkbox" id="menu-toggler">
            <label for="menu-toggler" id="hamburger-btn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="24px" height="24px">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M3 18h18v-2H3v2zm0-5h18V11H3v2zm0-7v2h18V6H3z"/>
                </svg>
            </label>
            <ul class="all-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#contact">Contact Us</a></li>
                <li><a href="logout.php">logout</a></li>
            </ul>
        </nav>
    </header>

    <section class="homepage" id="home">
        <div class="content">
            <div class="text">
                <h1>Welcome, <?= htmlspecialchars($user_name); ?>!</h1>
                <p>
                    Discover top-quality camping gear for unforgettable outdoor adventures. <br> Gear up and make lasting memories.</p>
            </div>
            <a href="#services">Our Services</a>
        </div>
    </section>
    <!-- Rest of your HTML remains unchanged -->


    <section class="services" id="services">
      <h2>Our Services</h2>
      <p>Explore our wide range of camping gear services.</p>
      <ul class="cards">
        <li class="card">
          <img src="tent.jpg" alt="img">
          <h3>Tents</h3>
          <p>Experience comfort and protection with our high-quality camping tents.</p>
        </li>
        <li class="card">
          <img src="sleepingbag.jpg" alt="img">
          <h3>Sleeping Bags</h3>
          <p>Stay cozy and warm during your camping trips with our premium sleeping bags.</p>
        </li>
        <li class="card">
          <img src="campstove.jpg" alt="img">
          <h3>Camp Stoves</h3>
          <p>Cook delicious meals in the great outdoors with our reliable camp stoves.</p>
        </li>
        <li class="card">
          <img src="backpacks.jpg" alt="img">
          <h3>Backpacks</h3>
          <p>Carry your essentials comfortably with our durable and functional camping backpacks.</p>
        </li>
        <li class="card">
          <img src="campchairs.jpg" alt="img">
          <h3>Camp Chairs</h3>
          <p>Relax and unwind in style with our comfortable and portable camping chairs.</p>
        </li>
        <li class="card">
          <img src="camplights.jpg" alt="img">
          <h3>Camp Lights</h3>
          <p>Illuminate your campsite with our reliable and energy-efficient camping lights.</p>
        </li>
      </ul>
    </section>

    <section class="portfolio" id="portfolio">
      <h2>Our Portfolio</h2>
      <p>Take a look at some of our memorable camping adventures.</p>
      <ul class="cards">
        <li class="card">
          <img src="mountainhiking.jpg" alt="img">
          <h3>Mountain Hiking</h3>
          <p>Embark on an exhilarating hiking adventure in the breathtaking mountain ranges.</p>
        </li>
        <li class="card">
          <img src="lakeside.jpg" alt="img">
          <h3>Lakeside Camping</h3>
          <p>Enjoy a tranquil camping experience by the serene shores of picturesque lakes.</p>
        </li>
        <li class="card">
          <img src="beach.jpg" alt="img">
          <h3>Beach Camping</h3>
          <p>Escape to sandy beaches and camp under the starry sky by the crashing waves.</p>
        </li>
        <li class="card">
          <img src="forest.jpg" alt="img">
          <h3>Forest Exploration</h3>
          <p>Discover the wonders of lush forests and immerse yourself in nature's beauty.</p>
        </li>
        <li class="card">
          <img src="rv.jpg" alt="img">
          <h3>RV Camping</h3>
          <p>Experience the freedom of road trips and camping adventures with our RV rentals.</p>
        </li>
        <li class="card">
          <img src="desert.jpg" alt="img">
          <h3>Desert Camping</h3>
          <p>Embark on a unique desert camping experience and witness stunning landscapes.</p>
        </li>
      </ul>
    </section>

    <section class="about" id="about">
      <h2>About Us</h2>
      <p>Discover our story in providing camping services.</p>
      <div class="row company-info">
        <h3>Our Story</h3>
        <p>Experience the excellence of our camping gear and services, where we have been offering high-quality camping essentials and gear for outdoor enthusiasts for over a decade. Our commitment to quality and customer satisfaction ensures that every adventurer can rely on us for their camping needs.</p>
      </div>
      <div class="row mission-vision">
        <h3>Our Mission</h3>
        <p>At Camping Gear Experts, our mission is to equip outdoor enthusiasts with top-notch camping gear and essentials that enhance their outdoor experiences. We strive to provide reliable, durable, and innovative products that contribute to memorable adventures and lasting memories.</p>
        <h3>Our Vision</h3>
        <p>Our vision is to become the go-to destination for camping enthusiasts, known for our extensive selection of premium camping gear and exceptional customer service. We aspire to inspire and enable people to embrace the beauty of nature and create unforgettable camping experiences.</p>
      </div>
      <div class="row team">
        <h3>Our Team</h3>
        <ul>
          <li>John Louise Semsem - Founder and CEO</li>
          <li>Hotdog T Juicey - Gear Specialist</li>
          <li>Perfecto D Magkamali - Customer Representative</li>
          <li>Hassan D Mahagilap - Operations Manager</li>
        </ul>
      </div>
    </section>

    <section class="contact" id="contact">
      <h2>Contact Us</h2>
      <p>Reach out to us for any inquiries or feedback.</p>
      <div class="row">
        <div class="col information">
          <div class="contact-details">
            <p><i class="fas fa-map-marker-alt"></i> 123 Campsite Avenue, Wilderness, CA 98765</p>
            <p><i class="fas fa-envelope"></i> info@campinggearexperts.com</p>
            <p><i class="fas fa-phone"></i> (123) 456-7890</p>
            <p><i class="fas fa-clock"></i> Monday - Friday: 9:00 AM - 5:00 PM</p>
            <p><i class="fas fa-clock"></i> Saturday: 10:00 AM - 3:00 PM</p>
            <p><i class="fas fa-clock"></i> Sunday: Closed</p>
            <p><i class="fas fa-globe"></i> www.campinggear.com</p>
          </div>          
        </div>
        <div class="col form">
          <form>
            <input type="text" placeholder="Name*" required>
            <input type="email" placeholder="Email*" required>
            <textarea placeholder="Message*" required></textarea>
            <button id="submit" type="submit">Send Message</button>
          </form>
        </div>
      </div>
    </section>

    <footer>
      <div>
        <span>Copyright © 2023 All Rights Reserved</span>
        <span>Programmed by: John Louise Semsem</span>
        <span class="link">
            <a href="#">Home</a>
            <a href="#contact">Contact</a>
        </span>
      </div>
    </footer>

  </body>
</html>