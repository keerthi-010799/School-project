<?php
include("database/db_conection.php");//make connection here
session_start();
if(isset($_POST['fees_id']) || isset($_GET['fees_id']))
{
    $fees_id = isset($_POST['fees_id']) ? $_POST['fees_id'] : $_GET['fees_id'];

    $sql2 = "SELECT * from fees_management where fee_id = '$fees_id'";
    $result2 = mysqli_query($dbcon,$sql2);
    $row2 =$result2-> fetch_assoc();
    $iid = $row2['fee_student_id'];
    $feeType = $row2['fee_type'];
   
    $sql = "SELECT * from studentprofile where id = '$iid'";
    $result = mysqli_query($dbcon,$sql);
    $row =$result-> fetch_assoc();

}
$sql3 = "SELECT * from instprofile";
    $result3 = mysqli_query($dbcon,$sql3);
    $row3 = $result3-> fetch_assoc();

function get_itemDetails($dbcon,$code){
    $sql = "SELECT * from salesitemaster2 where id='$code' ";
    $result = mysqli_query($dbcon,$sql);
    $row =$result-> fetch_assoc();

    $ret = substr($row['brand'],0,10)."-".substr($row['itemname'],0,15)."-".$row['size']."- [".$row['itemcode']."]&nbsp;&nbsp;|&nbsp; ";
    $ret.=  "GST@".($row['sales_taxrate']/1)."%";
    return $ret;
}
function convertNumberToWord($num = false){
    $num = str_replace(array(',', ' '), '' , trim($num));
    if(! $num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
                   'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
                  );
    $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
    $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
                   'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
                   'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
                  );
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
        } else {
            $tens = (int)($tens / 10);
            $tens = ' ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    return implode(' ', $words);
}
function displaywords($number){
    $no = (int)floor($number);
    $point = (int)round(($number - $no) * 100);
    $hundred = null;
    $digits_1 = strlen($no);
    $i = 0;
    $str = array();
    $words = array('0' => '', '1' => 'one', '2' => 'two',
     '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
     '7' => 'seven', '8' => 'eight', '9' => 'nine',
     '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
     '13' => 'thirteen', '14' => 'fourteen',
     '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
     '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
     '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
     '60' => 'sixty', '70' => 'seventy',
     '80' => 'eighty', '90' => 'ninety');
    $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
    while ($i < $digits_1) {
      $divider = ($i == 2) ? 10 : 100;
      $number = floor($no % $divider);
      $no = floor($no / $divider);
      $i += ($divider == 10) ? 1 : 2;
      if ($number) {
         $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
         $hundred = ($counter == 1 && $str[0]) ? ' ' : null;
         $str [] = ($number < 21) ? $words[$number] .
             " " . $digits[$counter] . $plural . " " . $hundred
             :
             $words[floor($number / 10) * 10]
             . " " . $words[$number % 10] . " "
             . $digits[$counter] . $plural . " " . $hundred;
      } else $str[] = null;
   }
   $str = array_reverse($str);
   $result = implode('', $str);
   $points = ($point) ?
     "" . $words[floor($point / 10) * 10] . " " . 
           $words[$point = $point % 10] : ''; 
   if($points != ''){        
   return $result . "rupees  " . $points . " paise Only";
 } else {
     return $result . "rupees Only";
 }
 }
?> 

