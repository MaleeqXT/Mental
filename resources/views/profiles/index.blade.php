@extends('admin.layouts.app')
@section('content')

<div class="page-content">
    <!-- Start Page Title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Profile</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Bio</li>
                        </ol>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="float-end d-none d-sm-block">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="font-size-16">My Profile</h5>
                            <div class="border p-3 rounded mt-4">
                                <!-- Category Links -->
                                <div id="accordion" class="categories-accordion">
                                    <div class="categories-group-card">
                                        <a href="javascript:void(0);" class="categories-group-list" onclick="showCategory('personalInfo')">
                                            <i class="ti-user font-size-16 align-middle me-2"></i> About Me
                                        </a>
                                    </div>
                                    <div class="categories-group-card">
                                        <a href="javascript:void(0);" class="categories-group-list" onclick="showCategory('finances')">
                                            <i class="ti-wallet font-size-16 align-middle me-2"></i> Finances
                                        </a>
                                    </div>
                                    <div class="categories-group-card">
                                        <a href="javascript:void(0);" class="categories-group-list" onclick="showCategory('qualifications')">
                                            <i class="mdi mdi-school font-size-16 align-middle me-2"></i> Qualifications
                                        </a>
                                    </div>
                                    <div class="categories-group-card">
                                        <a href="javascript:void(0);" class="categories-group-list" onclick="showCategory('specialties')">
                                            <i class="mdi mdi-dumbbell font-size-16 align-middle me-2"></i> Specialties
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Main Content Area for Dynamic Bio Information Display -->
                <div class="col-lg-9">
                    <div class="row">
                        <!-- Expanded Card to Display Selected Category Content -->
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card" style="min-height: 500px;">
                                <div class="card-body">
                                    <div id="personalInfo" class="bio-section">
                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset(auth()->user()->image) }}" alt="Profile Image" class="rounded" width="80" height="80">
                                                
                                                <div class="ms-3">
                                                    <h2>
                                                        <!-- Display Personal Bio -->
                                                        <span id="user-first-name">{{ $personalBio->first_name ?? '' }}</span>
                                                        <span id="user-middle-name">{{ $personalBio->middle_name ?? '' }}</span>
                                                        <span id="user-last-name">{{ $personalBio->last_name ?? '' }}</span>
                                                    </h2>
                                                    <p class="text-muted mb-0">
                                                        <i class="fas fa-user-md me-2"></i>
                                                        <span id="user-title">{{ $personalBio->title ?? '' }}</span>
                                                    </p>
                                                    <p class="text-muted mb-0" id="user-credentials">
                                                        <i class="fas fa-certificate me-1"></i> {{ $personalBio->credentials ?? '' }}
                                                    </p>
                                                </div>
                                            </div>
                                            
                                            <!-- Button to Open Modal -->
                                            <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#editModal" style="padding: 0; margin-right: 10px; margin-left: 50%;">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                        </div>
                                    
                                        <!-- Edit Modal Structure -->
                                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form method="POST" action="{{ route('user.update') }}">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit Personal Information</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="first_name" class="form-label">First Name</label>
                                                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $personalBio->first_name ?? '') }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="middle_name" class="form-label">Middle Name</label>
                                                                <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name', $personalBio->middle_name ?? '') }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="last_name" class="form-label">Last Name</label>
                                                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $personalBio->last_name ?? '') }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="title" class="form-label">Title</label>
                                                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $personalBio->title ?? '') }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="credentials" class="form-label">Credentials</label>
                                                                <input type="text" class="form-control" id="credentials" name="credentials" value="{{ old('credentials', $personalBio->credentials ?? '') }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    

                                    
                                    <hr>
                                    


<!-- Personal Statement Section -->
<div id="personal-statement" class="bio-section">
    <h5>
        <i class="fas fa-file-alt"></i>
        <strong>Personal Statement:</strong>
        <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#editPersonalStatementModal" style="padding: 0; margin-left: 10px;">
            <i class="fas fa-edit"></i> Edit
        </button>
    </h5>
    <p id="user-bio">
        {{ $personalStatement->bio ?? 'As a Senior Software Developer with over 8 years of experience in designing and implementing robust software solutions, I am passionate about leveraging technology to solve complex problems and improve user experiences. My expertise spans various programming languages, including PHP, JavaScript, and Python, with a strong emphasis on Laravel and React frameworks.' }}
    </p>
