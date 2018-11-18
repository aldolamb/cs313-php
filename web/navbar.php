<?php
echo 
"<nav class='navbar navbar-expand-lg navbar-light bg-light'>
  <a class='navbar-brand' href='/index.php'>Aldo Lamberti</a>
  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <div class='collapse navbar-collapse' id='navbarNavDropdown'>
    <ul class='navbar-nav'>
      <li class='nav-item'>
        <a class='nav-link' href='/project1/index.php'>Project 1</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='/project2.php'>Project 2</a>
      </li>
      <li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
          Team Activities
        </a>
        <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
          <a class='dropdown-item' href='/teamActivities/teach02.php'>Teach 02</a>
          <a class='dropdown-item' href='/teamActivities/teach03.php'>Teach 03</a>
          <a class='dropdown-item' href='/teamActivities/teach04/teach04.php'>Teach 04</a>
          <a class='dropdown-item' href='/teamActivities/teach05/index.php'>Teach 05</a>
          <a class='dropdown-item' href='/teamActivities/teach06.php'>Teach 06</a>
        </div>
      </li>
      <li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
          Assignments
        </a>
        <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
          <a class='dropdown-item' href='/assignments/prove01.php'>Prove 01</a>
          <a class='dropdown-item' href='/index.php'>Prove 02</a>
          <a class='dropdown-item' href='/assignments/prove03/browse.php'>Prove 03</a>
          <a class='dropdown-item' href='/assignments/prove04.php'>Prove 04</a>
          <a class='dropdown-item' href='/assignments/prove05/index.php'>Prove 05</a>
          <a class='dropdown-item' href='/assignments/prove06/index.php'>Prove 06</a>
        </div>
      </li>
    </ul>
  </div>
</nav>";
?>