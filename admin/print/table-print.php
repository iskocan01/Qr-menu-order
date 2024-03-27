<?php

include('../../config/constants.php');

require("fpdf/fpdf.php");

require_once("../partials/getData/getData.php");


setlocale(LC_ALL, 'pt_PT.UTF-8');
 

$cartData = new cartTableData();
$foodData = new foodData();
$customerData = new customerData();
$categoryData = new categoryData();
$productName = new productData();


if (isset($_GET["cart_id"])) {

	$cart_id = $_GET["cart_id"];

	$cart = $cartData->getAllCart($cart_id, $db);
	 
	$customer = $cart[0]->table_id;
 

	


}else{
	echo "cart id is not here";
}




$date = date("Y/m/d H.i");
class PDF extends FPDF{

	
	function firstHeader(){
		$this->SetFont('arial','',8);
		$this->Image('../../images/newlogo.png',4,2,40);
		$this->SetXY(1,30);
		$this->Cell(44,3,iconv('UTF-8','ISO-8859-1',"Av. Dionysia Alves Barreto, "),0,1,'C');
		$this->SetX(1);
		$this->Cell(44,3,iconv('UTF-8','ISO-8859-1'," 412 - Vila Osasco"),0,1,'C');
		$this->SetX(1);
		$this->Cell(44,3,iconv('UTF-8','ISO-8859-1'," Osasco - SP, 06086-040, Brasil"),0,1,'C');
		$this->SetX(1); 
		$this->Cell(44,3,iconv('UTF-8','ISO-8859-1',"Tel:+55 (11) 93242-1956"),0,1,'C');
		$this->SetX(1);
		$this->Cell(44,3, iconv('utf-8', 'ISO-8859-1', "CNPJ : 49.635.136/0001-67"),0,1,'C');


		$this->SetX(0);
		$this->Cell(46,0,"",1,1);
		$this->Ln(2);
 

		
		//$this->Cell(20,30,"",0,1);
	}
 
}




$pdf = new PDF(); 
$pdf->AddPage('p','a5');

$pdf->firstHeader();

		//Fiş numarası*************************************
 $pdf->SetFont('arial','B',12);
 $pdf->SetX(1);
 $pdf->Cell(44,4,iconv('UTF-8','ISO-8859-1',"NO:".$cart_id),0,1,'C');
		//Fiş numarası ******************************
 $pdf->SetFont('arial','',8);
 $pdf->SetX(1);
 $pdf->Cell(44,4,  $cart[0]->order_date,0,1,'C');


		//Müşteri Bilgileri*****************************
$pdf->SetFont('arial','',9);
$pdf->SetX(1);
$pdf->Cell(44,5,iconv('UTF-8','ISO-8859-9//TRANSLIT',"Numero da mesa : ".$customer),0,1,'C'); 


 

$pdf->Ln(4);
$pdf->SetFont('arial','B',20);
$pdf->SetX(1);
$pdf->Cell(44,5, strtoupper("table "),0,1,'C');



//$pdf->SetX(1);
// $pdf->Cell(44,5, "SELMA" ,0,1,'C');

		//Müşteri Bilgileri*****************************



$font_size=12; 
$tempFontSize = $font_size;

//Loop the Data
$pdf->Cell(10,10,"",0,1);

$cart_price = 0;
$cart_count = 0;