</div>

<!-- Modal for Editing Personal Statement -->
<div class="modal fade" id="editPersonalStatementModal" tabindex="-1" aria-labelledby="editPersonalStatementModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPersonalStatementModalLabel">Edit Personal Statement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{ route('profile.personalStatement.update') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="personalStatementInput" class="form-label">Your Personal Statement</label>
                        <p id="user-bio">
                            {{ $personalStatement->bio ?? 'Default bio text' }}
                        </p>
                        
                        <textarea class="form-control" id="personalStatementInput" name="bio" rows="5">{{ $personalStatement->bio }}</textarea>
                    </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // This code is no longer needed since we are submitting the form directly
    });
</script>
     
<hr>

<!-- Identity Section -->
<div id="identity" class="bio-section">
    <h5>
        <i class="fas fa-user"></i> 
        <strong>Identity</strong>
        <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#editIdentityModal" style="padding: 0; margin-left: 10px;">
            <i class="fas fa-edit"></i> Edit
        </button>
    </h5>
   <!-- Displaying Identity Data -->
<p><strong>Age:</strong> <span id="user-age">{{ $identity->age ?? 'Not provided' }}</span></p>
<p><strong>Gender:</strong> <span id="user-gender">{{ $identity->gender ?? 'Not provided' }}</span></p>
<p><strong>Faith:</strong> <span id="user-faith">{{ $identity->faith ?? 'Not provided' }}</span></p>


</div>

<!-- Modal for Editing Identity -->
<div class="modal fade" id="editIdentityModal" tabindex="-1" aria-labelledby="editIdentityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editIdentityModalLabel">Edit Identity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for Identity data with CSRF token and POST action -->
                <form id="identityForm" method="POST" action="{{ route('identity.store') }}">
                    @csrf <!-- CSRF token for security -->
                    
                    <div class="mb-3">
                        <label for="ageInput" class="form-label">Age</label>
                        <input type="number" class="form-control" id="ageInput" name="age" value="30" min="0" max="120">
                    </div>
                    
                    <div class="mb-3">
                        <label for="genderSelect" class="form-label">Gender</label>
                        <select class="form-select" id="genderSelect" name="gender">
                            <option value="Male" selected>Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="faithInput" class="form-label">Faith</label>
                        <input type="text" class="form-control" id="faithInput" name="faith" value="Christianity">
                    </div>
                    
                    <div class="mb-3">
                        <label for="dobMonthInput" class="form-label">Date of Birth</label>
                        <div class="row">
                            <div class="col">
                                <select class="form-select" id="dobMonthInput" name="dob_month">
                                    <option value="" disabled selected>Month</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select" id="dobDayInput" name="dob_day">
                                    <option value="" disabled selected>Day</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select" id="dobYearInput" name="dob_year">
                                    <option value="" disabled selected>Year</option>
                                    @for ($year = 1900; $year <= now()->year; $year++)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif



<hr>

<!-- Phone Section -->
<div id="phone" class="bio-section">
    <h5>
        <i class="fas fa-phone-alt"></i> 
        <strong>Phone</strong>
        <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#editPhoneModal" style="padding: 0; margin-left: 10px;">
            <i class="fas fa-edit"></i> Edit
        </button>
    </h5>
    <p>Phone: <span id="user-phone">{{ auth()->user()->phone ?? '+123 456 7890' }}</span></p>
</div>

<!-- Modal for Editing Phone -->
<div class="modal fade" id="editPhoneModal" tabindex="-1" aria-labelledby="editPhoneModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPhoneModalLabel">Edit Phone Number</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="phoneForm">
                    <div class="mb-3">
                        <label for="phoneInput" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phoneInput" value="{{ auth()->user()->phone ?? '+123 456 7890' }}">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="savePhone">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Load saved phone from localStorage
        const storedPhone = localStorage.getItem('userPhone');
        if (storedPhone) {
            document.getElementById('user-phone').textContent = storedPhone;
        }

        // Save changes for phone number
        document.getElementById('savePhone').addEventListener('click', function () {
            const newPhone = document.getElementById('phoneInput').value;

            // Update the displayed phone number
            document.getElementById('user-phone').textContent = newPhone;

            // Save to localStorage
            localStorage.setItem('userPhone', newPhone);

            // Close the modal after saving
            $('#editPhoneModal').modal('hide');
        });
    });
