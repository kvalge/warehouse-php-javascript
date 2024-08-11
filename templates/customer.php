<h1>Customer</h1>
<hr>

<div class="links_main_container">
    <div class="links_container">
        <h3>Current Customers</h3>
        <ul>
            <?php foreach ($customers as $customer): ?>
                <a href="../index.php?command=contact_details&id=<?php echo $customer->id; ?>">
                    <li class="supplier_customer"><?php echo htmlspecialchars($customer->name); ?></li>
                </a>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="links_container">
        <h3>New Customer</h3>

        <?php
        $message = !empty($_GET['message']) ? $_GET['message'] : ($message ?? '');
        $messageType = !empty($_GET['messageType']) ? $_GET['messageType'] : ($messageType ?? '');
        $class = $messageType === 'success' ? 'save_container' : ($messageType === 'error' ? 'error_container' : '');

        if (!empty($message)): ?>
            <h2 class="<?php echo htmlspecialchars($class); ?>"><?php echo htmlspecialchars($message); ?></h2>
        <?php endif; ?>

        <form action="../index.php" method="POST">
            <div class="form_group">
                <div class="form_row">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name">
                    <div class="form_row">
                        <label for="contact">Contact Person:</label>
                        <input type="text" id="contact" name="contact">
                    </div>
                    <div class="form_row">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address">
                    </div>
                    <div class="form_row">
                        <label for="phone">Phone:</label>
                        <input type="text" id="phone" name="phone">
                    </div>
                    <div class="form_row">
                        <label for="email">Email:</label>
                        <input type="text" id="email" name="email">
                    </div>
                    <button type="submit" name="customer" value="customer">Submit</button>
                </div>
        </form>
    </div>