foreach($cart as $item){


	$food = $foodData->getFood($item->food_id, $db);

	 
	$category = $categoryData->getCategory($food[0]->category_id, $db); /// Kategori id sini FOod nesnesinden aldık ve categori nesnemizi oluşturduk


	$cellWidth = 22	;//Burası 22 olmalı
	$celHeight = 5; 

	if($food[0]->category_id != 58 && $food[0]->category_id != 59){  //! Burada indirim ve karttadaki ürünlerü listeliyorum
		$cart_count++;												//!!
	}																//! Burada sepettin fiyatını ve nekadar indirim yapılacağını yazıyoruz.
	$cart_price += $item->total_price;

	//check whether the text is overflowing
	if($pdf->GetStringWidth($food[0]->title."(#)".$food[0]->id) < $cellWidth){//Burası karakter sayısının uzunluğu
		//if not then do nothing
		$line =1;
	}else{
		//if it is, then calculate the height needed  for wrapped cell
		//by splitting the text to fit the cell widht
		//then count how many lines are needed for the text to fit the cell

		$textLength = strlen($food[0]->title."(#) ".$food[0]->id); // total text length
		$errMargin = 3; //Cell with erorr margin, just case  //! Burası bizim verdiğimiz SeyX değerine eşit olacak bu kod önce verilmediği için böyle
		$startChar = 0; //character start positıon for each line
		$maxChar = 0; //maximun character in a line to be incremented later
		$textArray = array(); //to hold to strings for each line
		$tmpString =""; //to hold the string for a line (temporary)

		while($startChar < $textLength){ // loop until end of the text
			//loop until max,imun character reached
			while(
				$pdf->GetStringWidth($tmpString) < ($cellWidth-$errMargin)&&
				($startChar+$maxChar)< $textLength ){
					$maxChar++;
					$tmpString=substr($food[0]->title."(#)".$food[0]->id,$startChar, $maxChar); 

				}	
				//move startChar to next line
				$startChar = $startChar + $maxChar;
				//than add it into the array so we know how many line are needed
				array_push($textArray, $tmpString);
				//reset maxChar and tmpstring
				$maxChar =0;
				$tmpString ="";
		}
		//get number of line
		$line = count($textArray); 
	}
	//write the Cells

	//	$this->Cell(62, 3, iconv('utf-8', 'ISO-8859-9', $name), 1, 1, "C");      iconv('utf-8','ISO-8859-1',)
	 
	$pdf->SetFont('arial','B',8);
	$pdf->SetX(1);
	$pdf->Cell(44,5, iconv('utf-8','ISO-8859-1//TRANSLIT',$category[0]->title), 0, 1);

	$pdf->SetFont('arial','B',10); 
	$pdf->SetX(3);
	$pdf->Cell(4,4,$item->qty,0,0);

	$pdf->SetFont('arial','',8);
	$pdf->Cell(3,4," X",0,0);
	$pdf->Cell(1,($line * $celHeight),"",0,0);
	
	$pdf->SetX(10);
	$pdf->SetFont('arial','B',8);
	$xPos = $pdf->GetX();
	$yPos = $pdf->GetY();
	$pdf->MultiCell($cellWidth, $celHeight, iconv('utf-8','ISO-8859-1//TRANSLIT', $food[0]->title) ,0,'L' );
	
	$pdf->SetFont('arial','B',8);
	$pdf->SetXY($xPos + $cellWidth, $yPos);


	//$pdf->Cell(10,($line * $celHeight),$food[0]->title);

	 
	$pdf->Cell(10,4, $item->total_price ,0,0);
	$pdf->Cell(0.00001,($line * $celHeight), "",0,1);
	 

	$pdf->SetFont('arial','',8);
	if(isset($item->extra_name) && $item->extra_name != ""){
		$errr = $item->extra_name;
		$extra = explode(",",$errr);
		$product_name ="";
			foreach($extra as $id){
				$product_name .= " +".$productName->getProductName($id,$db)->product_name.", ";
				//$pdf->MultiCell(22,2,$productName->getProductName($id,$db)->product_name,1,1);
			
			}

		$pdf->SetX(5);
		$pdf->MultiCell(36,4, $product_name ,0,1);
	}
	 
	if(isset($item->food_note) && $item->food_note != ""){
	$pdf->SetFont('arial','i',10);
	$pdf->SetX(3);
	//$pdf->MultiCell(40, 3, mb_convert_encoding($item->food_note, 'ISO-8859-9', 'utf-8'), 0, 1);
	//$pdf->MultiCell(40,3, mb_convert_encoding( iconv('utf-8','ISO-8859-9//TRANSLIT', $item->food_note), 'ISO-8859-9', 'utf-8') ,0,1);


	 
	
	$pdf->SetFont('Courier','',6);
	}	
	$pdf->Ln(10);

	
	
	//$pdf->Cell(26,6, $food[0]->title,1,0);
	
	
	 
}//foreach burada bitiyor/


//Foterrrr Toplam tutar vs........************************************
if(isset($cart[0]->order_type)){
	$pdf->SetFont('arial','',12);
	if($customer->customer_mahalle == "bad-salzig"){
		$service_price = 1.5;	
	}elseif($customer->customer_mahalle == "spay"){
		$service_price = 3;
	}else{
		$service_price = 2.5;
	}
	$pdf->SetX(2);
	$pdf->Cell(28,6,"Liefern    : " ,0,0);
	$pdf->SetFont('arial','B',12);
	$pdf->Cell(14,6, $service_price,0,1,'C');
	$indir = $service_price;
}else{

	 $pdf->SetFont('arial','',10);
	 
	$pdf->SetX(2);
	$pdf->Cell(28,6, "Desconto :" ,0,0);
	$pdf->Cell(14,6, "0",0,1);
	$indir =0;
}

$pdf->Ln(5);
$pdf->SetFont('arial','B',10);
$pdf->SetX(2);
$pdf->Cell(28,6,"Total : " ,0,0);
$pdf->SetFont('arial','B',15);
$pdf->Cell(14,6, $cart_price+$indir,0,1);
$pdf->ln(20);
 




 

$pdf->Output();


 
 


?>
