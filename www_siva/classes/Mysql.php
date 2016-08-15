<?php

require_once 'constants.php';

class Mysql
{

private $dbConnection;

function __construct()
 {
$this->dbConnection = new PDO('mysql:dbname=clicknlick;host=localhost;charset=utf8', 'root', 'dabra@4F');
$this->dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }

	
//The function returns the city names for which the portal provides the service
function service_city_names()
 {
$statement = $this->dbConnection->prepare('SELECT id,city_name FROM city');
if($statement->execute())
  {
foreach ($statement as $rows)
  {
     $data[]= array ("id" => $rows['id'],"city" => $rows['city_name']);
  }
				
return json_encode($data);
  }
else
  {
     return json_encode(array("result" => "failure"));
  }
 }		

//The function returns the areas for which the portal provides service in a city
function service_city_areas($city_id)
 {
$statement = $this->dbConnection->prepare('SELECT id,city_id,area_name FROM city_areas where city_id=:city_id');
$statement->bindParam(':city_id', $city_id, PDO::PARAM_INT);
if($statement->execute())
  {
foreach ($statement as $rows)
  {
	$data[]= array ("id" => $rows['id'],"area_name" => $rows['area_name'],"city_id" => $rows['city_id']);
  }
				
return json_encode($data);
  }
else
  {
     return json_encode(array("result" => "failure"));
  }
 }

function service_city_areas_restaurant_types($area_id)
 {
$statement = $this->dbConnection->prepare('SELECT id,area_id,restaurant_type FROM city_areas_restaurant_types where area_id=:area_id');
$statement->bindParam(':area_id', $area_id, PDO::PARAM_INT);
if($statement->execute())
  {
foreach ($statement as $rows)
  {
	$data[]= array ("id" => $rows['id'],"restaurant_type" => $rows['restaurant_type'],"area_id" => $rows['area_id']);
  }
				
return json_encode($data);
  }
else
  {
      return json_encode(array("result" => "failure"));
  }
 }
 
function service_restaurant_details($restaurant_type_id)
 {
$statement = $this->dbConnection->prepare('SELECT id,restaurant_type_id,restaurant_name,restaurant_address,restaurant_logo,lunch_time,dinner_time,delivery_mode,minimum_order,restaurant_rating FROM restaurant_details where restaurant_type_id=:restaurant_type_id');
$statement->bindParam(':restaurant_type_id', $restaurant_type_id, PDO::PARAM_INT);
if($statement->execute())
  {
foreach ($statement as $rows)
  {
	$data[]= array ("id" => $rows['id'],"restaurant_type_id" => $rows['restaurant_type_id'],"restaurant_name" => $rows['restaurant_name'],"restaurant_address" => $rows['restaurant_address'],"restaurant_logo" => $rows['restaurant_logo'],"lunch_time" => $rows['lunch_time'],"dinner_time" => $rows['dinner_time'],"delivery_mode" => $rows['delivery_mode'],"minimum_order" => $rows['minimum_order'],"restaurant_rating" => $rows['restaurant_rating']);
  }
				
return json_encode($data);
  }
else
  {
     return json_encode(array("result" => "failure"));
  }

 }
 
function service_menu_items($restaurant_id)
 {
	//echo $restaurant_id;
$statement = $this->dbConnection->prepare('SELECT rmi.id,rmi.restaurant_id,rmi.item_name,rmi.item_description,rmi.early_payback_points,rmi.item_group,rmi.item_category,rmi.price,rd.restaurant_name,rd.restaurant_address,rd.lunch_time,rd.dinner_time,rd.minimum_order,rd.restaurant_logo,rd.restaurant_rating FROM restaurant_details rd,restaurant_menu_items rmi where  rd.id=rmi.restaurant_id and rd.id=:restaurant_id');
$statement->bindParam(':restaurant_id', $restaurant_id, PDO::PARAM_INT);
if($statement->execute())
  {
foreach ($statement as $rows)
  {
	 $data1[]=array("id" => $rows['id'],"restaurantId" => $rows['restaurant_id'],"itemName" => $rows['item_name'],
	"itemDescription" => $rows['item_description'],"itemPayback"=>$rows['early_payback_points'],"itemGroup" => $rows['item_group'],"itemCategory" => $rows['item_category'],"price" => $rows['price']);
	
		$data= array ("restaurantName" => $rows['restaurant_name'],"restaurantAddress" => $rows['restaurant_address'],"lunchTime" => $rows['lunch_time'],"dinnerTime" => $rows['dinner_time'],"minimumOrder" => $rows['minimum_order'],"restaurantLogo" => $rows['restaurant_logo'],"restaurantRating" => $rows['restaurant_rating'],"items" => $data1);
  }		
			
  
return json_encode($data);
 }
 else
 {
    return json_encode(array("result" => "failure"));
 }
 }
 
function service_order_details($redeemedPoints,$customerName,$email,$mobile,$addressline,$pincode,$landmark,$hotel_id,$item_info,$i)
 {
   
   $discounted_price=0;
     
   $totalPayback=0;
   
   $statement = $this->dbConnection->prepare('SELECT total_payback FROM user_details where email=:email');

   $statement->bindParam(':email', $email, PDO::PARAM_STR,500);

   $statement->execute();		
   
   foreach ($statement as $rows)
         {
            $totalPayback=$rows['total_payback'];

         }
		 
	 
		 $flag=0;
		 
   //if($redeemedPoints <= $totalPayback and ($redeemedPoints/50)==0)
   if($redeemedPoints <= $totalPayback)
   {
   
   $discounted_price=0.80*$redeemedPoints;
   
   $time=time();
   
   $order_net_value =0;
   
   $order_net_payback =0;
   
   $order_number = '';
       
   if($customerName!=null && $email!=null && $mobile !=null && $addressline!=null && $pincode !=null && $landmark!=null && $hotel_id!=0 && $i!=0)
   {
   
   for($i=$i-1;$i>=0;$i--)
   {
         $item_value=0;
		 
		 $item_name = '';
		 
		 $item_payback =0;
		 
         $j=0;
		 
         $item_id = $item_info[$i][$j];
		
         $statement = $this->dbConnection->prepare('SELECT item_name,price,early_payback_points FROM restaurant_menu_items where id=:item_id');

         $statement->bindParam(':item_id', $item_id, PDO::PARAM_INT);

         $statement->execute();		
			
		 $j=1;
		 
		 $count = $item_info[$i][$j];
		
		
		 foreach ($statement as $rows)
         {
            $item_name = $rows['item_name'];
            $item_value = $count * $rows['price'];
			$item_payback = $count * $rows[2];
			$data1[]=array("itemName" => $item_name,"itemValue" =>$item_value,"itemCount" => $count);
         }  
		 
		 $statement = $this->dbConnection->prepare('insert into item_order_details(item_id,item_name,item_count,item_net_value,email,order_time,payback_points)  values(:item_id,:item_name,:item_count,:item_net_value,:email,:order_time,:item_payback)');

         $statement->bindParam(':item_id', $item_id, PDO::PARAM_INT);

         $statement->bindParam(':item_name', $item_name, PDO::PARAM_STR,500);

         $statement->bindParam(':item_count', $count, PDO::PARAM_INT);

         $statement->bindParam(':item_net_value', $item_value, PDO::PARAM_INT);

         $statement->bindParam(':email', $email, PDO::PARAM_STR,500);

         $statement->bindParam(':order_time', $time, PDO::PARAM_STR,500);
		 
         $statement->bindParam(':item_payback', $item_payback, PDO::PARAM_STR,500);

         $statement->execute();
		 
 		 $order_net_value = $order_net_value + $item_value;
		 
		 $order_net_payback = $order_net_payback + $item_payback;
    }
  
         $statement = $this->dbConnection->prepare('SELECT restaurant_name FROM restaurant_details where id=:hotel_id');

         $statement->bindParam(':hotel_id', $hotel_id, PDO::PARAM_INT);

         $statement->execute();
   
   foreach ($statement as $rows)
    {
     $hotel_name=$rows['restaurant_name'];
    } 
	   
   $final_price=$order_net_value-$discounted_price;
   
            $statement = $this->dbConnection->prepare('insert into user_order_details(email,mobile_number,address_line,pincode,landmark,
total_value,restaurant_id,restaurant_name,order_time,payback,payback_used,discounted_price,final_price,name) values(:email,:mobile,:addressline,:pincode,:landmark,:netvalue,:hotel_id,:hotel_name,:order_time,:payback,:redeemedPoints,:discounted_price,:final_price,:customerName)');

         $statement->bindParam(':email', $email, PDO::PARAM_STR,500);

         $statement->bindParam(':mobile', $mobile, PDO::PARAM_STR,12);

         $statement->bindParam(':addressline', $addressline, PDO::PARAM_STR,500);

         $statement->bindParam(':pincode', $pincode, PDO::PARAM_INT);

         $statement->bindParam(':landmark', $landmark, PDO::PARAM_STR,500);

         $statement->bindParam(':netvalue', $order_net_value, PDO::PARAM_INT);

         $statement->bindParam(':hotel_id', $hotel_id, PDO::PARAM_INT);

         $statement->bindParam(':hotel_name', $hotel_name, PDO::PARAM_STR,100);

         $statement->bindParam(':order_time', $time, PDO::PARAM_STR);
		 
         $statement->bindParam(':payback', $order_net_payback, PDO::PARAM_INT);
		 
         $statement->bindParam(':redeemedPoints', $redeemedPoints, PDO::PARAM_INT);

         $statement->bindParam(':discounted_price', $discounted_price, PDO::PARAM_INT);
		 
         $statement->bindParam(':final_price', $final_price, PDO::PARAM_INT);

         $statement->bindParam(':customerName',$customerName, PDO::PARAM_STR,500);
		 
         $statement->execute();
		 
		 $statement = $this->dbConnection->prepare('SELECT id,created_at FROM user_order_details where email=:email and order_time=:order_time');

         $statement->bindParam(':email', $email, PDO::PARAM_STR,500);
		 
		 $statement->bindParam(':order_time', $time, PDO::PARAM_STR);

         $statement->execute();
		 
		   foreach ($statement as $rows)
    {
     $order_number=$rows['id'];
     $order_date=$rows['created_at'];
    }
	
	if($redeemedPoints > 0)
	{
	
$statement = $this->dbConnection->prepare('update user_details ud,(select email,payback,payback_used from user_order_details uod where uod.id=:order_id and uod.email=:cust_email) t set ud.total_payback=(ud.total_payback-t.payback_used),ud.payback_inhold=(ud.payback_inhold+t.payback_used) where ud.email=:email');
		 $statement->bindParam(':order_id', $order_number, PDO::PARAM_INT);
         $statement->bindParam(':email', $email, PDO::PARAM_STR,500);
         $statement->bindParam(':cust_email', $email, PDO::PARAM_STR,500);		 
         $statement->execute();
   }
		 
		 $flag=1;
		 
		 }
		 
   }  
		 if($flag==1)
		 {
	//	 $email,$mobile,$addressline,$pincode,$landmark
		 $data = array("result" => "success","orderNumber" => $order_number,"orderDate" => $order_date,"email" => $email,"mobile"=>$mobile,"restaurantName"=>$hotel_name,"address" => $addressline,"pincode" =>$pincode,"landmark" => $landmark,"priceBeforeDiscount" => $order_net_value,"appliedRedeemPoints" => $redeemedPoints,"priceToPay" => $final_price,"itemsOrdered" => $data1);
		 
   $to = $email;
   $subject = "Food patra-Order Confirmation";
//   $message = "This is simple text message.";
   $header = "From:palaniprabhu91@gmail.com \r\n";
$MESSAGE_BODY = "Your order is successfully placed.Below are order and delivery details"."\n"; 
$MESSAGE_BODY .= "\n"."Order Details"."\n"; 
$MESSAGE_BODY .= "\n"."Order No: ".$order_number."\n"; 
$MESSAGE_BODY .= "Original price: ".$order_net_value."\n"; 
$MESSAGE_BODY .= "Points Redeemed: ".$redeemedPoints."\n"; 
$MESSAGE_BODY .= "Final price: ".$final_price."\n"; 
$MESSAGE_BODY .= "\n"."Delivery Details"."\n"; 
$MESSAGE_BODY .= "Mobile Number: ".$mobile."\n"; 
$MESSAGE_BODY .= "Delivery Address: ".$addressline."\n";
$MESSAGE_BODY .= "Landmark: ".$landmark."\n"; 
$MESSAGE_BODY .= "Pincode: ".$pincode."\n";
//   $retval = mail ($to,$subject,$MESSAGE_BODY,$header);
   /*if( $retval == true )  
   {
      echo "Message sent successfully...";
   }
   else
   {
      echo "Message could not be sent...";
   }*/
 
         return json_encode($data);
		 }
		 else
		 {

		 $data = array("result" => "failure");
 
         return json_encode($data);
		 }
   
 }
 
function service_items_to_process($restaurant_id)
 {
	
$statement = $this->dbConnection->prepare('SELECT uod.id,uod.email,uod.mobile_number,uod.total_value,uod.payback,rd.restaurant_name,rd.restaurant_address,rd.lunch_time,rd.dinner_time,rd.minimum_order,rd.restaurant_logo,rd.restaurant_rating FROM restaurant_details rd,user_order_details uod where  rd.id=uod.restaurant_id and rd.id=:restaurant_id and uod.is_cancelled=0');
$statement->bindParam(':restaurant_id', $restaurant_id, PDO::PARAM_INT);
if($statement->execute())
  {
foreach ($statement as $rows)
  {
	 $data_orders[]=array("orderId" => $rows['id'],"email" => $rows['email'],
	"mobileNumber" => $rows['mobile_number'],"totalValue" => $rows['total_value'],"payback" => $rows['payback'],"isCancelled" => 0);
	
		$data= array ("restaurantName" => $rows['restaurant_name'],"restaurantAddress" => $rows['restaurant_address'],"lunchTime" => $rows['lunch_time'],"dinnerTime" => $rows['dinner_time'],"minimumOrder" => $rows['minimum_order'],"restaurantLogo" => $rows['restaurant_logo'],"restaurantRating" => $rows['restaurant_rating'],"orders" => $data_orders);
  }		
			
  
return json_encode($data);
 }
 else
 {
     return json_encode(array("result" => "failure"));
 }
 
 }
 //written to display the items of the order to process
function service_order_items_list($order_id)
 {
	//echo $restaurant_id;
$statement = $this->dbConnection->prepare('SELECT uod.id,uod.email,uod.mobile_number,uod.total_value,uod.payback,iod.id as item_id,iod.item_name,iod.item_count,iod.item_net_value,iod.payback_points FROM item_order_details iod,user_order_details uod where iod.email=uod.email and iod.order_time=uod.order_time and uod.id=:order_id');
$statement->bindParam(':order_id', $order_id, PDO::PARAM_INT);
if($statement->execute())
  {
foreach ($statement as $rows)
  {
	 $data_items[]=array("itemId" => $rows['item_id'],"itemName" => $rows['item_name'],
	"itemCount" => $rows['item_count'],"itemNetValue" => $rows['item_net_value'],"paybackPoints" => $rows['payback_points']);
	
		$data= array ("orderId" => $rows['id'],"email" => $rows['email'],"mobileNumber" => $rows['mobile_number'],"totalValue" => $rows['total_value'],"totalPayback" => $rows['payback'],"items" => $data_items);
  }		
			
  
return json_encode($data);
 }
 else
 {
    return json_encode(array("result" => "failure"));
 }
 
 }

function service_order_process_updation($order_info,$i)
 {
 
   $flag=0;
  
for($i=$i-1;$i>=0;$i--)
   {
   	
   $j=0;
   
   $email = $order_info[$i][$j];
   
   
   $j=1;
  
   $orderId = $order_info[$i][$j];
   
   $j=2;
   
   $processValue = $order_info[$i][$j];
   
$statement = $this->dbConnection->prepare('update user_order_details set is_cancelled=:processValue where id=:order_id and email=:email');

$statement->bindParam(':order_id', $orderId, PDO::PARAM_INT);

$statement->bindParam(':processValue', $processValue, PDO::PARAM_INT);

$statement->bindParam(':email', $email, PDO::PARAM_STR,500);

$statement->execute();

if($processValue==0)
{
  $flag=1;
}

if($processValue==1)
{
$statement = $this->dbConnection->prepare('update user_details ud,(select email,payback,payback_used from user_order_details uod where uod.id=:order_id and uod.email=:cust_email) t set ud.total_payback=(ud.total_payback+t.payback),ud.payback_inhold=(ud.payback_inhold-t.payback_used) where ud.email=:email');

$statement->bindParam(':order_id', $orderId, PDO::PARAM_INT);

$statement->bindParam(':email', $email, PDO::PARAM_STR,500);

$statement->bindParam(':cust_email', $email, PDO::PARAM_STR,500);

$statement->execute();

$flag=1;

}
if($processValue==2)
{

$statement = $this->dbConnection->prepare('update user_details ud,(select email,payback_used from user_order_details uod where uod.id=:order_id and uod.email=:cust_email) t set ud.total_payback=(ud.total_payback+t.payback_used),ud.payback_inhold=(ud.payback_inhold-t.payback_used) where ud.email=:email');

$statement->bindParam(':order_id', $orderId, PDO::PARAM_INT);

$statement->bindParam(':email', $email, PDO::PARAM_STR,500);

$statement->bindParam(':cust_email', $email, PDO::PARAM_STR,500);

$statement->execute();

$flag=1;

}

}

if($flag==1)
{
return json_encode(array("result" => "success"));
}
else
{
return json_encode(array("result" => "failure"));
}

}
 
function service_contacts($email,$category,$message)
 {
  $statement = $this->dbConnection->prepare('insert into customer_speak(email,feedback_category,message) values(:email,:feedback_category,:message)');

  $statement->bindParam(':email', $email, PDO::PARAM_STR,500);
  $statement->bindParam(':feedback_category', $category);
  $statement->bindParam(':message', $message);

  if($statement->execute())
  {
     return json_encode(array("result" => "success"));
  }
  else
  {
     return json_encode(array("result" => "failure"));
  }
 }
 
function service_user_details($name,$email,$picture,$verified_email,$auth_method)
 {
 
 
 if (!isset($_SESSION))
   {

session_start();

	}
	

 $statement = $this->dbConnection->prepare('SELECT is_admin,total_payback from user_details where email=:email');
 $statement->bindParam(':email', $email, PDO::PARAM_STR,500);
 
if($statement->execute())
  {
 $flag=0; 
         foreach($statement as $rows)
		{
		 $flag=1;
        
		if($rows['is_admin']==0)
		{
		   $_SESSION['is_admin'] = false;
		}
		else
		{
		  $_SESSION['is_admin'] = true;
		}
		$_SESSION['email'] = $email;
		$_SESSION['name'] = $name;
		$_SESSION['picture_url'] = $picture;
		$payback=$rows['total_payback'];
		$data=array("given_name" => $name,"email" => $email,"adminFlow" => $_SESSION['is_admin'],"picture" => $picture,"authMethod" => $auth_method,"paybackPoints" => $payback,"minPaybackPoints"=> 50,"result" => "success");
		
		return json_encode($data);
		}
     if($flag==0)	   //  
     {
	 
	 if($auth_method==1)
	 {
	   $statement = $this->dbConnection->prepare('insert into user_details(email,google_id,name) values(:email,:id,:name)');
	 }
	 if($auth_method==2)
	 {
	   $statement = $this->dbConnection->prepare('insert into user_details(email,facebook_id,name) values(:email,:id,:name)');
	 }

       $statement->bindParam(':email', $email, PDO::PARAM_STR,500);
	   $statement->bindParam(':id', $id, PDO::PARAM_INT);
       $statement->bindParam(':name', $name, PDO::PARAM_STR,500);
	   if($statement->execute())
	   {
   		$_SESSION['is_admin'] = false;
		    $_SESSION['email'] = $email;
		    $_SESSION['name'] = $name;
			$_SESSION['picture_url'] = $picture;
		$data=array("given_name" => $name,"email" => $email,"adminFlow" => $_SESSION['is_admin'],"picture" => $picture,"authMethod" => $auth_method,"paybackPoints" => 0,"minPaybackPoints"=> 50,"result" => "success");
		return json_encode($data);
	   }
	   else
	   {
	        return json_encode(array("result" => "failure"));
	   }
	   
	  }

    
  }
  else
  {
       return json_encode(array("result" => "failure"));
  }
	
  
					
 }
 
