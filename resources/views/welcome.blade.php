<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Record Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #7c3aed;
            --primary-light: #f5f3ff;
            --primary-hover: #6d28d9;
            --secondary: #8b5cf6;
            --text-main: #1f2937;
            --text-muted: #6b7280;
            --bg-color: #f9fafb;
            --card-bg: #ffffff;
            --border: #e5e7eb;
            --success: #10b981;
            --success-bg: #d1fae5;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            line-height: 1.6;
        }

        /* Navbar */
        .navbar {
            background: var(--card-bg);
            padding: 1rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--shadow-sm);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-muted);
            font-weight: 500;
            transition: var(--transition);
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--primary);
        }

        /* Container */
        .container {
            padding: 2rem 5%;
            width: 100%;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--primary-light) 0%, #e0e7ff 100%);
            border-radius: 20px;
            padding: 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-md);
            gap: 2rem;
        }

        .hero-left h1 {
            font-size: 2.5rem;
            color: #312e81;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero-left p {
            font-size: 1.1rem;
            color: var(--text-muted);
            margin-bottom: 1.5rem;
        }

        /* Student Card */
        .student-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            padding: 2rem;
            border-radius: 16px;
            min-width: 300px;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(255, 255, 255, 0.5);
            transition: var(--transition);
        }

        .student-card:hover {
            transform: translateY(-5px);
        }

        .student-card h2 {
            color: var(--primary);
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border-bottom: 2px solid var(--primary-light);
            padding-bottom: 0.5rem;
        }

        .info-row {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
            background: var(--bg-color);
            padding: 0.75rem;
            border-radius: 8px;
        }

        .info-icon {
            background: var(--primary-light);
            color: var(--primary);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .info-details p {
            font-size: 0.85rem;
            color: var(--text-muted);
            line-height: 1;
            margin-bottom: 0.25rem;
        }

        .info-details strong {
            color: var(--text-main);
        }

        /* Controls Area */
        .controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .search-box {
            position: relative;
            flex: 1;
            max-width: 400px;
        }

        .search-box input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            outline: none;
            transition: var(--transition);
            font-size: 0.95rem;
        }

        .search-box input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
        }

        .search-box i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: var(--transition);
            box-shadow: var(--shadow-sm);
        }

        .btn-primary:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* Stats */
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .stat-card {
            background: var(--card-bg);
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: var(--transition);
            border: 1px solid var(--border);
        }

        .stat-card:hover {
            box-shadow: var(--shadow-md);
            border-color: var(--primary-light);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            background: var(--primary-light);
            color: var(--primary);
        }

        .stat-info h3 {
            font-size: 1.5rem;
            color: var(--text-main);
            line-height: 1;
            margin-bottom: 0.25rem;
        }

        .stat-info p {
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        /* Table */
        .table-container {
            background: var(--card-bg);
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
            overflow-x: auto;
        }

        .table-header {
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-header h2 {
            font-size: 1.25rem;
            color: var(--text-main);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--border);
        }

        th {
            background: var(--bg-color);
            color: var(--text-muted);
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        tr {
            transition: var(--transition);
        }

        tbody tr:hover {
            background: var(--bg-color);
        }

        .status-badge {
            background: var(--success-bg);
            color: var(--success);
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-block;
        }

        /* Modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            backdrop-filter: blur(4px);
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal {
            background: var(--card-bg);
            width: 100%;
            max-width: 500px;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: var(--shadow-lg);
            transform: translateY(20px);
            transition: var(--transition);
        }

        .modal-overlay.active .modal {
            transform: translateY(0);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid var(--border);
            padding-bottom: 1rem;
        }

        .modal-header h2 {
            font-size: 1.25rem;
            color: var(--text-main);
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 1.25rem;
            color: var(--text-muted);
            cursor: pointer;
            transition: var(--transition);
        }

        .close-btn:hover {
            color: #ef4444;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-main);
            font-weight: 500;
            font-size: 0.9rem;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            outline: none;
            transition: var(--transition);
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
        }

        .modal-footer {
            margin-top: 2rem;
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }

        .btn-outline {
            background: transparent;
            color: var(--text-muted);
            border: 1px solid var(--border);
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition);
        }

        .btn-outline:hover {
            background: var(--bg-color);
            color: var(--text-main);
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 2rem;
            color: var(--text-muted);
            margin-top: 2rem;
            border-top: 1px solid var(--border);
        }

        .footer-content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-weight: 500;
        }

        .footer-content i {
            color: #ef4444;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
                text-align: center;
            }

            .nav-links {
                display: none;
            }

            .controls {
                flex-direction: column;
                align-items: stretch;
            }

            .search-box {
                max-width: 100%;
            }

            .table-container {
                padding: 1rem;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <i class="fa-solid fa-graduation-cap"></i>
            Student Record Management System
        </div>
        <ul class="nav-links">
            <li><a href="#" class="active">Home</a></li>
            <li><a href="#">Students</a></li>
            <li><a href="#">Departments</a></li>
            <li><a href="#">About</a></li>
        </ul>
    </nav>

    <div class="container">
        <!-- Hero Section -->
        <div class="hero">
            <div class="hero-left">
                <h1>Student Record <br>Management System</h1>
                <p>Manage student records efficiently using Laravel. Experience a seamless and modern interface for
                    educational administration.</p>
            </div>

            <div class="student-card">
                <h2><i class="fa-solid fa-id-badge"></i> Profile Card</h2>

                <div class="info-row">
                    <div class="info-icon"><i class="fa-solid fa-user"></i></div>
                    <div class="info-details">
                        <p>Name</p>
                        <strong>Justin Sunil</strong>
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-icon"><i class="fa-solid fa-hashtag"></i></div>
                    <div class="info-details">
                        <p>Roll Number</p>
                        <strong>5024126</strong>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controls Area -->
        <div class="controls">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="searchInput" placeholder="Search Student...">
            </div>
            <button class="btn-primary" onclick="openModal()">
                <i class="fa-solid fa-plus"></i> Add New Student
            </button>
        </div>

        <!-- Stats Section -->
        <div class="stats">
            <div class="stat-card">
                <div class="stat-icon" style="color: #3b82f6; background: #eff6ff;">
                    <i class="fa-solid fa-users"></i>
                </div>
                <div class="stat-info">
                    <h3 id="totalCount">0</h3>
                    <p>Total Students</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="color: #10b981; background: #d1fae5;">
                    <i class="fa-solid fa-user-check"></i>
                </div>
                <div class="stat-info">
                    <h3 id="activeCount">0</h3>
                    <p>Active Students</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="color: #f59e0b; background: #fef3c7;">
                    <i class="fa-solid fa-building"></i>
                </div>
                <div class="stat-info">
                    <h3>3</h3>
                    <p>Departments</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="color: #8b5cf6; background: #f5f3ff;">
                    <i class="fa-solid fa-book"></i>
                </div>
                <div class="stat-info">
                    <h3>8</h3>
                    <p>Courses</p>
                </div>
            </div>
        </div>

        <!-- Records Table -->
        <div class="table-container">
            <div class="table-header">
                <h2>Recent Student Records</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Roll Number</th>
                        <th>Department</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="studentTableBody">

                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Form -->
    <div class="modal-overlay" id="studentModal">
        <div class="modal">
            <div class="modal-header">
                <h2>Add New Student</h2>
                <button class="close-btn" onclick="closeModal()">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <form id="addStudentForm">
                <div class="form-group">
                    <label>Student Name</label>
                    <input type="text" id="studentName" placeholder="Enter student name" required>
                </div>
                <div class="form-group">
                    <label>Roll Number</label>
                    <input type="text" id="studentRoll" placeholder="Enter roll number" required>
                </div>
                <div class="form-group">
                    <label>Department</label>
                    <select id="studentDept" required>
                        <option value="" disabled selected>Select department</option>
                        <option value="CS">Computer Science</option>
                        <option value="IT">Information Technology</option>
                        <option value="EC">Electronics</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" id="studentEmail" placeholder="Enter email address" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-outline" onclick="closeModal()">Cancel</button>
                    <button type="submit" class="btn-primary">Save Student</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            Built with Laravel <i class="fa-solid fa-heart"></i> | Justin Sunil | Roll Number: 5024126
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Modal functionality
        const modal = document.getElementById('studentModal');

        function openModal() {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        }

        function closeModal() {
            modal.classList.remove('active');
            document.body.style.overflow = 'auto'; // Restore scrolling
        }

        // Close modal when clicking outside
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });

        // Close on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modal.classList.contains('active')) {
                closeModal();
            }
        });

        // Table element and starting ID
        const tableBody = document.getElementById('studentTableBody');
        let currentId = 1;

        // Stats elements
        const totalStudentsElem = document.getElementById('totalCount');
        const activeStudentsElem = document.getElementById('activeCount');

        // Add Student Logic
        const addStudentForm = document.getElementById('addStudentForm');
        addStudentForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get values
            const name = document.getElementById('studentName').value;
            const roll = document.getElementById('studentRoll').value;
            const deptSelect = document.getElementById('studentDept');
            const dept = deptSelect.options[deptSelect.selectedIndex].text;
            const email = document.getElementById('studentEmail').value;
            
            // Create new row
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>#${currentId}</td>
                <td>${name}</td>
                <td>${roll}</td>
                <td>${dept}</td>
                <td>${email}</td>
                <td><span class="status-badge">Active</span></td>
                <td>
                    <button class="btn-remove" style="background: none; border: none; color: #ef4444; cursor: pointer; padding: 0.25rem 0.5rem; border-radius: 4px; transition: all 0.2s;" onmouseover="this.style.background='#fee2e2'" onmouseout="this.style.background='none'">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            `;
            
            // Remove functionality
            const removeBtn = newRow.querySelector('.btn-remove');
            removeBtn.addEventListener('click', function() {
                newRow.remove();
                // Decrement stats
                if (totalStudentsElem && activeStudentsElem) {
                    totalStudentsElem.textContent = parseInt(totalStudentsElem.textContent) - 1;
                    activeStudentsElem.textContent = parseInt(activeStudentsElem.textContent) - 1;
                }
            });
            
            // Append to table
            tableBody.appendChild(newRow);
            
            // Increment ID
            currentId++;
            
            // Update stats
            if (totalStudentsElem && activeStudentsElem) {
                totalStudentsElem.textContent = parseInt(totalStudentsElem.textContent) + 1;
                activeStudentsElem.textContent = parseInt(activeStudentsElem.textContent) + 1;
            }
            
            // Reset form and close modal
            addStudentForm.reset();
            closeModal();
        });

        // Search Logic
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = tableBody.getElementsByTagName('tr');
            
            for (let i = 0; i < rows.length; i++) {
                const name = rows[i].getElementsByTagName('td')[1].textContent.toLowerCase();
                const roll = rows[i].getElementsByTagName('td')[2].textContent.toLowerCase();
                const email = rows[i].getElementsByTagName('td')[4].textContent.toLowerCase();
                
                if (name.includes(searchTerm) || roll.includes(searchTerm) || email.includes(searchTerm)) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        });
    </script>
</body>

</html>