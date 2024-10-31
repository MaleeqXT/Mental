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
                        <a href="#" class="btn btn-success">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <!-- Sidebar with Categories -->
                <div class="col-xl-3 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="font-size-16">Categories</h5>
                            <div class="border p-3 rounded mt-4">
                                <!-- Category Links -->
                                <div id="accordion" class="categories-accordion">
                                    <div class="categories-group-card">
                                        <a href="javascript:void(0);" class="categories-group-list" onclick="showCategory('personalInfo')">
                                            <i class="ti-user font-size-16 align-middle me-2"></i> Personal Info
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
                                                <img src="{{ asset( auth()->user()->image) }}" alt="Profile Image" class="rounded-circle" width="80" height="80">
                                                <div class="ms-3">
                                                    <h4 class="font-size-24 mb-0">{{ auth()->user()->name }}</h4>
                                                    <p class="text-muted mb-0" id="user-title">{{ $title ?? 'Senior Software Engineer' }}</p>
                                                </div>
                                            </div>
                                    
                                            <!-- Edit Button -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                                                Edit
                                            </button>
                                        </div>
                                    
                                        <p id="user-bio">{{ $bio ?? 'Senior Software Full Time Developer' }}</p>
                                        <h5><strong>Contact Information:</strong></h5>
                                        <p>Email: {{ auth()->user()->email }}</p>
                                        <p>Phone: <span id="user-phone">{{ $phone ?? '+123 456 7890' }}</span></p>
                                    </div>
                                    
                                    <!-- Edit Modal Structure -->
                                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit Personal Information</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form id="editForm">
                                                    @csrf
                                                    <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="bio" class="form-label">Bio</label>
                                                            <textarea class="form-control" id="bio" name="bio" rows="3">{{ $bio ?? 'Senior Software Full Time Developer' }}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="phone" class="form-label">Phone</label>
                                                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $phone ?? '+123 456 7890' }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="title" class="form-label">Title</label>
                                                            <input type="text" class="form-control" id="title" name="title" value="{{ $title ?? 'Senior Software Engineer' }}">
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
                                    
                                    <script>
                                        $(document).ready(function() {
                                            // Handle form submission
                                            $('#editForm').on('submit', function(e) {
                                                e.preventDefault(); // Prevent the default form submission
                                        
                                                $.ajax({
                                                    url: '{{ route("profile.update") }}', // Ensure this matches your route
                                                    type: 'POST',
                                                    data: $(this).serialize(), // Serialize the form data
                                                    success: function(response) {
                                                        // Update personal info without reloading
                                                        $('#user-bio').text(response.bio);
                                                        $('#user-phone').text(response.phone);
                                                        $('#user-title').text(response.title); // Update title
                                        
                                                        // Close the modal
                                                        $('#editModal').modal('hide');
                                                    },
                                                    error: function(xhr) {
                                                        // Log error for debugging
                                                        console.error(xhr.responseText); // Log any error messages
                                                        alert("An error occurred. Please try again."); // Notify the user of the error
                                                    }
                                                });
                                            });
                                        
                                            // Reset the form fields when the modal is hidden
                                            $('#editModal').on('hidden.bs.modal', function () {
                                                $('#editForm')[0].reset(); // Reset the form fields
                                            });
                                        });
                                        </script>
                                        
                                    
                                        <div id="finances" class="bio-section d-none">
                                            <h5><strong>Finances:</strong></h5>
                                            <p>John manages the financial planning and budgeting for the tech department. He ensures effective resource allocation and cost control, providing regular updates and projections for operational spending.</p>
                                            
                                            <!-- Edit Button for Fees -->
                                            <h6>
                                                <i class="fas fa-money-bill-wave"></i> Fees
                                                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#editModal" style="padding: 0; margin-right: 10px; margin-left: 50%;">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                            </h6>
                                            
                                            <h6>Individual Session Cost :</h6>
                                            <p id="individual-cost-display" style="color: #939a9c;">$250 per session</p>
                                        
                                            <h6>Couple Session Cost :</h6>
                                            <p id="couple-cost-display" style="color: #939a9c;">$300 per session</p>
                                            <hr>
                                        
                                            <h6><i class="fas fa-credit-card"></i> Payment Method</h6>
                                            <p id="payment-methods-display">
                                                <span>American Express</span> 
                                                <span style="margin-left: 100px">Mastercard</span>
                                            </p>
                                            <p id="payment-methods-display-2">
                                                <span>Health Savings Account</span> 
                                                <span style="margin-left: 100px">Visa</span>
                                            </p>
                                        
                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit Finances</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
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
                                                                <div class="form-group">
                                                                    <label for="payment-methods">Payment Methods</label>
                                                                    <input type="text" class="form-control" id="payment-methods">
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary" id="save-changes">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Include Bootstrap and jQuery -->
                                        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                                        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
                                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                                        
                                        <!-- JavaScript for Modal Functionality -->
                                        <script>
                                            $(document).ready(function() {
                                                // Open modal and populate fields with current finance details
                                                $('.btn-link').click(function() {
                                                    // Get current values
                                                    const individualCost = $('#individual-cost-display').text().replace(' per session', '').replace('$', '');
                                                    const coupleCost = $('#couple-cost-display').text().replace(' per session', '').replace('$', '');
                                                    const paymentMethods = $('#payment-methods-display span').map(function() {
                                                        return $(this).text();
                                                    }).get().join(', ');
                                        
                                                    // Set the values in the modal input fields
                                                    $('#individual-cost').val(individualCost);
                                                    $('#couple-cost').val(coupleCost);
                                                    $('#payment-methods').val(paymentMethods);
                                                });
                                        
                                                // Save changes button click event
                                                $('#save-changes').click(function() {
                                                    // Get values from modal inputs
                                                    const updatedIndividualCost = $('#individual-cost').val();
                                                    const updatedCoupleCost = $('#couple-cost').val();
                                                    const updatedPaymentMethods = $('#payment-methods').val().split(', ').map(function(method) {
                                                        return <span>${method}</span>;
                                                    }).join(' <span style="margin-left: 100px"></span> ');
                                        
                                                    // Update the displayed values
                                                    $('#individual-cost-display').text($${updatedIndividualCost} per session);
                                                    $('#couple-cost-display').text($${updatedCoupleCost} per session);
                                                    $('#payment-methods-display').html(updatedPaymentMethods);
                                        
                                                    // Close the modal
                                                    $('#editModal').modal('hide');
                                                });
                                            });
                                        </script>

                                    <!-- Qualifications Section -->
                                    <div id="qualifications" class="bio-section d-none">
                                        <h5><strong>Qualifications:</strong></h5>
                                        <h5><i class="fas fa-certificate"></i> <strong>Primary Credential</strong></h5>

                                        
                                        <p><strong>Mental Health Role:</strong> Psychologist</p>                                        
                                        <p><strong>Credential Type :</strong>License</p>
                                        <p><strong>License State :</strong>USA $ New York</p>
                                        <p><strong>License Number :</strong>PSO270803</p>
                                        <p><strong>License Expiration Date :</strong>25-10</p>
                                        <hr>
                                        <h5><i class="fas fa-graduation-cap"></i> <strong>Education and Years in Practice</strong></h5>

                                        <p><strong>Education :</strong>Boston College</p>
                                        <p><strong>Degree/Diploma :</strong>MSW</p>
                                        <p><strong>Year Graduated :</strong>2018</p>
                                        <p><strong>Year ! I Begin Practice :</strong>2019</p>
                                           <hr>
                                           <h5><i class="fas fa-award"></i> <strong>Additional Credentials</strong></h5>

                                        <p><strong>Degree/Diploma :</strong>West Chester University 2024</p>
                                        <p><strong>Degree/Diploma:</strong>2024</p>

                                    </div>

                                    <!-- Specialties Section -->
