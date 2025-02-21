<div>
  {if ! $user}
  <p>Please Login!</p>
  {else}
  {user}
  <h4 class="mb-4">{name}'s Profile</h4>
  <ul>
    <li>Name: <span class="fw-bold">{name}</span></li>
    <li>Age: <span class="fw-bold">{age}</span></li>
    <li>Date of Birth: <span class="fw-bold">{dob}</span></li>
    <li>Gender: <span class="fw-bold">{gender}</span></li>
    <li>Status: <span class="fw-bold">{status}</span></li>
  </ul>

  <h4 class="mb-4">Activity History</h4>
  {activity_history}
  <ul>
    <li>{time} > {desc}</li>
  </ul>
  {/activity_history}
  {/user}
  {endif}

</div>