 function service_payback_points()
 {
 
 $email=$_SESSION['email'];
 
 if($_SESSION['is_admin']==false)
{
  $statement = $this->dbConnection->prepare('select total_payback from user_details ud where ud.email=:email');
 
  $statement->bindParam(':email', $email, PDO::PARAM_STR,500);
  
  if($statement->execute())
  {
  foreach ($statement as $rows)
   {
   $data=array("payback" => $rows['total_payback'],"email" => $email,"result"=>"success");
   }
      	return json_encode($data);  
  }
  else
  {
    json_encode(array("result" => "failure"));
  }
  
}
else
  {
     return json_encode(array("result" => "failure"));
  }

}
 
function service_view_orders()
 {
 
 $email=$_SESSION['email'];
 
 $i=0;
 if($_SESSION['is_admin']==false)
 {

     $statement = $this->dbConnection->prepare('select  uod.id,uod.email,uod.mobile_number,uod.payback_used,uod.total_value,uod.final_price,uod.order_status,uod.order_time,rd.restaurant_name from user_order_details uod,restaurant_details rd where uod.restaurant_id=rd.id and uod.email=:email');
 
  $statement->bindParam(':email', $email, PDO::PARAM_STR,500);
  }
  else
  {
       $statement = $this->dbConnection->prepare('select  uod.id,uod.email,uod.mobile_number,uod.payback_used,uod.total_value,uod.final_price,uod.order_status,uod.order_time,rd.restaurant_name from user_order_details uod,restaurant_details rd where uod.restaurant_id=rd.id and uod.order_status!=2 and uod.order_status!=3');
  }
  if($statement->execute())
  {
  
     foreach ($statement as $rows)
  {
     
	 $statement1 = $this->dbConnection->prepare('select item_name,item_count from item_order_details where email=:email and order_time=:order_time');
     $statement1->bindParam(':email', $rows['email'], PDO::PARAM_STR,500);
     $statement1->bindParam(':order_time', $rows['order_time'], PDO::PARAM_STR,500);	 
	 if($statement1->execute())
    {
     foreach ($statement1 as $rows1)
       {
      $data1[]=array("itemName" => $rows1['item_name'],"itemCount" => $rows1['item_count']);
       }
	
 
	$data[]= array ("orderNumber" => $rows['id'],"email" => $rows['email'],"mobile" => $rows['mobile_number'],"appliedRedeemPoints" => $rows['payback_used'],"priceBeforeDiscount" => $rows['total_value'],"priceToPay" => $rows['final_price'],"orderStatus" => $rows['order_status'],"restaurant" => $rows['restaurant_name'],"itemsOrdered" => $data1);
	
	unset($data1);
    } 
	$i=$i+1;
  }
  if($i==0)
  {
  $data=array ("status" =>"noOrder","result" =>"success");
  return json_encode($data);
  }
  else
  {
    $data2=array("status" =>"order","result" =>"success","orderHistories" => $data);
	return json_encode($data2);
  }
}
  else
  {
     return json_encode(array("result" => "failure"));
  }

}

function service_order_status($order_id)
 {
	
	$statement = $this->dbConnection->prepare('select  uod.id,uod.email,uod.mobile_number,uod.payback_used,uod.total_value,uod.final_price,uod.order_status,uod.order_time,uod.name,rd.restaurant_name from user_order_details uod,restaurant_details rd where uod.restaurant_id=rd.id and uod.id=:order_id');
 
  $statement->bindParam(':order_id', $order_id, PDO::PARAM_INT);	

  $i=0;
  if($statement->execute())
  {
             
     foreach ($statement as $rows)
  { 
     $i=$i+1;

 
	$data= array ("status" => "order","result" => "success","orderNumber" => $rows['id'],"name"=>$rows['name'],"orderStatus" => $rows['order_status']);
	

	return json_encode($data);

  }
  
  if($i==0)
  {
    return json_encode(array("status" => "noOrder","result" => "success"));
  }
  else
  {
  return json_encode($data);
  }
}
 else
  {
     return json_encode(array("result" => "failure"));
  }
						
 }

function service_order_status_update($order_id,$order_status)
 {
$statement = $this->dbConnection->prepare('update user_order_details set order_status=:order_status where id=:order_id');
 
 $statement->bindParam(':order_id', $order_id, PDO::PARAM_INT);
 $statement->bindParam(':order_status', $order_status, PDO::PARAM_INT);

   if($statement->execute())
  {

     $data = array("result" => "success");
     $response = json_encode($data);
	 return $response;
   
  }
  else
  {
     $data = array("result" => "failure");
     $response = json_encode($data);
	 return $response;

  }						
  
 }
 
}
?>

