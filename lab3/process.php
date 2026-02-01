<?php require 'includes/header.php'; ?>

<?php
// process.php
// - Sanitizes and validates posted form data
// - Builds an order summary
// - Attempts to send an email using PHP's mail() function

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo '<main><p>No form submitted. <a href="index.php">Return to the order form</a>.</p></main>';
    require 'includes/footer.php';
    exit;
}

$firstName = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
$lastName  = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
$email     = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$phone     = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
$address   = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
$items     = $_POST['items'] ?? [];

$errors = [];

// Required fields
if ($firstName === null || $firstName === '') $errors[] = 'First name is required.';
if ($lastName === null || $lastName === '') $errors[] = 'Last name is required.';
if ($email === null || $email === '') {
    $errors[] = 'Email is required.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Email must be a valid email address.';
}
// Simple phone format check (change or remove pattern if you accept other formats)
if ($phone === null || $phone === '' || !preg_match('/^\d{3}-\d{3}-\d{4}$/', $phone)) {
    $errors[] = 'Phone is required and must be in the format 555-123-4567.';
}

// Validate items - only keep integers > 0
$itemsOrdered = [];
foreach ($items as $key => $qty) {
    if (filter_var($qty, FILTER_VALIDATE_INT) !== false && (int)$qty > 0) {
        $itemsOrdered[$key] = (int)$qty;
    }
}

if (count($itemsOrdered) === 0) {
    $errors[] = 'Please order at least one item.';
}

// If there are errors, show them and provide a link back to the form
?>
<main>
<?php if (!empty($errors)) : ?>
    <h2>There were problems with your submission</h2>
    <ul class="error">
        <?php foreach ($errors as $err) : ?>
            <li><?php echo htmlspecialchars($err, ENT_QUOTES); ?></li>
        <?php endforeach; ?>
    </ul>
    <p><a href="index.php">Go back to the form and fix the errors</a></p>
<?php else: ?>
    <?php
    // Build order summary text
    $summary = "Order from: {$firstName} {$lastName}\n";
    $summary .= "Email: {$email}\nPhone: {$phone}\n";
    if ($address) $summary .= "Address: {$address}\n";
    $summary .= "\nItems:\n";
    foreach ($itemsOrdered as $item => $qty) {
        $summary .= "- {$item}: {$qty}\n";
    }

    // Email settings - change $to to your store address
    $to = 'you@example.com'; // <-- CHANGE THIS
    $subject = 'New order from ' . $firstName . ' ' . $lastName;
    $message = $summary;
    $headers = 'From: ' . $email . "\r\n" .
               'Reply-To: ' . $email . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    $sent = false;
    if (mail($to, $subject, $message, $headers)) {
        $sent = true;
    }
    ?>

    <?php if ($sent) : ?>
        <h2>Thank you — your order was sent successfully.</h2>
    <?php else : ?>
        <h2>Order recorded, but failed to send email</h2>
        <p class="error">The server could not send the confirmation email. If you're testing locally, configure an SMTP server or use PHPMailer with SMTP.</p>
    <?php endif; ?>

    <h3>Order Summary</h3>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($firstName . ' ' . $lastName, ENT_QUOTES); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($email, ENT_QUOTES); ?></p>
    <p><strong>Phone:</strong> <?php echo htmlspecialchars($phone, ENT_QUOTES); ?></p>
    <?php if ($address): ?><p><strong>Address:</strong> <?php echo htmlspecialchars($address, ENT_QUOTES); ?></p><?php endif; ?>

    <ul>
        <?php foreach ($itemsOrdered as $item => $qty): ?>
            <li><?php echo htmlspecialchars($item, ENT_QUOTES); ?> — <?php echo $qty; ?></li>
        <?php endforeach; ?>
    </ul>

    <p><a href="index.php">Return to the store</a></p>
<?php endif; ?>
</main>

<?php require 'includes/footer.php'; ?>
