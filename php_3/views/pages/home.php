<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Show</title>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    </head>
    <body>
        <?php
        $connect = mysqli_connect("localhost", "root", "", "php3");
        $query = "SELECT * FROM data ORDER BY ID DESC";
        $result = mysqli_query($connect, $query);
        ?>
        <style>
        </style>
        <div id="info">  
            <h3 align="center">Show</h3>
            <br />  
            <div class="table-responsive">  
                <table id="employee_data" class="table table-striped table-bordered">  
                    <thead>  
                        <tr>  
                            <td>ID</td>
                            <td>Thumb</td>
                            <td>Title</td>
                        </tr>  
                    </thead>  
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";

                        echo "<td class='id'>" . $row['id'] . "</td>";
                        if (is_null($row['image'])) {
                            echo "<td></td>";
                        } else {
                            echo "<td class='img_src'><img src = " . $row['image'] . " width='150px' /></td>";
                        }

//                        echo "<td class='title'>" . $row['title'] "</td>";
                        echo '<td class="title" style=> <a href="./home.php?controller=posts&action=showPost&id='.$row['id'].'">'. $row['title'] .'</a> </td>';
//                        echo '<li class="title">
//                        <a href="./index.php?controller=posts&action=showPost&id=' . $row['id'] . '">' . $row['title'] . '</a>
//                        </li>';
                        echo "</tr>";
                    }
                    ?>  
                </table>  
            </div>  
        </div>
    </body>
</html>
<script>
    $(document).ready(function () {
        $('#employee_data').DataTable();
    });
</script> 