</script>

<hr>

<!-- Email Section -->
<div id="email" class="bio-section">
    <h5>
        <i class="fas fa-envelope"></i> 
        <strong>Email</strong>
        <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#editEmailModal" style="padding: 0; margin-left: 10px;">
            <i class="fas fa-edit"></i> Edit
        </button>
    </h5>
    <p>Email: <span id="user-email">{{ auth()->user()->email }}</span></p>
</div>

<!-- Modal for Editing Email -->
<div class="modal fade" id="editEmailModal" tabindex="-1" aria-labelledby="editEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEmailModalLabel">Edit Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="emailForm">
                    <div class="mb-3">
                        <label for="emailInput" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="emailInput" value="{{ auth()->user()->email }}">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveEmail">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Load saved email from localStorage
        const storedEmail = localStorage.getItem('userEmail');
        if (storedEmail) {
            document.getElementById('user-email').textContent = storedEmail;
        }

        // Save changes for email
        document.getElementById('saveEmail').addEventListener('click', function () {
            const newEmail = document.getElementById('emailInput').value;

            // Update the displayed email address
            document.getElementById('user-email').textContent = newEmail;

            // Save to localStorage
            localStorage.setItem('userEmail', newEmail);

            // Close the modal after saving
            $('#editEmailModal').modal('hide');
        });
    });
</script>

<hr>

<!-- Website Section -->
<div id="website" class="bio-section">
    <h5>
        <i class="fas fa-globe"></i> 
        <strong>Website</strong>
        <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#editWebsiteModal" style="padding: 0; margin-left: 10px;">
            <i class="fas fa-edit"></i> Edit
        </button>
    </h5>
    <p>Website: <span id="user-website">{{ auth()->user()->website ?? 'https://example.com' }}</span></p>
</div>

<!-- Modal for Editing Website -->
<div class="modal fade" id="editWebsiteModal" tabindex="-1" aria-labelledby="editWebsiteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editWebsiteModalLabel">Edit Website</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="websiteForm">
                    <div class="mb-3">
                        <label for="websiteInput" class="form-label">Website URL</label>
                        <input type="url" class="form-control" id="websiteInput" value="{{ auth()->user()->website ?? 'https://example.com' }}">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveWebsite">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Load saved website from localStorage
        const storedWebsite = localStorage.getItem('userWebsite');
        if (storedWebsite) {
            document.getElementById('user-website').textContent = storedWebsite;
        }

        // Save changes for website
        document.getElementById('saveWebsite').addEventListener('click', function () {
            const newWebsite = document.getElementById('websiteInput').value;

            // Update the displayed website URL
            document.getElementById('user-website').textContent = newWebsite;

            // Save to localStorage
            localStorage.setItem('userWebsite', newWebsite);

            // Close the modal after saving
            $('#editWebsiteModal').modal('hide');
        });
    });
