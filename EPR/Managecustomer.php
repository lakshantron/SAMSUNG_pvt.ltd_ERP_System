<?php

require("customer.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <link rel="stylesheet" href="customer.css">

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

<h1>Registration Process </h1>
<?php

if(isset($_POST["btnEdit"]))
{

    $customer=new customer();
    $customer->setID($_POST["btnEdit"]);     
    $customer=$customer->getcustomer();
}
?>
        <form method="post" enctype="multipart/form-data" name="customerdata">
        <table>
<h2>
    Customer Registration
</h2>

<tr><td>Customer ID</td>
<td><input type="number" readonly name="txtID"
value="<?php
if(isset($customer))
{
    echo $customer->getID();    
}
?>"
></td></tr>

<tr><td>Title</td>
<td><input type="text" name="txtTitle" placeholder="Mr,Mrs,Miss"
value="<?php
if(isset($customer))
{
    echo $customer->getTitle();
}
?>"></td></tr>

<tr><td>First Name</td>
<td><input type="text" name="txtFirstname" require
value="<?php
if(isset($customer))
{
    echo $customer->getFirstName();
}
?>"></td></tr>

<tr><td>Middle Name</td>
<td><input type="text" name="txtMiddletname" require
value="<?php
if(isset($customer))
{
    echo $customer->getMiddleName();
}
?>"></td></tr>

<tr><td>Last Name</td>
<td><input type="text" name="txtLasttname" require
value="<?php
if(isset($customer))
{
    echo $customer->getLastName();
}
?>"></td></tr>

<tr><td>Contact Number</td>
<td><input type="text" name="txtContact" require
value="<?php
if(isset($customer))
{
    echo $customer->getContact();
}
?>"></td></tr>

<tr><td>District</td>
<td><input type="text" name="txtDistrict" require
value="<?php
if(isset($customer))
{
    echo $customer->getDistrict();
}
?>"></td></tr>

<td><h3>Item Registration</h3></td>


<tr><td>Item Invoce Number</td>
<td><input type="text" name="txtInvoice" require
value="<?php
if(isset($customer))
{
    echo $customer->getInvoice();
}
?>"></td></tr>

<tr><td>Item Code</td>
<td><input type="text" name="txtICode" require
value="<?php
if(isset($customer))
{
    echo $customer->getICode();
}
?>"></td></tr>

<tr><td>Item Name</td>
<td><input type="text" name="txtName" require
value="<?php
if(isset($customer))
{
    echo $customer->getName();
}
?>"></td></tr>

<tr><td>Item Catagory</td>
<td>
<select name="txtCatagory" id="Catagory"   

value="<?php
if(isset($customer))
{
    echo $customer->getCatagory();
}
?>">

<optgroup label="Catagory">
      <option value="Printers">Printers</option>
      <option value="Laptops">Laptops</option>
      <option value="Gadgets">Gadgets</option>
      <option value="Ink bottels">Ink bottels</option>

      <option value=" Cartridges">Cartridges</option>
     
    </optgroup>
    </select>
</td></tr>

<tr><td>Item Sub Catagory</td>
<td>
<select name="txtSubcatagory" id="Subcatagory"   

value="<?php
if(isset($customer))
{
    echo $customer->getSubcatagory();
}
?>">

<optgroup label="Subcatagory">
      <option value="HP">HP</option>
      <option value="Dell">Dell</option>
      <option value="Lenovo">Lenovo</option>
      <option value="Acer">Acer</option>
      <option value="Samsung">Samsung</option>
     
    </optgroup>
    </select>
</td></tr>

<tr><td>Item Quantity</td>
<td><input type="text" name="txtQuantity" require
value="<?php
if(isset($customer))
{
    echo $customer->getQuantity();
}
?>"></td></tr>

<tr><td>Item Price</td>
<td><input type="text" name="txtPrice" require
value="<?php
if(isset($customer))
{
    echo $customer->GetPrice();
}
?>"></td></tr>

<tr><td>Date</td>
<td><input type="Date" name="Date" 
value="<?php
if(isset($customer))
{
    echo $customer->getDate();
}
?>"></td></tr>

<tr>
   </table>
    
<tr><td></td>
<td>
<input type="submit" value="Add Customer" name="btnAdd">
<input type="submit" value="Update Customer" name="btnUpdate">
<input type="submit" value="Delete Customer" name="btnDelete">
</td></tr>
<tr><td></td><td></td></tr>
</table>
</form>

<?php
if(isset($_POST["btnAdd"]))

try {
    $customer=new customer();
    $customer->setTitle($_POST["txtTitle"]);
    $customer->setFirstName($_POST["txtFirstname"]);
    $customer->setMiddleName($_POST["txtMiddletname"]);
    $customer->setLastName($_POST["txtLasttname"]);
    $customer->setContact($_POST["txtContact"]);
    $customer->setDistrict($_POST["txtDistrict"]);
   
   
    $customer->setInvoice($_POST["txtInvoice"]);
 $customer->setICode($_POST["txtICode"]);
 $customer->setName($_POST["txtName"]);
 $customer->setCatagory($_POST["txtCatagory"]);
 $customer->setSubcatagory($_POST["txtSubcatagory"]);
 $customer->setQuantity($_POST["txtQuantity"]);
 $customer->SetPrice($_POST["txtPrice"]);
 $customer->setDate($_POST["Date"]);

    $id=$customer->Add();
    $customer->SetID($id);

} catch (Exception $e) {
    echo "DB Error" .$e->getMessage();
}
else if(isset($_POST["btnUpdate"]))
{

    try {
        $customer=new customer();
        $customer->setTitle($_POST["txtTitle"]);
        $customer->setFirstName($_POST["txtFirstname"]);
        $customer->setMiddleName($_POST["txtMiddletname"]);
        $customer->setLastName($_POST["txtLasttname"]);
        $customer->setContact($_POST["txtContact"]);
        $customer->setDistrict($_POST["txtDistrict"]);

        $customer->setInvoice($_POST["txtInvoice"]);
        $customer->setICode($_POST["txtICode"]);
        $customer->setName($_POST["txtName"]);
        $customer->setCatagory($_POST["Catagory"]);
        $customer->setSubcatagory($_POST["Subcatagory"]);
        $customer->setQuantity($_POST["txtQuantity"]);
        $customer->SetPrice($_POST["txtPrice"]);
        $customer->setDate($_POST["Date"]);

        $id=$customer->Update();

    } catch (Exception $e) {
        echo "DB Error".$e->getMessage();
        
    }
}
else if(isset($_POST["btnDelete"]) && isset($_POST["txtID"]))
{
$customer= new customer();                      
$customer->setID($_POST["txtID"]);

try {

    $customer->Delete();
    
} catch (Exception $e) {
    echo"DB error" .$e->getMessage();
    }
}

?>
<main>
<?php

$customers=customer::getcustomers();
if(sizeof($customers)>0)
{
    echo '<h4>Registration Table</h4>';
    echo'<form method="post" enctype="multipart/form-data">';
    echo'<table>
    <tr>

    <th>Title</th>
    <th>First Name</th>
    <th>Middle Name</th>
    <th>Last Name</th>
    <th>Contact</th>
    <th>District</th>

    <th>Invoice number</th>
    <th>Item Code</th>
    <th>Item Name</th>
    <th>Item category </th>
    <th>Item sub category </th>
    <th>Quantity </th>
    <th>Unit price</th>
    <th>Date</th>
   
    <th>Edit</th>
  
    </tr>';
    foreach($customers as $b)
    {
        echo'<tr>';
        echo'<td>'. $b->getTitle().'<br>';
        echo'<td>'. $b->getFirstName().'<br>';
        echo'<td>'. $b->getMiddleName().'<br>';
        echo'<td>'. $b->getLastName().'<br>';

        echo'<td>'. $b->getContact().'<br>';
        echo'<td>'. $b->getDistrict().'<br>';

        echo'<td>'. $b->getInvoice().'<br>';

        echo'<td>'. $b->getICode().'<br>';
        echo'<td>'. $b->getName().'<br>';
        echo'<td>'. $b->getCatagory().'<br>';
        echo'<td>'. $b->getSubcatagory().'<br>';
        echo'<td>'. $b->getQuantity().'<br>';
        echo'<td>'. $b->GetPrice().'<br>';
        echo'<td>'. $b->getDate().'<br>';

        echo '<td><button name="btnEdit" type="submit"
        value="'.$b->getID().'">Edit</button>
        </td>';

        echo'</tr>';
    }
    
    echo '</table>';
    echo '</form>';
}
?>


</main>
<style>
 
    main{

margin-bottom: 50%;
margin-top: 50px;
padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  padding: 8px;

  
  width:98%;
  border-collapse: collapse;
  

}

</style>
</body>
</html>