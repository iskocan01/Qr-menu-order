<?php     include('partials/menu.php');  ?>
 



 <div class="container">
    <h1>Gerenciamento de categoria</h1>

    <div class="row px-3">

     <div class="position-relative">
        <button type="button" class="btn btn-primary position-absolute top-0 end-0 mt-3 me-3" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
         Adicionar nova categoria
        </button>
    </div>
    <h3 class="text-center">Categorias</h3>
        <br><br>



            <?php 

                if (isset($_POST['submit'])) 
                {
                    //Add the food in Database
                    

                    //1. Get the data from Form 
                    $title = $_POST['title'];   
                    // 2.Upload the image if slected
                    // Check whether the select image is clicked or not and upload the image only  if the image is slected 
                    if (isset($_FILES['image']['name']))////// ***************************************************************************** ************************** * **buradaki if bloğuna giremedik
                    {
                        //Get the details of the selected image

                        $image_name= $_FILES['image']['name'];

                        // check İmage selected or not and upload image only upload if  selected

                        if ($image_name !="") 
                        { 
                            // its main image is selected
                            

                            //A.Rename the image

                            $ext =end(explode(".", $image_name));

                             
                            //Create a new name for image

                            $image_name="Food-Category-".rand(0000,9999).".".$ext;

                            //B.Upload the image

                            //sourch path is the current location of the image 

                            $src = $_FILES['image']['tmp_name'];

                            //destinetion path for the image to be uploaded 
                            $dst= "../images/category/".$image_name;

                            //finnaly upload the food image
                            $upload = move_uploaded_file($src, $dst);

                            //check whether image uploaded or not
                            if ($upload==false) 
                            {
                                //Faild the upload image    
                                //redirect to Add food page with error message
                                $_SESSION['info-error'] = "<div class='error'> it has not upload image </div>";

                                    header("location:".SITEURL."admin/manage-category.php");
                                //Stop the process
                                die();
                            }
                            else
                            {
                                //Faild the upload image    
                                //redirect to Add food page with error message
                                $_SESSION['info-succes'] = "<div class='success'><br>  Resim dizine yüklendi</div>";

                                    //header("location:".SITEURL."admin/manage-food.php");
                                //Stop the process  
                                //die();
                            }


                        }
                        else
                        {
                            //Faild the upload image    
                                //redirect to Add food page with error message
                                $_SESSION['info-error'] = "<div class='error'> image-name ye geğer atanmdı ve boş</div>";

                                    header("location:".SITEURL."admin/manage-category.php");
                                //Stop the process  
                                
                        }

                        
                    }
                    else 
                    {
                        $image_name=""; //setting defauld value as blank
                        $_SESSION['kontrol'] = "<div class='success'> Hataa </div>";

                                    header("location:".SITEURL."admin/manage-category.php");
                                //Stop the process  
                                die();
                    }

                    // 3.Insert  into Database

                    //create a sql query to Save or add Food

                    $sql2 = "INSERT INTO tbl_category SET 
                    title ='$title',  
                    image_name = '$image_name',
                    active = 'Yes'
                    ";

                    //execute Query

                    $res2 = mysqli_query($conn, $sql2);
                    //CHeck whether Data inserted or not
                    if ($res2==true) 
                    {
                        //Data insert the succsessfly

                        $_SESSION['add'] = "<div class='success'> Data is Successfly added to Database</div>";
                        header("location:".SITEURL."admin/manage-category.php");

                    }
                    else
                    {
                        //Data not inserted
                        $_SESSION['add'] = "<div class='error'> Failed added food </div>";
                        header("location:".SITEURL."admin/manage-category.php");

                    }

                        // 4. redirect with message to Mange Food page


                }



             ?>
           

        <div class="px-2">
             <table class=" table tbl-full">
                <tr> 
                    <th>Foto</th>
                    <th>Titulo</th>
                    <th>Numero de refeicoes</th>    
                    <th>Movimentos</th>
                </tr>


                 <?php 

                 $sql ="SELECT * FROM tbl_category";

                $res = mysqli_query($conn, $sql);

                if ($res == true) {
                    $count = mysqli_num_rows($res);
                    if ($count > 0 )
                    {
                         
                      
                        while ($rows = mysqli_fetch_assoc($res)) 
                        {
                            $category_id = $rows['id']; 
                            $title = $rows['title'];  
                            $image_name = $rows['image_name'];   

                            $sql2 ="SELECT * FROM tbl_category WHERE id='$category_id' ";
                            $res2 = mysqli_query($conn, $sql2);
                            $row2 = mysqli_fetch_assoc($res2);
                            $category_name = $row2['title'];


                            ?>

                            <tr>
                                 
                                <td class=" ">
                                    <?php 
                                        if ($image_name!="") {
                                            ?>
                                            <img src="../images/category/<?php echo $image_name; ?>"  width="115px">
                                            <?php
                                        }
                                        else
                                        {
                                              ?>
                                            <img src="../images/noimage.jpg"  width="115px">
                                            <?php
                                        }

                                     ?>
                                    
                                </td>
                                <td style="width:20%;"><?php echo "<b>". $title."</b>"; ?></td>  
                                 
                                 <td>
                                     <?php
                                        



                                      

                                    $id= $category_id;
                                        // Veritabanı bağlantısı ve diğer gerekli ayarları gerçekleştirin

                                        // Yiyecek sayısını almak için SQL sorgusu
                                        $sql = "SELECT COUNT(*) as food_count FROM tbl_food WHERE category_id = :id";

                                        // Sorguyu hazırla
                                        $stmt = $db->prepare($sql);

                                        // Parametreyi bağla
                                        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

                                        // Sorguyu çalıştır
                                        $stmt->execute();

                                        // Sonucu al
                                        $result = $stmt->fetch(PDO::FETCH_ASSOC);

                                        // Yiyecek sayısını elde et
                                        $foodCount = $result['food_count'];

                                        // Sonucu kullan
                                        echo "<p >  Existem <b class='text-danger bold'>  $foodCount  </b> alimentos. <p>";

                                      ?>
                                 </td>
                              
                                <td>
                                    <div class="btn-group-vertical" role="group" aria-label="Vertical button group">



                                          <!-- <button type="button" class="btn btn-danger">Sil</button> -->
                                   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?php echo "category-".$category_id; ?>">Atualizar</button>
                                   
                                  <!-- Modal for update product information -->
<div class="modal fade" id="<?php echo "category-".$category_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="<?php echo "product-label-".$category_id; ?>"><?php echo $category_name;  ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <form action="<?php echo SITEURL."admin/update/category.php"; ?>"  method="post" enctype="multipart/form-data">
      <div class="modal-body">
          
                <div class="form-group">
                    <label for="isim">Titule:</label>
                    <input type="text" class="form-control" id="isim" name="title" value="<?php echo $category_name ?>" required>
                </div>
                <div class="form-group m-3">
                    <label for="image">Imagem atual:</label>
                    <img src="<?php echo SITEURL."/images/category/".$image_name; ?>" width="50px">
                    <input type="hidden" name="current_image" value="<?php echo $image_name; ?>">
                </div> 
                 <div class="mb-3">
                    <label for="image" class="form-label">Selecione a imagem:</label>
                    <input type="file" class="form-control" id="image" name="category-image">
                  </div>

                  <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
            
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" name="update" class="btn btn-primary">Atualizar</button>
      </div>
       </form>
    </div>
  </div>
</div>




                                        <a href="#" class="btn-dangery btn disabled" type="button">Excluir </a>
                                       
                                    </div>
                                    </br><br>

                                  
                                </td>
                            </tr>


                            <?php




                        }
                    }
                    else
                    {
                        //Food not Added  in database
                        echo "<tr><td colspan='7' class='error'> Alimentos ainda nao adicionados</td></tr>";
                    }
                }

             ?>

                <tr>
                    
                </tr>
            </table>
        </div>
            
    </div>
 </div>


  




 <!-- Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="addCategoryModalLabel">Yeni Kategori Ekle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Kategori ekleme formu -->
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Food Title">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Select Image:</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
            </div>
        </form>


      </div>
    </div>
  </div>
</div>


<br> <br> <br><br> <br> <br><br> <br> <br><br> <br> <br>
  
<?php include('partials/footer.php'); ?>