</script>

                                    
                                    
        
                                    













                                    <!-- Edit Modal Structure -->
                                 
                                                                      
                                    
                                    <div id="finances" class="bio-section d-none">
                                        <h5><strong>Finances:</strong></h5>
                                        <p>John manages the financial planning and budgeting for the tech department.</p>
                                        
                                        <!-- Edit Button for Fees -->
                                        <h6>
                                            <i class="fas fa-money-bill-wave"></i> Fees
                                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#editFeesModal" style="padding: 0; margin-right: 10px; margin-left: 50%;">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                        </h6>
                                        <h6>Individual Session Cost :</h6>
                                        <p id="individual-cost-display" style="color: #939a9c;">$250 per session</p>
                                        <h6>Couple Session Cost :</h6>
                                        <p id="couple-cost-display" style="color: #939a9c;">$300 per session</p>
                                        <hr>
                                        
                                        <!-- Payment Methods Section -->
                                        <h6><i class="fas fa-credit-card"></i> Payment Methods
                                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#editPaymentMethodsModal" style="padding: 0; margin-left: 50%;">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                        </h6>
                                        <p id="payment-methods-display">
                                            <span>American Express</span>
                                            <span style="margin-left: 100px">Mastercard</span>
                                        </p>
                                        <p id="payment-methods-display-2">
                                            <span>Health Savings Account</span>
                                            <span style="margin-left: 100px">Visa</span>
                                        </p>
                                    </div>
                                    
                                    <!-- Edit Fees Modal -->
                                    <div class="modal fade" id="editFeesModal" tabindex="-1" role="dialog" aria-labelledby="editFeesModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editFeesModalLabel">Edit Fees</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="individual-cost">Individual Session Cost</label>
                                                            <input type="text" class="form-control" id="individual-cost">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="couple-cost">Couple Session Cost</label>
                                                            <input type="text" class="form-control" id="couple-cost">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" id="save-fees-changes" data-dismiss="modal">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Edit Payment Methods Modal -->
                                    <div class="modal fade" id="editPaymentMethodsModal" tabindex="-1" role="dialog" aria-labelledby="editPaymentMethodsModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editPaymentMethodsModalLabel">Edit Payment Methods</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="payment-methods">Payment Methods (comma-separated)</label>
                                                            <input type="text" class="form-control" id="payment-methods">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" id="save-payment-methods-changes" data-dismiss="modal">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- jQuery and Bootstrap JS -->
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
                                    <!-- Font Awesome for Icons -->
                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
                                    <!-- JavaScript to Handle Modal Data -->
                                    <script>
                                        $(document).ready(function() {
                                            // Populate Fees Modal with current values
                                            $('.btn-link[data-target="#editFeesModal"]').click(function() {
                                                const individualCost = $('#individual-cost-display').text().replace(' per session', '').replace('$', '');
                                                const coupleCost = $('#couple-cost-display').text().replace(' per session', '').replace('$', '');
                                                $('#individual-cost').val(individualCost);
                                                $('#couple-cost').val(coupleCost);
                                            });
                                    
                                            // Populate Payment Methods Modal with current values
                                            $('.btn-link[data-target="#editPaymentMethodsModal"]').click(function() {
                                                const paymentMethods = $('#payment-methods-display span').map(function() {
                                                    return $(this).text();
                                                }).get().join(', ');
                                                $('#payment-methods').val(paymentMethods);
                                            });
                                    
                                            // Save changes for Fees
                                            $('#save-fees-changes').click(function() {
                                                const updatedIndividualCost = $('#individual-cost').val();
                                                const updatedCoupleCost = $('#couple-cost').val();
                                                $('#individual-cost-display').text('$' + updatedIndividualCost + ' per session');
                                                $('#couple-cost-display').text('$' + updatedCoupleCost + ' per session');
                                                $('#finances').removeClass('d-none');
                                                $('#editFeesModal').modal('hide');
                                            });
                                    
                                            // Save changes for Payment Methods
                                            $('#save-payment-methods-changes').click(function() {
                                                const updatedPaymentMethods = $('#payment-methods').val().split(',').map(function(method) {
                                                    return '<span>' + method.trim() + '</span>';
                                                }).join('<span style="margin-left: 100px"></span>');
                                                $('#payment-methods-display').html(updatedPaymentMethods);
                                                $('#finances').removeClass('d-none');
                                                $('#editPaymentMethodsModal').modal('hide');
                                            });
                                        });
                                    </script>
                                
                                              <!-- Qualifications Section -->
                                                   <div id="qualifications" class="bio-section d-none">
                                                    <h5>
                                                        <strong>Qualifications:</strong>
                                                    </h5>
                                                
                                                    <!-- Primary Credential Section -->
                                                    <h5>
                                                        <i class="fas fa-certificate"></i>
                                                        <strong>Primary Credential</strong>
                                                        <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#editPrimaryCredentialModal" style="padding: 0; margin-left: 10px;">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </button>
                                                    </h5>
                                                    <p><strong>Mental Health Role:</strong> <span id="displayMentalHealthRole">Psychologist</span></p>
                                                    <p><strong>Credential Type:</strong> <span id="displayCredentialType">License</span></p>
                                                    <p><strong>License State:</strong> <span id="displayLicenseState">USA, New York</span></p>
                                                    <p><strong>License Number:</strong> <span id="displayLicenseNumber">PSO270803</span></p>
                                                    <p><strong>License Expiration Date:</strong> <span id="displayLicenseExpirationDate">25-10</span></p>
                                                    <hr>
                                                
                                                    <!-- Education and Years in Practice Section -->
                                                    <h5>
                                                        <i class="fas fa-graduation-cap"></i>
                                                        <strong>Education and Years in Practice</strong>
                                                        <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#editEducationModal" style="padding: 0; margin-left: 10px;">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </button>
                                                    </h5>
                                                    <p><strong>Education:</strong> <span id="displayEducation">Boston College</span></p>
                                                    <p><strong>Degree/Diploma:</strong> <span id="displayDegree">MSW</span></p>
                                                    <p><strong>Year Graduated:</strong> <span id="displayYearGraduated">2018</span></p>
                                                    <p><strong>Year I Begin Practice:</strong> <span id="displayYearBeginPractice">2019</span></p>
                                                    <hr>
                                                
                                                    <!-- Additional Credentials Section -->
                                                    <h5>
                                                        <i class="fas fa-award"></i>
                                                        <strong>Additional Credentials</strong>
                                                        <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#editAdditionalCredentialsModal" style="padding: 0; margin-left: 10px;">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </button>
                                                    </h5>
                                                    <p><span id="displayAdditionalCredentials">West Chester University 2024</span></p>
                                                </div>
                                                
                                                <!-- Modal for Editing Primary Credential -->
                                                <div class="modal fade" id="editPrimaryCredentialModal" tabindex="-1" aria-labelledby="editPrimaryCredentialModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editPrimaryCredentialModalLabel">Edit Primary Credential</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form id="primaryCredentialForm">
                                                                    <div class="mb-3">
                                                                        <label for="mentalHealthRole" class="form-label">Mental Health Role</label>
                                                                        <input type="text" class="form-control" id="mentalHealthRole" value="Psychologist">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="credentialType" class="form-label">Credential Type</label>
                                                                        <input type="text" class="form-control" id="credentialType" value="License">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="licenseState" class="form-label">License State</label>
                                                                        <input type="text" class="form-control" id="licenseState" value="USA, New York">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="licenseNumber" class="form-label">License Number</label>
                                                                        <input type="text" class="form-control" id="licenseNumber" value="PSO270803">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="licenseExpirationDate" class="form-label">License Expiration Date</label>
                                                                        <input type="text" class="form-control" id="licenseExpirationDate" value="25-10">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary" id="savePrimaryCredential">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Modal for Editing Education -->
                                                <div class="modal fade" id="editEducationModal" tabindex="-1" aria-labelledby="editEducationModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editEducationModalLabel">Edit Education</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form id="educationForm">
                                                                    <div class="mb-3">
                                                                        <label for="education" class="form-label">Education</label>
                                                                        <input type="text" class="form-control" id="education" value="Boston College">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="degree" class="form-label">Degree/Diploma</label>
                                                                        <input type="text" class="form-control" id="degree" value="MSW">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="yearGraduated" class="form-label">Year Graduated</label>
                                                                        <input type="text" class="form-control" id="yearGraduated" value="2018">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="yearBeginPractice" class="form-label">Year I Begin Practice</label>
                                                                        <input type="text" class="form-control" id="yearBeginPractice" value="2019">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary" id="saveEducation">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Modal for Editing Additional Credentials -->
                                                <div class="modal fade" id="editAdditionalCredentialsModal" tabindex="-1" aria-labelledby="editAdditionalCredentialsModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editAdditionalCredentialsModalLabel">Edit Additional Credentials</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form id="additionalCredentialsForm">
                                                                    <div class="mb-3">
                                                                        <label for="additionalCredentials" class="form-label">Additional Credentials</label>
                                                                        <input type="text" class="form-control" id="additionalCredentials" value="West Chester University 2024">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary" id="saveAdditionalCredentials">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        // Load saved values from localStorage if available
                                                        if (localStorage.getItem('mentalHealthRole')) {
                                                            document.getElementById('displayMentalHealthRole').innerText = localStorage.getItem('mentalHealthRole');
                                                            document.getElementById('displayCredentialType').innerText = localStorage.getItem('credentialType');
                                                            document.getElementById('displayLicenseState').innerText = localStorage.getItem('licenseState');
                                                            document.getElementById('displayLicenseNumber').innerText = localStorage.getItem('licenseNumber');
                                                            document.getElementById('displayLicenseExpirationDate').innerText = localStorage.getItem('licenseExpirationDate');
                                                            document.getElementById('displayEducation').innerText = localStorage.getItem('education');
                                                            document.getElementById('displayDegree').innerText = localStorage.getItem('degree');
                                                            document.getElementById('displayYearGraduated').innerText = localStorage.getItem('yearGraduated');
                                                            document.getElementById('displayYearBeginPractice').innerText = localStorage.getItem('yearBeginPractice');
                                                            document.getElementById('displayAdditionalCredentials').innerText = localStorage.getItem('additionalCredentials');
                                                        }
                                                    });
                                                
                                                    // Save Primary Credential
                                                    document.getElementById('savePrimaryCredential').addEventListener('click', function() {
                                                        const mentalHealthRole = document.getElementById('mentalHealthRole').value;
                                                        const credentialType = document.getElementById('credentialType').value;
                                                        const licenseState = document.getElementById('licenseState').value;
                                                        const licenseNumber = document.getElementById('licenseNumber').value;
                                                        const licenseExpirationDate = document.getElementById('licenseExpirationDate').value;
                                                
                                                        document.getElementById('displayMentalHealthRole').innerText = mentalHealthRole;
                                                        document.getElementById('displayCredentialType').innerText = credentialType;
                                                        document.getElementById('displayLicenseState').innerText = licenseState;
                                                        document.getElementById('displayLicenseNumber').innerText = licenseNumber;
                                                        document.getElementById('displayLicenseExpirationDate').innerText = licenseExpirationDate;
                                                
                                                        localStorage.setItem('mentalHealthRole', mentalHealthRole);
                                                        localStorage.setItem('credentialType', credentialType);
                                                        localStorage.setItem('licenseState', licenseState);
                                                        localStorage.setItem('licenseNumber', licenseNumber);
                                                        localStorage.setItem('licenseExpirationDate', licenseExpirationDate);
                                                
                                                        let modal = bootstrap.Modal.getInstance(document.getElementById('editPrimaryCredentialModal'));
                                                        modal.hide();
                                                    });
                                                
                                                    // Save Education
                                                    document.getElementById('saveEducation').addEventListener('click', function() {
                                                        const education = document.getElementById('education').value;
                                                        const degree = document.getElementById('degree').value;
                                                        const yearGraduated = document.getElementById('yearGraduated').value;
                                                        const yearBeginPractice = document.getElementById('yearBeginPractice').value;
                                                
                                                        document.getElementById('displayEducation').innerText = education;
                                                        document.getElementById('displayDegree').innerText = degree;
                                                        document.getElementById('displayYearGraduated').innerText = yearGraduated;
                                                        document.getElementById('displayYearBeginPractice').innerText = yearBeginPractice;
                                                
                                                        localStorage.setItem('education', education);
                                                        localStorage.setItem('degree', degree);
                                                        localStorage.setItem('yearGraduated', yearGraduated);
                                                        localStorage.setItem('yearBeginPractice', yearBeginPractice);
                                                
                                                        let modal = bootstrap.Modal.getInstance(document.getElementById('editEducationModal'));
                                                        modal.hide();
                                                    });
                                                
                                                    // Save Additional Credentials
                                                    document.getElementById('saveAdditionalCredentials').addEventListener('click', function() {
                                                        const additionalCredentials = document.getElementById('additionalCredentials').value;
                                                
                                                        document.getElementById('displayAdditionalCredentials').innerText = additionalCredentials;
                                                
                                                        localStorage.setItem('additionalCredentials', additionalCredentials);
                                                
                                                        let modal = bootstrap.Modal.getInstance(document.getElementById('editAdditionalCredentialsModal'));
                                                        modal.hide();
                                                    });
                                                </script>
                                                
                                    
                                
