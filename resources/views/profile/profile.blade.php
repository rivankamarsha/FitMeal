<x-index-layout>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, Helvetica, sans-serif;
    }

    body {
      background-color: #f5f5f5;
    }

    .navbar {
      background-color: #0F4229;
      padding: 15px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      color: white;
    }

    .logo {
      font-size: 28px;
      font-weight: bold;
      color: white;
      text-decoration: none;
    }

    .nav-links {
      display: flex;
      align-items: center;
      gap: 30px;
    }

    .nav-links a {
      color: white;
      text-decoration: none;
      font-size: 16px;
    }

    .profile-section {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .search-icon {
      cursor: pointer;
    }

    .profile-pic {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
      cursor: pointer;
    }

    .main-content {
      background-color: white;
      border-radius: 20px 20px 0 0;
      min-height: calc(100vh - 70px);
    }

    .back-button {
      display: inline-flex;
      align-items: center;
      margin-bottom: 20px;
      cursor: pointer;
    }

    .content-container {
      display: flex;
      gap: 40px;
    }

    .sidebar {
      width: 300px;
    }

    .sidebar h2 {
      margin-bottom: 20px;
      font-size: 24px;
    }

    .sidebar-menu {
      list-style: none;
    }

    .sidebar-menu-item {
      margin-bottom: 10px;
      border-radius: 8px;
      overflow: hidden;
    }

    .sidebar-menu-item.active {
      background-color: #2E6647;
      color: white;
    }

    .sidebar-menu-item a {
      display: flex;
      align-items: center;
      padding: 15px;
      text-decoration: none;
      color: white;
    }

    .sidebar-menu-item .active a {
      color: white;
    }

    .sidebar-menu-item:not(.active) a {
      color: #333;
    }

    .sidebar-icon {
      margin-right: 10px;
      width: 20px;
      height: 20px;
    }

    .chevron-icon {
      margin-left: auto;
    }

    .account-section {
      flex: 1;
    }

    .account-section h2 {
      margin-bottom: 20px;
      font-size: 24px;
    }

    .profile-image-container {
      position: relative;
      width: 80px;
      height: 80px;
      margin-bottom: 20px;
    }

    .profile-image {
      width: 100%;
      height: 100%;
      border-radius: 8px;
      object-fit: cover;
    }

    .remove-image {
      position: absolute;
      top: -8px;
      right: -8px;
      background-color: white;
      border-radius: 50%;
      width: 24px;
      height: 24px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      color: #333;
      margin-bottom: 8px;
      font-weight: 500;
    }

    .form-group input {
      width: 100%;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 16px;
    }
    
    .form-group textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 16px;
    }

    .form-row {
      display: flex;
      gap: 20px;
    }

    .form-row .form-group {
      flex: 1;
    }

    .status-badge {
      display: inline-block;
      background-color: #00BF8F;
      color: white;
      padding: 5px 15px;
      border-radius: 20px;
      font-size: 14px;
    }

    button {
      padding: 12px 20px;
      background-color: #0F4229;
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }

    button:hover {
      background-color: #0c341f;
    }
    
    footer {
        background: white;
        color: #0F3D2B;
        padding-top: 40px;
    }
  </style>
  <!-- Main Content -->
  <div class="main-content">
    <div class="back-button">
      ← Back
    </div>

    <div class="content-container">
      <!-- Sidebar -->
      <div class="sidebar">
        <h2>Settings</h2>
        <ul class="sidebar-menu">
          <li class="sidebar-menu-item active">
            <a href="#" style="color: white">
              Account
              <span class="chevron-icon">›</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a id="logout-button" href="#">
              Logout
            </a>
          </li>
        </ul>
      </div>

      <!-- Account Form -->
      <div class="account-section">
        <h2>Account</h2>
        <!-- Formulir dengan perbaikan -->
<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <!-- Profile Image -->
  <div class="profile-image-container">
    <img 
      class="profile-image" 
      src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('img/default-avatar.jpg') }}" 
      alt="User Avatar"
    />
    <label for="avatar-upload" class="remove-image" title="Change">
      ✏️
    </label>
    <input type="file" id="avatar-upload" name="avatar" accept="image/*" style="display: none;">
  </div>

  <!-- Name -->
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required />
  </div>

  <!-- Email -->
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required />
  </div>
  
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" required />  
  </div>

  <!-- Address - Perbaikan -->
  <div class="form-group">
    <label for="address">Address</label>
    <textarea id="address" name="address">{{ old('address', $user->address) }}</textarea>
  </div> 

  <!-- Phone - Perbaikan -->
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" name="phone_number" id="phone" value="{{ old('phone_number', $user->phone_number) }}" />
  </div>

  <div style="padding-bottom: 40px">
      <label style="color: black">Status</label><br>
      @if($paidOrders->count() > 0)
        @foreach($paidOrders as $order)
          <span class="status-badge" style="...">{{ $order->nama_program }}</span>
        @endforeach
      @else
        <span class="status-badge" style="background: red">No active subscription</span>
      @endif
  </div>

  <button type="submit">Save Changes</button>
</form>
      </div>
    </div>
  </div>

  <div id="logoutModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); z-index: 1000;">
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px; border-radius: 5px; width: 300px;">
      <h5>Konfirmasi Logout</h5>
      <p>Apakah kamu yakin ingin keluar?</p>
      <div style="text-align: right;">
        <button id="cancelButton" class="btn btn-primary">Cancel</button>
        <a href="{{ url('/logout') }}" class="btn btn-danger">Yakin</a>
      </div>
    </div>
  </div>

</body>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const logoutButton = document.getElementById('logout-button');
      const logoutModal = document.getElementById('logoutModal');
      const cancelButton = document.getElementById('cancelButton');
      
      logoutButton.addEventListener('click', function() {
        logoutModal.style.display = 'block';
      });
      
      cancelButton.addEventListener('click', function() {
        logoutModal.style.display = 'none';
      });
    });
  </script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const avatarInput = document.getElementById('avatar-upload');
    const avatarImg = document.querySelector('.profile-image');

    avatarInput.addEventListener('change', function () {
      if (this.files && this.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
          avatarImg.src = e.target.result;

          // Reset remove-avatar flag if it exists
          const removeAvatarInput = document.getElementById('remove-avatar');
          if (removeAvatarInput) {
            removeAvatarInput.value = '0';
          }
        };
        reader.readAsDataURL(this.files[0]);
      }
    });

    // Optional: handle reset avatar button if it exists
    const removeAvatarBtn = document.getElementById('remove-avatar-btn');
    if (removeAvatarBtn) {
      removeAvatarBtn.addEventListener('click', function () {
        avatarImg.src = "{{ asset('img/default-avatar.jpg') }}";
        const removeAvatarInput = document.getElementById('remove-avatar');
        if (removeAvatarInput) {
          removeAvatarInput.value = '1';
        }
      });
    }
  });
</script>
  </x-index-layout>