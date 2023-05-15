<?php
include("configcustomer.php");

class customer
{
    private $ID;
    private $Title;
    private $FirstName;
    private $MiddleName;
    private $LastName;
    private $Contact;
    private $District;

    private $Invoice;
    private $ICode;
    private $Name;
    private $Catagory;
    private $Subcatagory;
    private $Quantity;
    private $Price; 
    private $Date;

    
    public function setID($id)
    {
      $this->ID=$id;
    }
  public function getID()
  {
    return $this->ID;
  }

  public function setTitle($title)
  {
    $this->Title=$title;
  }
public function getTitle()
{
  return $this->Title;
}

public function setFirstName($firstname)
{
  $this->FirstName=$firstname;
}
public function getFirstName()
{
return $this->FirstName;
}

public function setMiddleName($middlename)
{
  $this->MiddleName=$middlename;
}
public function getMiddleName()
{
return $this->MiddleName;
}

public function setLastName($lastname)
{
  $this->LastName=$lastname;
}
public function getLastName()
{
return $this->LastName;
}

public function setContact($contact)
{
  $this->Contact=$contact;
}
public function getContact()
{
return $this->Contact;
}

public function setDistrict($district)
{
  $this->District=$district;
}
public function getDistrict()
{
return $this->District;
}

/////

public function setInvoice($invoice)
{
  $this->Invoice=$invoice;
}
public function getInvoice()
{
return $this->Invoice;
}


public function setICode($icode)
{
    $this ->ICode=$icode;
}
public function getICode()
{
    return $this->ICode;
}

public function setCatagory($catagory)
{
    $this ->Catagory=$catagory;
}
public function getCatagory()
{
    return $this->Catagory;
}

public function setName($name)
{
    $this ->Name=$name;
}
public function getName()
{
    return $this->Name;
} 

public function setQuantity($quantity)
{
    $this ->Quantity=$quantity;
}
public function getQuantity()
{
    return $this->Quantity;
}  

public function setSubcatagory($subcatagory)
{
    $this ->Subcatagory=$subcatagory;
}
public function getSubcatagory()
{
    return $this->Subcatagory;
} 

public function GetPrice()
{
    return $this->Price;
}
public function SetPrice($price)
{
    if($price >=0)
    $this->Price=$price;
}

public function setDate($date)
{
    $this ->Date=$date;
}
public function getDate()
{
    return $this->Date;
}

public function Add()
{
    
try {
        
        $conn=Configdb::GetConnection();
        $query="INSERT INTO `customer`(`Title`, `FirstName`, `MiddleName`,
         `LastName`, `Contact`, `District`,  
         `Invoice`, `ICode`, `Name`, `Catagory`, `Subcatagory`, `Quantity`, `Price`,`Date`) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";



$stmt=$conn->prepare($query);
$stmt->bindParam(1,$this->Title,PDO::PARAM_STR);
$stmt->bindParam(2,$this->FirstName,PDO::PARAM_STR);
$stmt->bindParam(3,$this->MiddleName,PDO::PARAM_STR);
$stmt->bindParam(4,$this->LastName,PDO::PARAM_STR);
$stmt->bindParam(5,$this->Contact,PDO::PARAM_STR);
$stmt->bindParam(6,$this->District,PDO::PARAM_STR);

$stmt->bindParam(7,$this->Invoice,PDO::PARAM_STR);
$stmt->bindParam(8,$this->ICode,PDO::PARAM_STR);
      $stmt->bindParam(9,$this->Name,PDO::PARAM_STR);
      $stmt->bindParam(10,$this->Catagory,PDO::PARAM_STR);
      $stmt->bindParam(11,$this->Subcatagory,PDO::PARAM_STR);
      $stmt->bindParam(12,$this->Quantity,PDO::PARAM_STR);
      $stmt->bindParam(13,$this->Price,PDO::PARAM_STR);
      $stmt->bindParam(14,$this->Date,PDO::PARAM_STR);


$stmt->execute();
return $conn->lastInsertId();

} catch (Exception $e) {
        throw $e;
    }
}