<!-- Specialties Section -->
<div id="specialties" class="bio-section d-none">
    <h5>
        <i class="fas fa-trophy"></i> Top Specialties and Expertise
        <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#editSpecialtiesModal" style="padding: 0; margin-left: 50%;">
            <i class="fas fa-edit"></i> Edit
        </button>
    </h5>
    <h6><strong>Top Specialties:</strong></h6>
    <p id="topSpecialties">Women's Issues, Mood Disorders, Life Coaching</p>
    <hr>
    <h6><i class="fa fa-exclamation-circle"></i> Issues</h6>
    <div id="issues">
        <p><span>Anger Management</span><span style="margin-left: 130px">Infidelity</span></p>
        <p><span>Anxiety</span><span style="margin-left: 220px">Marital and Premarital</span></p>
        <p><span>Codependency</span><span style="margin-left: 160px">Obsessive-Compulsive (OCD)</span></p>
        <p><span>Coping Skills</span><span style="margin-left: 178px">Parenting</span></p>
        <p><span>Depression</span><span style="margin-left: 190px">Peer Relationships</span></p>
        <p><span>Divorce</span><span style="margin-left: 214px">Pregnancy, Prenatal, Postpartum</span></p>
        <p><span>Domestic Violence</span><span style="margin-left: 143px">Racial Identity</span></p>
        <p><span>Emotional Disturbance</span><span style="margin-left: 116px">Relationships Issue</span></p>
        <p><span>Family Conflict</span><span style="margin-left: 167px">Self Esteem</span></p>
    </div>