<html>
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
        <title>Reciept print</title>
        <style type="text/css">
            .p_table{
                border:1px soid #000;
            }

        </style>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    </head>
    <body onload="printInit();">
        <div><h3 > 
        <div style="text-align:left"><img  style="position:absolute" src=<?php echo $row3['image'] ?> width="100px" height="100px"/>  </div>
       <div style="text-align:center;color:#8B008B"><?php echo $row3['instname'] ?> </h3>
       <div style="margin-top:-15px;margin-left:15px;text-align:center">
       <?php echo $row3['address']; ?><br/>
                        <?php echo $row3['city']; ?>-<?php echo $row3['zip']; ?>&nbsp;
                        <br/>
                        <b>Mob#:&nbsp;</b><?php echo $row3['mobile']; ?>,<?php echo $row3['workphone']; ?> <br/>
                        <b>E-mail:&nbsp;</b><?php echo $row3['email'];?><br/>
        </h3>
        </div>
        <br/>
        <div style="text-align:center"><h3>FEES RECIEPT</h3></div> 
        <div><span style="text-align:left;">Date: <?php echo date("d-m-Y"); ?></span>   <span style="margin-left:450px;text-align:left;">Reciept no:<?php echo $row2['reciept_no'];?></span></div>
        <br/>
        <div><span style="text-align:left;">Admissionno: <?php echo $row['admissionno'];?> </span> <span style="margin-left:160px;text-align:left;">Student name:<?php echo $row['firstname'];?></span> <span style="margin-left:120px;text-align:left;">  Class:<?php echo $row['class'];?> </span></div>
        <div><span style="text-align:left;">Payment Mode: <?php echo $row['paymentmode'];?> </div>
                <table width="100%" style="">
                    <thead style="text-align:center;">
                        <th style=" width:10%;padding:10px;border-right:1px solid #000;border-left:1px solid #000;border-top:1px solid #000;">#</th>
                        <th style="width:15%;padding:10px;border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;">Fees Name</th>
                        <th style="width:15%;padding:10px;border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;">Amount</th>
                        <th style="width:15%;padding:10px;border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;">Balance Fees</th>
                    </thead>
                    <tbody style="text-align:center;">
                        <?php
                        // $total = array();
                        // for($i=0;$i<count();$i++){
                        ?>
                        <tr style="border:1px solid #000;border-left:1px solid #000;">
                            <td style="padding:10px;padding-left:5%;border:1px solid #000;">
                                <?php echo 1;?>
                            </td>     
                            <td style="padding:10px;padding-left:3%;border-right:1px solid #000;border-bottom:1px solid #000;">
                                <?php if($feeType == "VanFees" || $feeType == "OldBalanceFees"){
                                    echo $row2['fee_type']."-".$row2['description'];
                                }else{ 
                                    echo $row2['fee_type'];
                                    }
                                    ?>
                            </td>    
                            <td style="padding:10px;padding-left:3%;border-right:1px solid #000;border-bottom:1px solid #000;">
                                <?php echo $row2['fees_paid'];?>
                                <td style="padding:10px;padding-left:3%;border-right:1px solid #000;border-bottom:1px solid #000;">
                                <?php echo $row2['fee_total_amt'] - $row2['fees_paid'];?>

                            </td>
                        </tr>                      
                    </tbody>
                </table>
                <table class="p_table" width="100%" style="">
                    <tbody>
                        <tr>
                            <td width="100%" style="border:1px solid #000;padding:10px;">
                                <p><?php                                 
                                    $paise = convertNumberToWord(round($row2['fees_paid']));
                                    echo "<b>AMOUNT IN WORDS: </b> ( ";
                                  echo ucfirst(displaywords($row2['fees_paid'])).")"; 
                                     ?></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="p_table" width="100%">
                    <tbody>
                        <tr>
                            <div>Created by:<?php
                            $userid = $_SESSION['userid'];
                            $user = "SELECT * FROM userprofile WHERE id = '$userid'";
                            $result = mysqli_query($dbcon,$user);
                            $row = $result-> fetch_assoc();
                            $name = $row['firstname'];
                              echo $name; ?> <span style="margin-left:400px;text-align:left;">Verified by:<?php echo $name;?></span></div>
                            <td width="100%" style="padding:10px;">
                                <p style="text-align: center;">***-This  is computer generated receipt hence seal and signature not required ***</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </tbody>
        </table>

        <script>
function printInit(){
window.print();
window.onbeforeprint = beforePrint;
window.onafterprint = afterPrint;
}         
    var beforePrint = function () {       
     };
     var afterPrint = function () {
        if(window.location.pathname.includes("printreciept")){
        window.history.back();
        }
         location.reload();
     };
</script>
    </body>
    </html>