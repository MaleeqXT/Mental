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
                                                <img src="{{ asset('auth/assets/images/users/avatar-7.jpg') }}" alt="Profile Image" class="rounded-circle" width="80" height="80">
                                                <div class="ms-3">
                                                    <h4 class="font-size-24 mb-0">{{ auth()->user()->name }}</h4>
                                                    <p class="text-muted mb-0" id="titleDisplay">Senior Software Engineer</p> <!-- Static title -->
                                                </div>
                                            </div>
                                    
                                            <!-- Edit Button -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                                                Edit
                                            </button>
                                        </div>
                                    
                                        <!-- Additional Personal Info -->
                                        <p id="bioDisplay">
                                            Senior Software Full-Time Developer with over 8 years of experience in designing, developing, and deploying high-performance applications. Proficient in a variety of programming languages, including JavaScript, PHP, and Python, with a strong focus on Laravel and web development.                        </p>
                                                                                <h5><strong>Contact Information:</strong></h5>
                                        <p>{{ auth()->user()->email }}</p> <!-- Static email -->
                                        <p id="phoneDisplay">Phone: +123 456 7890</p> <!-- Static phone -->
                                    
                                        <!-- Hidden User ID -->
                                        <input type="hidden" id="user_id" value="1"> <!-- Static user ID -->
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
                                                    <input type="hidden" id="user_id" name="user_id" value="1"> <!-- Static user ID -->
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="title" class="form-label">Title</label>
                                                            <input type="text" class="form-control" id="title" name="title" value="Senior Software Engineer"> <!-- Static default value -->
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="bio" class="form-label">Bio</label>
                                                            <textarea class="form-control" id="bio" name="bio" rows="3">Senior Software Full Time Developer</textarea> <!-- Static default value -->
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="phone" class="form-label">Phone</label>
                                                            <input type="text" class="form-control" id="phone" name="phone" value="+123 456 7890"> <!-- Static default value -->
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
                                            $('#editForm').on('submit', function(e) {
                                                e.preventDefault(); // Prevent the default form submission
                                    
                                                // Prepare form data
                                                var formData = {
                                                    user_id: $('#user_id').val(),
                                                    bio: $('#bio').val(),
                                                    phone: $('#phone').val(),
                                                    title: $('#title').val(),
                                                    _token: '{{ csrf_token() }}' // Add CSRF token
                                                };
                                    
                                                $.ajax({
                                                    url: '/profile/update', // Use the inline route for updating
                                                    type: 'POST',
                                                    data: formData, // Send the prepared data
                                                    success: function(response) {
                                                        // Update displayed user info without reloading the page
                                                        $('#bioDisplay').text(response.bio || 'Senior Software Full Time Developer'); // Update bio display
                                                        $('#phoneDisplay').text('Phone: ' + (response.phone || '+123 456 7890')); // Update phone display
                                                        $('#titleDisplay').text(response.title || 'Senior Software Engineer'); // Update title display
                                    
                                                        // Close the modal
                                                        $('#editModal').modal('hide');
                                                    },
                                                    error: function(xhr) {
                                                        // Handle errors here, show a message if needed
                                                        alert("An error occurred. Please try again.");
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    
                                    <!-- Finances Section -->
                                    <div id="finances" class="bio-section d-none">
                                        <h5><strong>Finances:</strong></h5>
                                        <p>John manages the financial planning and budgeting for the tech department. He ensures effective resource allocation and cost control, providing regular updates and projections for operational spending.</p>
                                        <h5><strong>Financial Insights:</strong></h5>
                                        <ul>
                                            <li>Department Budget: $500,000 annually</li>
                                            <li>Expense Management: Regular oversight of project expenditures and monthly reports</li>
                                            <li>Investment Plans: Initiatives for technology upgrades and resource optimization</li>
                                        </ul>
                                    </div>

                                    <!-- Qualifications Section -->
                                    <div id="qualifications" class="bio-section d-none">
                                        <h5><strong>Qualifications:</strong></h5>
                                        <p>John holds a Bachelor’s degree in Computer Science from Stanford University and is a certified full-stack developer. He has a strong foundation in both theory and practical application, making him proficient in both backend and frontend technologies.</p>
                                        <h5><strong>Certifications & Courses:</strong></h5>
                                        <ul>
                                            <li>Bachelor’s in Computer Science from Stanford University</li>
                                            <li>Certified Full-Stack Developer</li>
                                            <li>Advanced JavaScript and React - Coursera</li>
                                            <li>Machine Learning Basics - Udacity</li>
                                        </ul>
                                    </div>

                                    <!-- Specialties Section -->
                                    <div id="specialties" class="bio-section d-none">
                                        <h5><strong>Specialties:</strong></h5>
                                        <p>John’s technical skills are diverse and include expertise in software architecture, REST API design, and DevOps. His projects often focus on building efficient systems with a strong emphasis on performance and scalability.</p>
                                        <h5><strong>Technical Expertise:</strong></h5>
                                        <ul>
                                            <li>Programming Languages: PHP, JavaScript, Python</li>
                                            <li>Frameworks: Laravel, Vue.js, Express</li>
                                            <li>Databases: MySQL, PostgreSQL, MongoDB</li>
                                            <li>Tools & Platforms: Docker, AWS, Git</li>
                                        </ul>
                                    </div>
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
