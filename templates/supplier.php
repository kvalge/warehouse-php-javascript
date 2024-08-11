<h1>Suppliers</h1>
<hr>

<div class="links_main_container">
    <div class="links_container">
        <h3>Current Partners</h3>
        <ul>
            <?php foreach ($suppliers as $supplier): ?>
                <a href="../index.php?command=contact_details&id=<?php echo $supplier->id; ?>">
                    <li class="supplier_customer"><?php echo htmlspecialchars($supplier->name); ?></li>
                </a>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="links_container">
        <h3>New Supplier</h3>

        <?php
        $message = !empty($_GET['message']) ? $_GET['message'] : ($message ?? '');
        $messageType = !empty($_GET['messageType']) ? $_GET['messageType'] : ($messageType ?? '');
        $class = $messageType === 'success' ? 'save_container' : ($messageType === 'error' ? 'error_container' : '');

        if (!empty($message)): ?>
            <h2 class="<?php echo htmlspecialchars($class); ?>"><?php echo htmlspecialchars($message); ?></h2>
        <?php endif; ?>

        <form id="supplierForm" action="../index.php" method="POST">
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
                    <button type="submit" name="supplier" value="supplier">Submit</button>
                </div>
        </form>
    </div>

    <script>
        document.getElementById('supplierForm').addEventListener('submit', function (event) {
            let isValid = true;

            document.querySelectorAll('.error').forEach(e => e.textContent = '');

            const name = document.getElementById('name').value;
            if (name.trim() === '') {
                document.getElementById('nameError').textContent = 'Name is required.';
                isValid = false;
            }

            const contact = document.getElementById('contact').value;
            if (contact.trim() === '') {
                document.getElementById('contactError').textContent = 'Contact Person is required.';
                isValid = false;
            }

            const address = document.getElementById('address').value;
            if (address.trim() === '') {
                document.getElementById('addressError').textContent = 'Address is required.';
                isValid = false;
            }

            const phone = document.getElementById('phone').value;
            const phonePattern = /^[0-9]{8}$/;
            if (!phonePattern.test(phone)) {
                document.getElementById('phoneError').textContent = 'Phone must be a 8-digit number.';
                isValid = false;
            }

            const email = document.getElementById('email').value;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                document.getElementById('emailError').textContent = 'Email is invalid.';
                isValid = false;
            }

            if (!isValid) {
                alert("Check!!!")
                event.preventDefault();
            }
        });
    </script>
