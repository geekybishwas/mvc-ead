<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Job Management Pro - Dashboard</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --danger-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --card-shadow-hover: 0 20px 40px rgba(0, 0, 0, 0.15);
            --border-radius: 16px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        /* Header Styles */
        .header-section {
            background: var(--primary-gradient);
            color: white;
            padding: 4rem 0;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
        }

        .header-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 20"><defs><radialGradient id="a" cx="50%" cy="40%"><stop offset="0%" stop-color="%23ffffff" stop-opacity="0.1"/><stop offset="100%" stop-color="%23ffffff" stop-opacity="0"/></radialGradient></defs><rect width="100%" height="100%" fill="url(%23a)"/></svg>');
        }

        .header-content {
            position: relative;
            z-index: 2;
        }

        .header-title {
            font-weight: 700;
            font-size: 3.5rem;
            margin-bottom: 1rem;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .header-subtitle {
            font-weight: 300;
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 0;
        }

        .header-btn {
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
            border-radius: var(--border-radius);
            padding: 1rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .header-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
        }

        /* Stats Cards */
        .stats-section {
            margin-bottom: 3rem;
        }

        .stat-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--card-shadow);
            border: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-shadow-hover);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            margin-bottom: 1rem;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #2d3748;
        }

        .stat-label {
            color: #718096;
            font-weight: 500;
            margin: 0;
        }

        /* Job Cards */
        .job-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            border: none;
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        .job-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .job-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--card-shadow-hover);
        }

        .job-card:hover::before {
            transform: scaleX(1);
        }

        .job-card-body {
            padding: 2rem;
        }

        .job-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .job-meta {
            color: #718096;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .job-description {
            color: #4a5568;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .job-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-action {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .btn-action:hover {
            transform: scale(1.1);
        }

        .btn-view {
            background: var(--success-gradient);
            color: white;
        }

        .btn-edit {
            background: linear-gradient(135deg, #ffeaa7 0%, #fdcb6e 100%);
            color: #2d3748;
        }

        .btn-delete {
            background: var(--danger-gradient);
            color: white;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 5rem 2rem;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            margin: 2rem 0;
        }

        .empty-icon {
            font-size: 5rem;
            color: #cbd5e0;
            margin-bottom: 2rem;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .empty-title {
            font-size: 2rem;
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 1rem;
        }

        .empty-subtitle {
            color: #718096;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        /* Modal Enhancements */
        .modal-content {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
        }

        .modal-header {
            border-bottom: none;
            padding: 2rem 2rem 1rem;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
        }

        .modal-body {
            padding: 1rem 2rem;
        }

        .modal-footer {
            border-top: none;
            padding: 1rem 2rem 2rem;
        }

        .form-control {
            border-radius: 12px;
            border: 2px solid #e2e8f0;
            padding: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-label {
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 0.75rem;
        }

        /* Button Styles */
        .btn-primary {
            background: var(--primary-gradient);
            border: none;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .btn-success {
            background: var(--success-gradient);
            border: none;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
        }

        .btn-warning {
            background: linear-gradient(135deg, #ffeaa7 0%, #fdcb6e 100%);
            border: none;
            color: #2d3748;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
        }

        .btn-danger {
            background: var(--danger-gradient);
            border: none;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
        }

        .btn-secondary {
            background: #e2e8f0;
            border: none;
            color: #4a5568;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
        }

        /* Loading Animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-right: 0.5rem;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Alert Styles */
        .custom-alert {
            border-radius: 12px;
            border: none;
            backdrop-filter: blur(10px);
            box-shadow: var(--card-shadow);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-title {
                font-size: 2.5rem;
            }
            
            .job-card-body {
                padding: 1.5rem;
            }
            
            .btn-action {
                width: 36px;
                height: 36px;
            }
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <div class="header-section">
        <div class="container header-content">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="header-title">
                        <i class="fas fa-briefcase me-3"></i>Job Management Pro
                    </h1>
                    <p class="header-subtitle">Professional job management dashboard with advanced features</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <button class="btn header-btn btn-lg" data-bs-toggle="modal" data-bs-target="#createModal">
                        <i class="fas fa-plus me-2"></i>Create New Job
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Stats Section -->
        <div class="stats-section">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card stat-card">
                        <div class="stat-icon" style="background: var(--primary-gradient);">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="stat-number">{{ count($data['posts']) }}</div>
                        <p class="stat-label">Total Jobs</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card stat-card">
                        <div class="stat-icon" style="background: var(--success-gradient);">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="stat-number">{{ count($data['posts']) > 0 ? '100%' : '0%' }}</div>
                        <p class="stat-label">Active Rate</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card stat-card">
                        <div class="stat-icon" style="background: var(--danger-gradient);">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-number">{{ count($data['posts']) > 0 ? $data['posts'][0]->created_at->diffForHumans() : 'N/A' }}</div>
                        <p class="stat-label">Last Updated</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card stat-card">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #ffeaa7 0%, #fdcb6e 100%);">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="stat-number">4.9</div>
                        <p class="stat-label">Rating</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jobs Grid -->
        <div class="row" id="jobsContainer">
            @forelse ($data['posts'] as $post)
                <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                    <div class="card job-card h-100">
                        <div class="job-card-body">
                            <h5 class="job-title">{{ $post->title }}</h5>
                            <div class="job-meta">
                                <i class="fas fa-calendar-alt"></i>
                                <span>{{ $post->created_at->format('M d, Y') }}</span>
                                <span class="badge bg-success ms-2">Active</span>
                            </div>
                            <p class="job-description">{{ $post->description }}</p>
                            <div class="job-actions">
                                <button class="btn btn-action btn-view" onclick="viewPost({{ $post->id }})" title="View Job">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-action btn-edit" onclick="editPost({{ $post->id }}, '{{ addslashes($post->title) }}', `{{ addslashes($post->description) }}`)" title="Edit Job">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-action btn-delete" onclick="deletePost({{ $post->id }}, '{{ $post->title }}')" title="Delete Job">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h3 class="empty-title">No Jobs Available</h3>
                        <p class="empty-subtitle">Start building your job portfolio by creating your first job posting</p>
                        <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#createModal">
                            <i class="fas fa-plus me-2"></i>Create Your First Job
                        </button>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Create Job Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-plus me-2"></i>Create New Job Position
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form id="createForm" action="{{ route('post.create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-4">
                            <label for="createTitle" class="form-label">Job Title *</label>
                            <input type="text" name="title" class="form-control" id="createTitle"
                                placeholder="e.g. Senior Frontend Developer" required>
                        </div>
                        <div class="mb-4">
                            <label for="createDescription" class="form-label">Job Description *</label>
                            <textarea name="description" id="createDescription" class="form-control"
                                rows="6" placeholder="Provide a detailed description of the job role, responsibilities, and requirements..." required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Create Job
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Job Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title">
                        <i class="fas fa-edit me-2"></i>Update Job Position
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editForm" method="POST" action="{{ route('post.edit', ['post' => ':postId']) }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-4">
                            <label for="editTitle" class="form-label">Job Title *</label>
                            <input type="text" class="form-control" id="editTitle" name="title" required>
                        </div>
                        <div class="mb-4">
                            <label for="editDescription" class="form-label">Job Description *</label>
                            <textarea class="form-control" id="editDescription" name="description" rows="6" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save me-2"></i>Update Job
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-exclamation-triangle me-2"></i>Confirm Deletion
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-3">
                        <i class="fas fa-trash-alt fa-4x text-danger mb-3"></i>
                        <p class="fs-5">Are you sure you want to delete this job?</p>
                    </div>
                    <div class="alert alert-warning custom-alert">
                        <i class="fas fa-briefcase me-2"></i>
                        <strong>Job Title:</strong> <span id="deletePostTitle"></span>
                    </div>
                    <p class="text-muted text-center">
                        <i class="fas fa-info-circle me-1"></i>
                        This action cannot be undone. All associated data will be permanently removed.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keep Job</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                        <i class="fas fa-trash me-2"></i>Delete Forever
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- View Job Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-eye me-2"></i>Job Details
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-4">
                                <h3 id="viewTitle" class="job-title mb-3"></h3>
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <span class="badge bg-success">Active Position</span>
                                    <span class="job-meta" id="viewMeta">
                                        <i class="fas fa-calendar-alt me-1"></i>
                                        <span id="viewDate"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h5 class="mb-3">Job Description</h5>
                                <div id="viewContent" class="job-description" style="white-space: pre-wrap;"></div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card" style="background: #f8f9fa;">
                                <div class="card-body">
                                    <h6 class="mb-3">Job Information</h6>
                                    <div class="mb-2">
                                        <small class="text-muted d-block">Status</small>
                                        <span class="badge bg-success">Active</span>
                                    </div>
                                    <div class="mb-2">
                                        <small class="text-muted d-block">Posted Date</small>
                                        <span id="viewPostedDate"></span>
                                    </div>
                                    <div class="mb-2">
                                        <small class="text-muted d-block">Last Updated</small>
                                        <span id="viewUpdatedDate"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="editCurrentPost()">
                        <i class="fas fa-edit me-2"></i>Edit Job
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let posts = @json($data['posts']);
        let currentViewingPost = null;

        // Enhanced view function
        function viewPost(postId) {
            const post = posts.find(p => p.id === postId);
            if (post) {
                currentViewingPost = post;
                document.getElementById('viewTitle').textContent = post.title;
                document.getElementById('viewContent').textContent = post.description;
                
                const createdDate = new Date(post.created_at);
                const updatedDate = new Date(post.updated_at);
                
                document.getElementById('viewDate').textContent = createdDate.toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
                document.getElementById('viewPostedDate').textContent = createdDate.toLocaleDateString();
                document.getElementById('viewUpdatedDate').textContent = updatedDate.toLocaleDateString();

                new bootstrap.Modal(document.getElementById('viewModal')).show();
            }
        }

        // Edit from view modal
        function editCurrentPost() {
            if (currentViewingPost) {
                bootstrap.Modal.getInstance(document.getElementById('viewModal')).hide();
                setTimeout(() => {
                    editPost(currentViewingPost.id, currentViewingPost.title, currentViewingPost.description);
                }, 300);
            }
        }

        // Enhanced edit function
        function editPost(postId, title, description) {
            const form = document.getElementById('editForm');
            
            if (!form.dataset.actionTemplate) {
                form.dataset.actionTemplate = form.action;
            }
            form.action = form.dataset.actionTemplate.replace(':postId', postId);

            document.getElementById('editTitle').value = title;
            document.getElementById('editDescription').value = description;

            new bootstrap.Modal(document.getElementById('editModal')).show();
        }

        // Enhanced delete function
        function deletePost(postId, title) {
            document.getElementById('deletePostTitle').textContent = title;

            document.getElementById('confirmDeleteBtn').onclick = function () {
                // Add loading state
                this.innerHTML = '<span class="loading"></span>Deleting...';
                this.disabled = true;

                fetch(`/delete/${postId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    if (!response.ok) throw new Error('Failed to delete');
                    return response.json();
                })
                .then(data => {
                    showAlert('Job deleted successfully!', 'success');
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                })
                .catch(error => {
                    console.error(error);
                    showAlert('Error deleting job. Please try again.', 'danger');
                    // Reset button
                    document.getElementById('confirmDeleteBtn').innerHTML = '<i class="fas fa-trash me-2"></i>Delete Forever';
                    document.getElementById('confirmDeleteBtn').disabled = false;
                });
            };

            new bootstrap.Modal(document.getElementById('deleteModal')).show();
        }

        // Enhanced alert function
        function showAlert(message, type) {
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type} alert-dismissible fade show position-fixed custom-alert`;
            alertDiv.style.cssText = 'top: 30px; right: 30px; z-index: 9999; min-width: 350px; animation: slideIn 0.3s ease;';
            
            const icon = type === 'success' ? 'check-circle' : type === 'danger' ? 'exclamation-triangle' : 'info-circle';
            
            alertDiv.innerHTML = `
                <i class="fas fa-${icon} me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;

            document.body.appendChild(alertDiv);

            // Auto remove after 5 seconds
            setTimeout(() => {
                if (alertDiv.parentNode) {
                    alertDiv.style.animation = 'slideOut 0.3s ease';
                    setTimeout(() => alertDiv.remove(), 300);
                }
            }, 5000);
        }

        // Add CSS animations
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            @keyframes slideOut {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(100%); opacity: 0; }
            }
        `;
        document.head.appendChild(style);

        // Add loading states to forms
        document.getElementById('createForm').addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<span class="loading"></span>Creating Job...';
            submitBtn.disabled = true;
        });

        document.getElementById('editForm').addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<span class="loading"></span>Updating Job...';
            submitBtn.disabled = true;
        });

        // Initialize tooltips if needed
        document.addEventListener('DOMContentLoaded', function() {
            // Add any initialization code here
            console.log('Job Management Pro initialized');
        });
    </script>
</body>

</html>