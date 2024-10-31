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
                <!-- Sidebar with Categories -->
                <div class="col-xl-3 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="font-size-16">My Proflie</h5>
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
                                                <img src="{{ asset(auth()->user()->image) }}" alt="Profile Image" class="rounded-circle" width="80" height="80">
                                                <div class="ms-3">
                                                    <h4 class="font-size-24 mb-0">{{ auth()->user()->name }}</h4>
                                                    <p class="text-muted mb-0" id="user-title">{{ auth()->user()->title ?? 'Senior Software Engineer' }}</p>
                                                </div>
                                            </div>
                                            
                                            <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#editModal" style="padding: 0; margin-right: 10px; margin-left: 50%;">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                        </div>
                                    
                                        <p id="user-bio">{{ auth()->user()->bio ?? 'Senior Software Full Time Developer' }}</p>
                                        <h5><strong>Contact Information:</strong></h5>
                                        <p>Email: {{ auth()->user()->email }}</p>
                                        <p>Phone: <span id="user-phone">{{ auth()->user()->phone ?? '+123 456 7890' }}</span></p>
                                    </div>
                                    
                                    <!-- Edit Modal Structure -->
                                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit Personal Information</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form id="editForm" action="{{ route('profile.update') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="bio" class="form-label">Bio</label>
                                                            <textarea class="form-control" id="bio" name="bio" rows="3">{{ auth()->user()->bio ?? 'Senior Software Full Time Developer' }}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="phone" class="form-label">Phone</label>
                                                            <input type="text" class="form-control" id="phone" name="phone" value="{{ auth()->user()->phone ?? '+123 456 7890' }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="title" class="form-label">Title</label>
                                                            <input type="text" class="form-control" id="title" name="title" value="{{ auth()->user()->title ?? 'Senior Software Engineer' }}">
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
                                                    url: $(this).attr('action'), // Use form action
                                                    type: 'POST',
                                                    data: $(this).serialize(), // Serialize the form data
                                                    success: function(response) {
                                                        // Update personal info without reloading
                                                        $('#user-bio').text(response.bio);
                                                        $('#user-phone').text(response.phone);
                                                        $('#user-title').text(response.title);
                                                        
                                                        // Close the modal
                                                        $('#editModal').modal('hide');
                                                    },
                                                    error: function(xhr) {
                                                        console.error(xhr.responseText); // Log any error messages
                                                        alert("An error occurred. Please try again."); // Notify the user of the error
                                                    }
                                                });
                                            });
                                    
                                            // Reset the form fields when the modal is hidden
                                            $('#editModal').on('hidden.bs.modal', function() {
                                                $(this).find('form')[0].reset(); // Reset the form fields
                                            });
                                        });
                                    </script>
                                                                      
                                    
                                    <div id="finances" class="bio-section d-none">
                                        <h5><strong>Finances:</strong></h5>
                                        <p>John manages the financial planning and budgeting for the tech department.</p>
                                    
                                        <!-- Edit Button for Fees and Payment Methods -->
                                        <h6>
                                            <i class="fas fa-money-bill-wave"></i> Fees & Payment Methods
                                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#editFinancesModal" style="padding: 0; margin-right: 10px; margin-left: 50%;">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                        </h6>
                                    
                                        <h6>Individual Session Cost :</h6>
                                        <p id="individual-cost-display" style="color: #939a9c;">$250 per session</p>
                                    
                                        <h6>Couple Session Cost :</h6>
                                        <p id="couple-cost-display" style="color: #939a9c;">$300 per session</p>
                                        <hr>
                                    
                                        <h6><i class="fas fa-credit-card"></i> Payment Methods</h6>
                                        <p id="payment-methods-display">
                                            <span>American Express</span>
                                            <span style="margin-left: 100px">Mastercard</span>
                                        </p>
                                        <p id="payment-methods-display-2">
                                            <span>Health Savings Account</span>
                                            <span style="margin-left: 100px">Visa</span>
                                        </p>
                                    
                                        <!-- Edit Finances Modal -->
                                        <div class="modal fade" id="editFinancesModal" tabindex="-1" role="dialog" aria-labelledby="editFinancesModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editFinancesModalLabel">Edit Finances</h5>
                                                        
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
                                                                <label for="payment-methods">Payment Methods (comma-separated)</label>
                                                                <input type="text" class="form-control" id="payment-methods">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary" id="save-finances-changes">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Include full version of jQuery and Bootstrap -->
                                    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
                                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                                    
                                    <!-- JavaScript for Modal Functionality -->
                                    <script>
                                        $(document).ready(function() {
                                            // Open modal and populate fields with current finance details
                                            $('.btn-link[data-target="#editFinancesModal"]').click(function() {
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
                                    
                                            // Save changes button click event for fees and payment methods
                                            $('#save-finances-changes').click(function() {
                                                const updatedIndividualCost = $('#individual-cost').val();
                                                const updatedCoupleCost = $('#couple-cost').val();
                                                const updatedPaymentMethods = $('#payment-methods').val().split(', ').map(function(method) {
                                                    return '<span>' + method + '</span>';
                                                }).join(' <span style="margin-left: 100px"></span> ');
                                    
                                                // Update the displayed values
                                                $('#individual-cost-display').text('$' + updatedIndividualCost + ' per session');
                                                $('#couple-cost-display').text('$' + updatedCoupleCost + ' per session');
                                                $('#payment-methods-display').html(updatedPaymentMethods);
                                    
                                                // Close the modal
                                                $('#editFinancesModal').modal('hide');
                                            });
                                        });
                                    </script>

                                  <!-- Qualifications Section -->
<div id="qualifications" class="bio-section d-none">
    <h5>
        <strong>Qualifications:</strong>
        <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#editQualificationsModal" style="padding: 0; margin-right: 10px; margin-left: 50%;">
            <i class="fas fa-edit"></i> Edit
        </button>
    </h5>

    <h5><i class="fas fa-certificate"></i> <strong>Primary Credential</strong></h5>
    <p><strong>Mental Health Role:</strong> Psychologist</p>
    <p><strong>Credential Type:</strong> License</p>
    <p><strong>License State:</strong> USA, New York</p>
    <p><strong>License Number:</strong> PSO270803</p>
    <p><strong>License Expiration Date:</strong> 25-10</p>
    <hr>

    <h5><i class="fas fa-graduation-cap"></i> <strong>Education and Years in Practice</strong></h5>
    <p><strong>Education:</strong> Boston College</p>
    <p><strong>Degree/Diploma:</strong> MSW</p>
    <p><strong>Year Graduated:</strong> 2018</p>
    <p><strong>Year I Begin Practice:</strong> 2019</p>
    <hr>

    <h5><i class="fas fa-award"></i> <strong>Additional Credentials</strong></h5>
    <p><strong>Degree/Diploma:</strong> West Chester University 2024</p>
    <p><strong>Degree/Diploma:</strong> 2024</p>
</div>

<!-- Modal for Editing Qualifications -->
<div class="modal fade" id="editQualificationsModal" tabindex="-1" aria-labelledby="editQualificationsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editQualificationsModalLabel">Edit Qualifications</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="qualificationsForm">
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
                    <div class="mb-3">
                        <label for="additionalCredentials" class="form-label">Additional Credentials</label>
                        <input type="text" class="form-control" id="additionalCredentials" value="West Chester University 2024">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveQualifications">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>document.getElementById('saveQualifications').addEventListener('click', function() {
    // Get values from the form
    const mentalHealthRole = document.getElementById('mentalHealthRole').value;
    const credentialType = document.getElementById('credentialType').value;
    const licenseState = document.getElementById('licenseState').value;
    const licenseNumber = document.getElementById('licenseNumber').value;
    const licenseExpirationDate = document.getElementById('licenseExpirationDate').value;
    const education = document.getElementById('education').value;
    const degree = document.getElementById('degree').value;
    const yearGraduated = document.getElementById('yearGraduated').value;
    const yearBeginPractice = document.getElementById('yearBeginPractice').value;
    const additionalCredentials = document.getElementById('additionalCredentials').value;

    // Here, you would typically send the data to your server using an AJAX request or fetch API
    // For demonstration purposes, we'll just log it
    console.log({
        mentalHealthRole,
        credentialType,
        licenseState,
        licenseNumber,
        licenseExpirationDate,
        education,
        degree,
        yearGraduated,
        yearBeginPractice,
        additionalCredentials
    });

    // Close the modal after saving
    $('#editQualificationsModal').modal('hide');
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
