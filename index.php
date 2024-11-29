<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="./src/img/logo.png"
      type="image/x-icon"
    />
<link rel="stylesheet" href="./css/global.css">
<link rel="stylesheet" href="./css/home.css">
    <title>Home - BloodPool</title>
  </head>
  <body>
    <!-- ================== HEADER ================== -->
    <header>
    </header>

    <!-- ------------------ Sidebar -------------------- -->
    <div id="sidebar"></div>


<!-- ----------------------- Registration form ----------------------- -->
<!-- <div id="homeTitle" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium neque laudantium commodi nobis enim perspiciatis architecto temporibus labore asperiores impedit?</div> -->
      <main>
        <div id="donateDiv">
            <h2>Register for donation <img src="./src/img/registerIcon.png" alt="" width="40px"> </h2>
            <p>
              Your small step of kindness can save someone's life. Register for
              blood donation. <a href="./donation_memo.php" target="_blank">&#9432; Read info</a>
            </p>
            <button onclick="window.location.href='./signup.php';">Click to register</button>
          </div>
        <!-- ----------------------- Search form ------------------------ -->
          <form action="./search_auth.php" id="searchDiv" method="POST">
            <h2>Search for donor <img src="./src/img/searchIcon.png" alt="" width="40px"> </h2>
            <div>
              <label for="b_type">Select Blood type</label>
              <select name="b_type" id="b_type">
                <option value="O+">O+</option>
                <option value="O-" selected>O-</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
              </select>
            </div>
        
            <div>
              <label for="d_state">Country</label>
              <input type="text" id="d_country" name="country" required placeholder="ex. India, USA, Japan, Russia, etc"/>
            </div>
        
            <div>
              <label for="d_state">State</label>
              <input type="text" id="d_state" name="state" required placeholder="ex. Maharashtra, Karnataka, Kashmir" />
            </div>
        
            <div>
              <label for="d_city">City</label>
              <input type="text" id="d_city"  name="city" required placeholder="ex. pune, hyderabad, lucknow" />
            </div>
        
        
            <button type="submit">Search</button>
          </form>
          <img id="homePeople" src="./src/img/homePeople.png" alt="">
          
        </main>
        <p id="homeSlogan">To the people, for the people, by the people</p>

    <!-- ================== FOOTER ================== -->
    <footer></footer>
    <script src="./global.js"></script>
  </body>
</html>

