<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <img src="wp-content/uploads/2019/06/cropped-Screen-Shot-2019-06-06-at-3.44.50-PM.png" 
           alt="Dig4E" 
           height="40" 
           class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="imagingDropdown" role="button" 
             data-bs-toggle="dropdown" aria-expanded="false">
            Imaging
          </a>
          <ul class="dropdown-menu" aria-labelledby="imagingDropdown">
            <li><a class="dropdown-item" href="https://image.dig4e.com/lessons/">Imaging: Lessons</a></li>
            <li><a class="dropdown-item" href="https://image.dig4e.com/assignments/">Imaging: Quizzes</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="audioDropdown" role="button" 
             data-bs-toggle="dropdown" aria-expanded="false">
            Audio
          </a>
          <ul class="dropdown-menu" aria-labelledby="audioDropdown">
            <li><a class="dropdown-item" href="https://audio.dig4e.com/lessons/">Audio: Lessons</a></li>
            <li><a class="dropdown-item" href="https://audio.dig4e.com/assignments/">Audio: Quizzes</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="videoDropdown" role="button" 
             data-bs-toggle="dropdown" aria-expanded="false">
            Video
          </a>
          <ul class="dropdown-menu" aria-labelledby="videoDropdown">
            <li><a class="dropdown-item" href="https://video.dig4e.com/lessons/">Video: Lessons</a></li>
            <li><a class="dropdown-item" href="https://video.dig4e.com/assignments/">Video: Quizzes</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($current_page == 'lessons.php') ? 'active' : ''; ?>" href="lessons.php">Lessons</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($current_page == 'about.php') ? 'active' : ''; ?>" href="about.php">About</a>
        </li>
      </ul>
    </div>
  </div>
</nav> 