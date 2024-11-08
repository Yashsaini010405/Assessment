<?php
include('includes/db.php');
 
// Query to fetch all SCP records
$sql = "SELECT * FROM scp_entries";
$result = $conn->query($sql);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SCP Records</title>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<style>
        body {
            background-color: #8a2be2; /* Purple background */
        }
        header {
            background-color: #4b0082; /* Dark purple header */
            color: white;
            text-align: center;
            padding: 20px;
        }
        footer {
            background-color: #4b0082; /* Dark purple footer */
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        table {
            margin-top: 30px;
            width: 100%;
            border-collapse: collapse;
            background-color: #fff; /* White background for table */
        }
        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd; /* Light gray border */
        }
        table th {
            background-color: #dda0dd; /* Light purple for header cells */
        }
        .btn-edit, .btn-delete, .btn-add {
            color: white;
            background-color: #1e90ff; /* Blue buttons */
        }
        .container {
            max-width: 1200px;
            margin-top: 30px;
        }
        .add-button {
            margin-top: 20px;
            text-align: center;
        }
</style>
</head>
<body>
 
<header>
<h1>SCP Foundation Records</h1>
</header>
 
<div class="container">
<h2 class="my-4">SCP Entries</h2>
 
    <!-- Add New SCP Button -->
<div class="add-button">
<a href="create.php" class="btn btn-add btn-lg">Add New SCP</a>
</div>
 
    <!-- SCP Records Table -->
<table class="table table-bordered">
<thead>
<tr>
<th>#</th>
<th>SCP Number</th>
<th>Object Class</th>
<th>Containment Procedures</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<?php while($row = $result->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['scp_number']; ?></td>
<td><?php echo $row['object_class']; ?></td>
<td><?php echo $row['containment_procedures']; ?></td>
<td><?php echo $row['description']; ?></td>
</tr>
<tr class="action-btns">
<td colspan="5">
<!-- Actions (Edit/Delete) for each SCP Record -->
<a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-edit btn-sm">Edit</a>
<a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-delete btn-sm">Delete</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
 
<!-- Footer -->
<footer>
<p>Created by Yash Saini</p>
</footer>
 
</body>
</html>
 
<?php
$conn->close();
?>
