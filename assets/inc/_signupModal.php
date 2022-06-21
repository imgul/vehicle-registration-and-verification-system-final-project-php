<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Register New Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="assets/partials/_handleSignup.php" method="POST">
          <div class="d-flex gap-2">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="lastName" class="form-label">Last Name (optional)</label>
                <input type="text" class="form-control" id="lastName" name="lastName">
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="mb-3">
            <label for="cpassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword" required>
          </div>
          <button type="submit" class="btn btn-success" name="signup">Register</button>
        </form>
      </div>
      <div class="modal-footer">
        <!-- Add anything here in the future -->
      </div>
    </div>
  </div>
</div>