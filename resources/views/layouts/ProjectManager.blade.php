<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Manager Dashboard</title>
    
    <!-- Bootstrap & Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            display: flex;
            height: 100vh;
            background: #f8f9fa;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: #212529;
            color: white;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .sidebar h2 {
            text-align: center;
            font-size: 22px;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 10px;
            transition: 0.3s ease-in-out;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #495057;
        }

        /* Main Content */
        .content {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .dashboard-header {
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .dashboard-header h1 {
            font-size: 24px;
            margin: 0;
        }

        .dashboard-header .user-info {
            font-size: 16px;
            font-weight: bold;
            color: #343a40;
        }

        /* Cards */
        .card-box {
            display: flex;
            gap: 20px;
        }

        .card {
            flex: 1;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card i {
            font-size: 30px;
            margin-bottom: 10px;
            color: #0d6efd;
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                height: auto;
                text-align: center;
            }
            .sidebar a {
                justify-content: center;
            }
            .card-box {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
   <aside class="sidebar">
    <h2>Project Manager</h2>
    <nav>
        <a href="{{ route('manager.projectmanager') }}" class="active"><i class="fas fa-home"></i> Dashboard</a>
        <a href=""><i class="fas fa-tasks"></i> Activities</a>
        <a href="#"><i class="fas fa-chart-line"></i> Reports</a>
        <a href=""><i class="fas fa-users"></i> User Management</a>
    </nav>
</aside>


    <!-- Main Content -->
    <div class="content">
        <div class="dashboard-header">
            <h1>Welcome to Project Manager Dashboard</h1>
            <div class="user-info">Hello, Admin</div>
        </div>

        <!-- Dashboard Cards -->
        <div class="card-box">
            <div class="card">
                <i class="fas fa-users"></i>
                <h4>Manage Users</h4>
                <p>View, Edit, and Manage Users</p>
            </div>
            <div class="card">
                <i class="fas fa-file-alt"></i>
                <h4>Generate Reports</h4>
                <p>View and Download Reports</p>
            </div>
            <div class="card">
                <i class="fas fa-tasks"></i>
                <h4>Project Activities</h4>
                <p>Track and Monitor Activities</p>
            </div>
        </div>

        <!-- Dynamic Content -->
       
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
