<div>
    <!-- Your HTML here -->
    <h4>Product Statistics</h4>
    <ul>
        <li>Total Products <span class="fw-bold"><?= $totalProducts; ?></span></li>
        <li>Trending Items</li>
        <ol>
            <?php foreach ($trend as $row): ?>
                <li><?= $row['name']; ?> (<?= $row['sold']; ?> sold)</li>
            <?php endforeach; ?>
        </ol>
        <li>Store Inventory</li>
        <ol>
            <?php foreach ($inventory as $row): ?>
                <li><?= $row['name']; ?> : <?= $row['stock']; ?> available (<?= $row['stockStatus']; ?>)</li>
            <?php endforeach; ?>
        </ol>
    </ul>
</div>