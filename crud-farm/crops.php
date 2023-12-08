<?php
session_start();
require 'connection/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>Crops</title>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <h2>DB Admin</h2>
            <li><a href="admin.php">Dashoard</a></li>
            <li><a href="agronomic_information.php">Agronomic Information</a></li>
            <li><a href="arts_and_languages.php">Arts and Languages</a></li>
            <li><a href="common_usage.php">Common Usage</a></li>
            <li><a href="crop_cultural_significance.php">Crop Cultural Significance</a></li>
            <li><a href="crops.php">Crops</a></li>
            <li><a href="cultural_heritage.php">Cultural Heritage</a></li>
            <li><a href="governance.php">Governance</a></li>
            <li><a href="morphological_characteristic.php">Morphological Characteristic</a></li>
            <li><a href="practice.php">Practice</a></li>
            <li><a href="relationship_among_cultivars.php">Relationship Among Cultivars</a></li>
            <li><a href="ritual.php">Rituals</a></li>
            <li><a href="traditional_crop_traits.php">Traditional Crop Traits</a></li>
            <li><a href="traditional_usage.php">Traditional Usage</a></li>
            <li><a href="tribe.php">Tribe</a></li>
            <li><a href="../home.php"> Back to Website</a></li>
        </div>
    </div>

    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Crops
                            <a href="crops-create.php" class="btn btn-primary float-end">Add Crops</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Crop ID</th>
                                    <th>Crop Name</th>
                                    <th>scientific Name</th>
                                    <th>Variety Names</th>
                                    <th>Meaning of Name</th>
                                    <th>Description</th>
                                    <th>When or How Used</th>
                                    <th>Upland or Lowland</th>
                                    <th>Season</th>
                                    <th>Conservation Status</th>
                                    <th>Economic Importance</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Links</th>
                                    <th>Preservation Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = pg_query($con, "select * from crops order by crop_id");

                                if (pg_num_rows($query) > 0) {
                                    while ($crops = pg_fetch_assoc($query)) {
                                        // Your code inside the loop
                                ?>
                                        <tr>
                                            <td><?= $crops['crop_id']; ?></td>
                                            <td><?= $crops['crop_name']; ?></td>
                                            <td><?= $crops['scientific_name']; ?></td>
                                            <td><?= $crops['variety_name']; ?></td>
                                            <td><?= $crops['meaning_of_name']; ?></td>
                                            <td><?= $crops['description']; ?></td>
                                            <td><?= $crops['when_how_used']; ?></td>
                                            <td><?= $crops['upland_or_lowland']; ?></td>
                                            <td><?= $crops['season']; ?></td>
                                            <td><?= $crops['conservation_status']; ?></td>
                                            <td><?= $crops['economic_importance']; ?></td>
                                            <td><?= $crops['category']; ?></td>
                                            <td><?= $crops['image']; ?></td>
                                            <td><?= $crops['links']; ?></td>
                                            <td><?= $crops['preservation_status']; ?></td>
                                            <td>
                                                <a href="crops-view.php?crop_id=<?= $crops['crop_id']; ?>" class="btn btn-info btn-sm">View</a>
                                                <a href="crops-update.php?crop_id=<?= $crops['crop_id']; ?>" class="btn btn-success btn-sm">Update</a>
                                                <form action="code.php" method='POST' class="d-inline">
                                                    <button type="submit" name="delete_crops" value="<?= $crops['crop_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                                </form>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo '<h5>No Record Found </h5>';
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>