public static function getcustomers()
{
    try {
        $conn=Configdb::GetConnection();
        $query="SELECT `ID`, `Title`, `FirstName`, `MiddleName`, `LastName`, `Contact`, `District`, `Invoice`, `ICode`, `Name`, `Catagory`,
        `Subcatagory`, `Quantity`, `Price`, `Date` FROM `customer`";



        $customers=array();
        $resuilt=$conn->query($query);
        foreach($resuilt as $r)
        {
            $customer=new customer();
            $customer->setID($r[0]);
            $customer->setTitle($r[1]);
            $customer->setFirstName($r[2]);
            $customer->setMiddleName($r[3]);
            $customer->setLastName($r[4]);
            $customer->setContact($r[5]);
            $customer->setDistrict($r[6]);

            $customer->setInvoice($r[7]);
          $customer->setICode($r[8]);
          $customer->setName($r[9]);
          $customer->setCatagory($r[10]);
        $customer->setSubcatagory($r[11]);
        $customer->setQuantity($r[12]);
          $customer->SetPrice($r[13]);
          $customer->setDate($r[14]);


            
      array_push($customers,$customer);
        }
        return $customers;
    } catch (Exception $e) {
        throw $e;
    }
}
public function getcustomer()
{
try {

    $conn=Configdb::GetConnection();
    $query="SELECT `ID`, `Title`, `FirstName`, `MiddleName`, `LastName`, `Contact`, `District`,
    `Invoice`, `ICode`, `Name`, `Catagory`, `Subcatagory`, `Quantity`, `Price`, `Date`
     FROM `customer` WHERE ID=?";



$stmt=$conn->prepare($query);
$stmt->bindParam(1,$this->ID,PDO::PARAM_INT);

    $stmt->execute();
    $r=$stmt->fetchAll();
    $customer=new customer();
    if(sizeof($r)>0)
    {
        $customer=new customer();
        $customer->setID($r[0][0]);
        $customer->setTitle($r[0][1]);
        $customer->setFirstName($r[0][2]);
        $customer->setMiddleName($r[0][3]);
        $customer->setLastName($r[0][4]);
        $customer->setContact($r[0][5]);
        $customer->setDistrict($r[0][6]);

        $customer->setInvoice($r[0][7]);
        $customer->setICode($r[0][8]);
        $customer->setName($r[0][9]);
        $customer->setCatagory($r[0][10]);
        $customer->setSubcatagory($r[0][11]);
        $customer->setQuantity($r[0][12]);
        $customer->SetPrice($r[0][13]);
        $customer->setDate($r[0][14]);

    }
   return $customer; 
} catch (Exception $e) {
    throw $e;
}
}
public function Update()
{

    try {
        $conn=Configdb::GetConnection();
        $query="UPDATE `customer` SET `Title`=?,
        `FirstName`=?,`MiddleName`=?,`LastName`=?,
        `Contact`=?,`District`=? ,`Invoice`=?, `ICode`=?,`Name`=?,`Catagory`=?,
        `Subcatagory`=?,`Quantity`=?,`Price`=?,`Date`=? WHERE `ID`=?";

$stmt=$conn->prepare($query);
$stmt->bindParam(1,$this->Title,PDO::PARAM_STR);
$stmt->bindParam(2,$this->FirstName,PDO::PARAM_STR);
$stmt->bindParam(3,$this->MiddleName,PDO::PARAM_STR);
$stmt->bindParam(4,$this->LastName,PDO::PARAM_STR);
$stmt->bindParam(5,$this->Contact,PDO::PARAM_STR);
$stmt->bindParam(6,$this->District,PDO::PARAM_STR);

$stmt->bindParam(7,$this->Invoice,PDO::PARAM_STR);
$stmt->bindParam(8,$this->ICode,PDO::PARAM_STR);
$stmt->bindParam(9,$this->Name,PDO::PARAM_STR);
$stmt->bindParam(10,$this->Catagory,PDO::PARAM_STR);
$stmt->bindParam(11,$this->Subcatagory,PDO::PARAM_STR);
$stmt->bindParam(12,$this->Quantity,PDO::PARAM_STR);
$stmt->bindParam(13,$this->Price,PDO::PARAM_STR);
$stmt->bindParam(14,$this->Date,PDO::PARAM_STR);

$stmt->bindParam(15,$this->ID,PDO::PARAM_INT);

    } catch (Exception $e) {
        throw $e;
    }
}
public function Delete()
{
   try {
    $conn=Configdb::GetConnection();
    $query="DELETE FROM `customer` WHERE `ID`=?";
    $stmt=$conn->prepare($query);

    $stmt->bindParam(1,$this->ID,PDO::PARAM_INT);
    $stmt->execute();


   } catch (Exception $e) {
    throw $e;
   }
}
}
?>