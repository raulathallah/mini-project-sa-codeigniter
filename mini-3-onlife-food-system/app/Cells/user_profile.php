<div>
    <ul>
        <li>ID : <span class="fw-bold"><?= esc($user['id']); ?></span></li>
        <li>Name : <span class="fw-bold"><?= $user['name']; ?></span></li>
        <li>Date of Birth : <span class="fw-bold"><?= date('d/M/Y', strtotime($user['dob'])); ?></span></li>
        <li>Age : <span class="fw-bold"><?= $user['age']; ?></span></li>
        <li>Gender : <span class="fw-bold"><?= $user['gender']; ?></span></li>
        <li>Status : <span class="fw-bold"><?= $user['status']; ?></span></li>
    </ul>
</div>