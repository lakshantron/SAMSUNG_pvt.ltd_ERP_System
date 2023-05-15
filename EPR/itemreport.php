<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link rel="stylesheet" href="review.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header>
        <h1>
       S A M S U N G    
    </h1>
    </header>

    <nav>
    <ul>
       <li><a href="http://localhost/xampp/EPR/homepage.php">HOME</a></li>
    
    </ul>
    </nav>

    <h2>Review Item</h2>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Review thr Records</h4>
                        
                        </div>
                    <div class="card-body">
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Sart data</label>
                                        <input type="date" name="from_date"  value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">

                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>End data</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">

                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Click To Filter</label><br>   
                                        <button type="submit" class="btn btn-primary">Filter</button>

                                    </div>

                                </div>
                            </div>

                        </form>

                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body ">

                    <table class="table table-borderd">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Invoice number</th>
                                    <th>Date</th>
                                    <th>Customer name</th>
                                    <th>Item name</th>
                                    <th>Item code</th>
                                    <th>Item category</th>

                                    <th>Item sub category</th>
                                    <th>Item quantity </th>
                                </tr>
                            </thead>
                            <tbody>

                        <?php
                                $con = mysqli_connect("localhost","root","","system");
                            if(isset($_GET['from_date']) && isset($_GET['to_date']))
                            {
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];

                                $query="SELECT * FROM `customer`  WHERE `Date` BETWEEN ' $from_date ' AND ' $to_date ' ";
                                $query_run = mysqli_query($con, $query );
                                
                                if(mysqli_num_rows( $query_run)>0)
                                {
                                        foreach($query_run as $row)
                                       {
                                             ?>
                                                 <tr>                                   
                                                <td><?= $row['ID']; ?></td>
                                                <td><?= $row['Invoice']; ?></td>
                                                <td><?= $row['Date']; ?></td>
                                                <td><?= $row['FirstName']; ?></td>
                                                <td><?= $row['Name']; ?></td>
                                                <td><?= $row['ICode']; ?></td>
                                                <td><?= $row['Catagory']; ?></td>
                                                <td><?= $row['Subcatagory']; ?></td>
                                                <td><?= $row['Quantity']; ?></td>

                                            </tr>
                                            <?php
                                       }  

                                }
                                    else{
                                        echo "No record id fonud";
                                    }
                            }
                       
                       ?>
                       </tbody>
                        </table>

                        </div>

                </div>

             </div>
        </div>
    </div>


   
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<style>
    h2{

margin-top: 5px;
margin-left: 28px;
width: 30%;
height: 25px;
border-radius: 5px;
background-color: rgb(78, 214, 214);
font-size: medium;
text-decoration: none;
border-radius: 15px 000;
text-align: center;
font-size: 20px;
}
</style>
</body>
</html>