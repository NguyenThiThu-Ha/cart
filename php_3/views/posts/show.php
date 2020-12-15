<!DOCTYPE html>
<html>
    <head>
        <base href="/php3/">

        <style>
            table, td, th {
                border: 1px solid black;
            }

            .header {
                float: left;
                display: inline-block;
            }



            button{
                background-color: blue;
                color: white; 
            }

            table {
                border-collapse: collapse;
                width: 100%;
            }

            .id{
                width: 5%;
            }

            .thumb{
                width: 20%;
            }

            .title{
                width: 35%;
            }

            td {
                height: 80px;
                vertical-align: bottom;
            }
        </style>
    </head>
    <body>

        <div class="header">
            <h2>Frontend List</h2>
        </div>

        <div class="btn">  
            <!-- <button onclick="history.go(-1);">Home </button> -->
            <button onclick="location.href = 'index.php?controller=posts'">Home </button>
        </div>
        <table>
            <tr>
                <th class="id">ID</th>
                <th class="thumb">Thumb</th>
                <th class="title">Title</th>

            </tr>

            <?php
            foreach ($data as $user) {
//                echo "<tr>";

                echo "<td style='text-align:center; vertical-align:middle;'>" . $user->id . "</td>";

                if (is_null($user->image)) {
                    echo "<td></td>";
                } else {
                    echo "<td class='img_src'><img src = " . $user->image . " width='150px' /></td>";
                }                
                echo "<td style='vertical-align:top;'>" . $user->title . "</td>";

                echo "</tr>";
            }
            ?>

        </table>

    </body>
</html>