<!-- Specialties Section -->
<div id="specialties" class="bio-section d-none">
    <h5><i class="fas fa-trophy"></i> Top Specialities and Experties</h5>
    <h6><stong> Top Specialities:</stong></h6> 
    <p> Women's Issues</p> 
    <p> Mood Disorders</p> 
    <p> Life Coaching</p> 
    <hr>
    <h6><i class="fa fa-exclamation-circle"></i> Issues</h6>
    <p>
        <span>Anger Management</span> 
        <span style="margin-left: 130px">Infidelity</span>
    </p> 
    <p>
        <span>Axiety</span> 
        <span style="margin-left: 220px">Marital and Premarital</span>
    </p> 
    <p>
        <span>Codependency</span> 
        <span style="margin-left: 160px">Obsessive-Compulsive(OCD)</span>
    </p> 
    <p>
        <span>Coping Skills</span> 
        <span style="margin-left: 178px">Parenting</span>
    </p>
    <p>
        <span>Depression</span> 
        <span style="margin-left: 190px">Peer Relationships</span>
    </p>
    <p>
        <span>Divorce</span> 
        <span style="margin-left: 214px">Pregnancy,Prenatal,PostPartum</span>
    </p> 
    <p>
        <span>Domestic Voilence</span> 
        <span style="margin-left: 143px">Racial Identity</span>
    </p> 
    <p>
        <span>Emotional Disturbance</span> 
        <span style="margin-left: 116px">Releationships Issue</span>
    </p> 
    <p>
        <span>Family Conflict</span> 
        <span style="margin-left: 167px">Self Esteem</span>
    </p> 



</div>                                </div>
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
