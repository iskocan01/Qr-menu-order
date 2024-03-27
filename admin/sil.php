<?php include("../config/constants.php"); ?>
 <div class="row"> 
                                                        <?php 
                                                            $products = $db->query("SELECT * FROM tbl_product", PDO::FETCH_OBJ)->fetchAll();
                                                            foreach ($products as  $product) {
                                                                $checked = in_array($product->id, $food_content) ? 'checked': '';
                                                                ?>
                                                                 <div class="col-3">
                                                                     <input type="checkbox" name="product_checkbox[]" <?php echo $checked; ?> value="<?php echo $product_id; ?>">
                                                                 </div>
                                                                <?php

                                                            }
                                                         ?>
                                                      </div>