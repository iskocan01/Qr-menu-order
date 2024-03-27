<!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
             <ul>
              
                <li>
                    <a href="https://www.instagram.com/bellanayrestaurante/?igshid=NTc4MTIwNjQ2YQ%3D%3D"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                
                <li>
                    <a href="https://wa.me/+5511940041471?text=Olá!" target="_blank" id="whatsapp-button"  ><img src="https://img.icons8.com/fluent/48/000000/whatsapp.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

     <!--footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">Mehmet Hasan Alphan</a></p>
        </div>
    </section>

      <script>
    document.getElementById("whatsapp-button").addEventListener("click", function() {
      var phoneNumber = "+55 (11) 94004-1471"; // Hedeflenen telefon numarasını buraya ekleyin
      var message = "Olá!"; // Göndermek istediğiniz mesajı buraya ekleyin
      var whatsappURL = "https://api.whatsapp.com/send?phone=" + phoneNumber + "&text=" + encodeURIComponent(message);
      window.open(whatsappURL, "_blank");
    });
  </script>

    <!-- footer Section Ends Here -->


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <!--
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    
    <script src="<?php echo SITEURL; ?>js/custom.js"></script>
  
  
</body>
</html>