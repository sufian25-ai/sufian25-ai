<?php
// DB connection
$conn = new mysqli("localhost", "root", "", "crud_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert or Update
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? '';
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format!";
    }
    // Phone validation: only digits, length 10–15
    elseif (!preg_match('/^\d{10,15}$/', $phone)) {
        $error = "Phone number must be 10 to 15 digits long!";
    } else {
        if ($id) {
            $stmt = $conn->prepare("UPDATE sufian SET userName=?, email=?, phone=? WHERE id=?");
            $stmt->bind_param("sssi", $userName, $email, $phone, $id);
        } else {
            $stmt = $conn->prepare("INSERT INTO sufian (userName, email, phone) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $userName, $email, $phone);
        }
        $stmt->execute();
        header("Location: index.php");
        exit;
    }
}

// Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM sufian WHERE id=$id");
    header("Location: index.php");
    exit;
}

// Edit
$editData = ['id' => '', 'userName' => '', 'email' => '', 'phone' => ''];
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $res = $conn->query("SELECT * FROM sufian WHERE id=$id");
    $editData = $res->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP CRUD - One Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="mb-4"><?= $editData['id'] ? 'Edit' : 'Add New' ?> User</h3>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($editData['id']) ?>">

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="userName" class="form-control" value="<?= htmlspecialchars($editData['userName']) ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" value="<?= htmlspecialchars($editData['email']) ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($editData['phone']) ?>" required placeholder="10–15 digit number">
            </div>

            <button type="submit" class="btn btn-primary"><?= $editData['id'] ? 'Update' : 'Add' ?> User</button>
            <?php if ($editData['id']): ?>
                <a href="index.php" class="btn btn-secondary ms-2">Cancel</a>
            <?php endif; ?>
        </form>
    </div>

    <div class="card shadow mt-5">
        <div class="card-body">
            <h4 class="card-title mb-4">All Users</h4>

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th style="width: 120px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $result = $conn->query("SELECT * FROM sufian ORDER BY id DESC");
                while ($row = $result->fetch_assoc()):
                ?>
                    <tr>
                        <td><?= htmlspecialchars($row['userName']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['phone']) ?></td>
                        <td>
                            <a href="?edit=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="?delete=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this user?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

</body>
</html>
