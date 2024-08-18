<h1>Suppliers</h1>
<hr>

<div class="links_main_container">
    <div class="links_container">
        <h3>Current Partners</h3>
        <ul>
            <?php foreach ($partners as $supplier): ?>
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
                    <button type="submit" id="input_button" name="partner" value="supplier">Submit</button>
                </div>
        </form>
    </div>
</div>

<script>
    const addPartner = document.getElementById('supplierForm');
    const partnerInput = addPartner.querySelectorAll('input');
    const input_button = document.getElementById('input_button');

    const partners = [];

    function checkValues() {
        const partnerName = partnerInput[0].value;
        const partnerContact = partnerInput[1].value;
        const partnerAddress = partnerInput[2].value;
        const partnerPhone = partnerInput[3].value;
        const partnerEmail = partnerInput[4].value;

        if (partnerName.trim() === '' ||
            partnerContact.trim() === '' ||
            partnerAddress.trim() === '' ||
            partnerPhone.trim() === '' ||
            partnerEmail.trim() === '') {
            alert("Not valid input!");
        } else {
            const newPartner = {
                name: partnerName,
                contact: partnerContact,
                address: partnerAddress,
                phone: partnerPhone,
                email: partnerEmail
            };
            partners.push(newPartner)
            console.log(partners)


        }
    }

    input_button.addEventListener('click', checkValues)
    console.log(partners)

</script>
