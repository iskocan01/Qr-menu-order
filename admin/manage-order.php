<?php include("partials/menu.php"); ?>
 <div class="container">
 	<h1>Order Manage</h1>

    <table class="tbl-full fs-6">
                    <tr>   
                        <th>S.N.</th>
                        <th>Number Table</th>
                        
                        <!--Sipariş toplamı-->
                        <th> </th>
                        
                    
                        <!--telefon no-->
                        <th></th>

                        <!--Sipariş tarih-->
                        <th></th>
        
                        <!--Sipariş Durumu-->
                        <th>Order statü</th>

                        <!--Ödeme Durumu-->
                        <th> </th>

                        <!--Sipariş Tipi-->
                        <th> </th>

                        <!--Buttonlar-->
                        <th>Aktionen</th>

                    </tr>

                    <?php 
                        

                        //****************************************************************************************************** */
                        


                        $foods = $db->query("SELECT  * FROM tbl_food_order WHERE   id != 1 ORDER BY id DESC ",PDO::FETCH_OBJ)->fetchAll();

                        

                            $sn = 1;
                            $check_cart=0;
                            foreach ($foods as $food) {
                                
                                 
                                ?>  


                        
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo "Number table" ?></td>
                            <td>€ <?php echo "Total price"; ?></td>
                             
                             
                            
                            
                             
                            <td>

                               <!-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#display-order">Görüntüle modalda</button><br>-->
                                <a style="padding: 2%; " href="<?php echo SITEURL ?>admin/view-order.php?sepet_id=<?php echo $food->cart_id; ?>" target="_blank" class="btn btn-primary">Görüntüle  </a><br>
                                <!-- <a style="padding: 2%; " href="#" class="btn btn-dangery">Yazdır</a><br>-->
                            </td>

                        </tr>



                                <?php  
                                if ($food->order_status =="bekliyor...") {
                                    ?>  <audio  src="<?php echo SITEURL; ?>/ses/order.mp3" autoplay loop ></audio>  <?php 
                                }                        

                                else{
                                    continue;
                                }
                                $check_cart = $food->cart_id;

                            }
                        ?>
                        

                    
                </table>
 </div>
<?php include("partials/footer.php"); ?>