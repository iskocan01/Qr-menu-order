her masa için  kendine özel qrkod çalışması ile müşteri istediği zaman telefonundan sipariş verebilecek. Siparişi tamamladığında admin panelinden hangi numaralı masadan sipariş  geldiğini görebileceğiz. 
Bu olayı masa numaraları GET ile gönderdiğimiz sayfada istediğimiz gibi işleyebiliriz. sayfa başında yani table-order klasöründe gezine bilmek için ilk önce GET edilmeyen bir değer olmadığında bizi qr okutmamızı gösteren bir sayfaya yönlendiriliyoruz.
İlk linkimizde GET var ise bu GET değerini cerezlere kayıt ediyoruz. siparişi tamamladığı anda Bu cerezi siliyoruz. Bu sayede qr okutmadan sipariş verilemez.
![image](https://github.com/iskocan01/Qr-menu-order/assets/116522309/ab807e41-991f-46e7-8235-3d2728d027f6)
Bu resimde qr okutmamız gerektiğini sözleyen bir mesaj içeriyor.
![image](https://github.com/iskocan01/Qr-menu-order/assets/116522309/ba118fff-091f-4b34-a424-ab7419df055f)
Bu şekilde masaden gelen siparişleri görebiliriz.
![image](https://github.com/iskocan01/Qr-menu-order/assets/116522309/cf1abed3-e6b3-4d47-8fb3-59e31aa9b4e6)
Genel masa görüntüsünde siparişi olan masaların ne zaman açıldığı , Toplam masa tutarı,  masa numarası , masa kapatma buttonu ve siparişleri gösterme buttonumuz bulunmakta.
![image](https://github.com/iskocan01/Qr-menu-order/assets/116522309/b82370e6-b012-4ee9-ac81-de748aba8f82)
Şipariş görüntülendiği zaman masadaki gelen siparişleri görebiliriz. masayı kapatmadan aynı masan başka sipariş geldiğinde farklı sipariş olarak aynı maasya eklenecektir.
