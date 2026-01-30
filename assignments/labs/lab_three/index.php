<?php
// index.php
// COMP1006 – Lab 3
// Basic contact form using Bootstrap and HTML5 client-side validation
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Form</title>

  <!-- Bootstrap CSS for basic styling -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  >
</head>
<body>

  <!-- Main page container -->
  <div class="container my-5" style="max-width: 600px;">

    <h1 class="h3 mb-3">Contact Form</h1>
    <p class="text-muted">All fields are required.</p>

    <!--
      HTML form
      Uses POST to send data securely to process.php
      Client-side validation handled by HTML attributes
    -->
    <form action="process.php" method="POST">

      <!-- First Name field -->
      <div class="mb-3">
        <label class="form-label" for="firstName">First Name</label>
        <input
          class="form-control"
          type="text"
          id="firstName"
          name="firstName"
          required
          maxlength="40"
        >
      </div>

      <!-- Last Name field -->
      <div class="mb-3">
        <label class="form-label" for="lastName">Last Name</label>
        <input
          class="form-control"
          type="text"
          id="lastName"
          name="lastName"
          required
          maxlength="40"
        >
      </div>

      <!-- Email field -->
      <div class="mb-3">
        <label class="form-label" for="email">Email</label>
        <input
          class="form-control"
          type="email"
          id="email"
          name="email"
          required
          maxlength="80"
        >
      </div>

      <!-- Message field -->
      <div class="mb-3">
        <label class="form-label" for="message">Message</label>
        <textarea
          class="form-control"
          id="message"
          name="message"
          required
          maxlength="1000"
          rows="5"
        ></textarea>
      </div>

      <!-- Submit button -->
      <button class="btn btn-primary" type="submit">
        Submit
      </button>

    </form>
  </div>

</body>
</html>