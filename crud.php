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

   // Email validation using preg_match
if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
    $error = "Invalid email format!";
}
    // Phone validation: only digits, length 10–15
    elseif (!preg_match('/^\d{10,15}$/', $phone)) {
        $error = "Phone number must be 10 to 15 digits long!";
    } else {
        if ($id) {
            // Update
            $stmt = $conn->prepare("UPDATE sufian SET userName=?, email=?, phone=? WHERE id=?");
            $stmt->bind_param("sssi", $userName, $email, $phone, $id);
        } else {
            // Insert
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
<html>
<head>
    <title>PHP CRUD - One Page</title>
    <style>
        body { font-family: Arial; margin: 30px; }
        form { margin-bottom: 20px; }
        input { padding: 6px; margin: 4px; }
        table { border-collapse: collapse; width: 80%; }
        th, td { padding: 8px; border: 1px solid #ccc; text-align: center; }
        .error { color: red; }
    </style>
</head>
<body>

<h2><?= $editData['id'] ? 'Edit' : 'Add' ?> User</h2>
<form method="post">
    <input type="hidden" name="id" value="<?= htmlspecialchars($editData['id']) ?>">
    <input type="text" name="userName" placeholder="Username" value="<?= htmlspecialchars($editData['userName']) ?>" required>
    <input type="text" name="email" placeholder="Email" value="<?= htmlspecialchars($editData['email']) ?>" required>
    <input type="text" name="phone" placeholder="Phone (10–15 digits)" value="<?= htmlspecialchars($editData['phone']) ?>" required>
    <button type="submit"><?= $editData['id'] ? 'Update' : 'Add' ?></button>
</form>
<?php if ($error): ?>
    <p class="error"><?= $error ?></p>
<?php endif; ?>

<h2>All Users</h2>
<table>
    <tr>
       <th>Username</th><th>Email</th><th>Phone</th><th>Actions</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM sufian ORDER BY id DESC");
    while ($row = $result->fetch_assoc()):
    ?>
    <tr>
        <!-- <td><?= $row['id'] ?></td> -->
        <td><?= htmlspecialchars($row['userName']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['phone']) ?></td>
        <td>
            <a href="?edit=<?= $row['id'] ?>">Edit</a> |
            <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html> 