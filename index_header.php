<html>
<head>
  <meta charset="UTF-8">
  <!-- for the virtual keyboard -->
  <script type="text/javascript" src="keyboard.js" charset="UTF-8"></script>
  <link rel="stylesheet" type="text/css" href="keyboard.css">

  <link rel="stylesheet" type="text/css" href="style/style.css"  />
  <link rel="shortcut icon" href="images/watermelon8.png"/>
  <title>WWG</title>
</title>
<body>
  <div id="maindiv">

    <div id="header">

      <div class="header_row">
        <div id="logo"><img src="images/logo.png" height="50"></div>
        <nav id="navigation">Home | FAQ | LINK 2 | LINK 3</nav>
        <div id="links"><a href="login.php">Login</a></div>
      </div>

      <div class="header_row">
        <div id="search">
          <form>
            <input type="text" name="search" class="keyboardInput">
            <br>
            <select name="src_lang">
              <option>Source Language</option>
              <option>English</option>
              <option>Russian</option>
              <option>Mandarin</option>
              <option>Farsi</option>
            </select>
            <select name="tgt_lang">
              <option>Target Language</option>
              <option>English</option>
              <option>Russian</option>
              <option>Mandarin</option>
              <option>Farsi</option>
            </select>
            From: <input type="date" name="startdate" placeholder="Start Date">
            To: <input type="date" name="enddate" placeholder="End Date">
            <br>
          </form>
        </div><!--search-->
      </div><!--header_row-->
    </div><!--header-->

    