</div>

<!-- Modal for Editing Specialties -->
<div class="modal fade" id="editSpecialtiesModal" tabindex="-1" aria-labelledby="editSpecialtiesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSpecialtiesModalLabel">Edit Specialties</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="specialtiesForm">
                    <div class="mb-3">
                        <label for="topSpecialtiesInput" class="form-label">Top Specialties</label>
                        <input type="text" class="form-control" id="topSpecialtiesInput" value="Women's Issues, Mood Disorders, Life Coaching">
                    </div>
                    <div class="mb-3">
                        <label for="issuesInput" class="form-label">Issues</label>
                        <div id="issuesInputs">
                            <!-- Individual issue inputs will be populated here -->
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveSpecialties">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const issuesArray = [
            'Anger Management', 'Infidelity',
            'Anxiety', 'Marital and Premarital',
            'Codependency', 'Obsessive-Compulsive (OCD)',
            'Coping Skills', 'Parenting',
            'Depression', 'Peer Relationships',
            'Divorce', 'Pregnancy, Prenatal, Postpartum',
            'Domestic Violence', 'Racial Identity',
            'Emotional Disturbance', 'Relationships Issue',
            'Family Conflict', 'Self Esteem'
        ];

        const issuesInputsContainer = document.getElementById('issuesInputs');

        // Function to populate the issue inputs
        function populateIssuesInputs() {
            // Clear any existing inputs
            issuesInputsContainer.innerHTML = '';

            // Populate individual issue inputs
            issuesArray.forEach((issue, index) => {
                const div = document.createElement('div');
                div.className = 'mb-2';
                div.innerHTML = `
                    <input type="text" class="form-control" value="${issue}" id="issueInput${index}" placeholder="Issue ${index + 1}">
                `;
                issuesInputsContainer.appendChild(div);
            });
        }

        // Populate the issues when the modal is shown
        $('#editSpecialtiesModal').on('show.bs.modal', function () {
            // Populate issues in the modal
            populateIssuesInputs();

            // Set the top specialties input value
            document.getElementById('topSpecialtiesInput').value = document.getElementById('topSpecialties').textContent;
        });

        // Save changes and update specialties and issues on the main page
        document.getElementById('saveSpecialties').addEventListener('click', function () {
            // Get values from the form
            const topSpecialties = document.getElementById('topSpecialtiesInput').value;

            // Update the displayed specialties
            document.getElementById('topSpecialties').textContent = topSpecialties;

            // Collect issues from inputs
            const updatedIssues = [];
            issuesArray.forEach((_, index) => {
                const issueInput = document.getElementById(`issueInput${index}`);
                if (issueInput) {
                    updatedIssues.push(issueInput.value);
                }
            });

            // Update the displayed issues
            const issuesHTML = updatedIssues.map((issue, index) => {
                return `<span>${issue}</span>` + (index % 2 !== 0 ? '' : `<span style="margin-left: 130px"></span>`);
            }).join('<br>');

            document.getElementById('issues').innerHTML = issuesHTML;

            // Close the modal after saving
            $('#editSpecialtiesModal').modal('hide');
        });
    });
</script>

<!-- Include Bootstrap CSS and JS for modal functionality -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


</div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row for Expanded Bio Card -->
                </div>
            </div>
            <!-- End Row -->
        </div>
    </div> <!-- End Container-Fluid -->
</div> <!-- End Page-Content -->

<!-- JavaScript to Handle Category Switching -->
<script>
    function showCategory(category) {
        // Hide all bio sections
        document.querySelectorAll('.bio-section').forEach(section => {
            section.classList.add('d-none');
        });

        // Show the selected category section
        document.getElementById(category).classList.remove('d-none');
    }
</script>


@endsection
