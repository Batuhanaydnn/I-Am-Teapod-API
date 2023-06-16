# I AM A TEAPOD API

Proje, `GorevController` ve `UsersController` adlı iki HTTP istemci kontrolcüsü sınıfını içeren bir PHP tabanlı web uygulamasıdır. Uygulama, görevlerin ve kullanıcıların yönetimini sağlar. Bu README dosyası, projenin genel tanımını, kullanımını ve API'nin endpoint'lerini içeren ayrıntıları sağlar.

## Class Diyagramları

### GorevController

Bu sınıf, görevlerin yönetimiyle ilgili işlevleri sağlar. Aşağıdaki metodları içerir:

-   `getTasks`: Tüm görevleri getirir.
-   `getTask`: Belirli bir görevi getirir.
-   `postTask`: Yeni bir görev ekler.
-   `deleteTask`: Belirli bir görevi siler.
-   `putAdminTask`: Belirli bir görevi günceller (yönetici yetkisi gerektirir).
-   `putUserTask`: Belirli bir görevi günceller (kullanıcı yetkisi gerektirir).
-   `taskSelection`: Belirli bir ölçüte göre görevleri getirir.

### UsersController

Bu sınıf, kullanıcıların yönetimiyle ilgili işlevleri sağlar. Aşağıdaki metodları içerir:

-   `getUsers`: Tüm kullanıcıları getirir.
-   `getUser`: Belirli bir kullanıcıyı getirir.
-   `postUser`: Yeni bir kullanıcı ekler.
-   `deleteUser`: Belirli bir kullanıcıyı siler.
-   `putUser`: Belirli bir kullanıcıyı günceller.
-   `getLogin`: Kullanıcı girişini doğrular.
-   `userSelection`: Belirli bir ölçüte göre kullanıcıları getirir.

### ApiKeyMiddleware

Bu sınıf, API anahtarını doğrulamak ve kullanıcı yetkilendirmesi yapmak için bir ara yazılım sağlar.

## Endpointler

-   `/v1/user`
    
    -   `GET`: Belirli bir kullanıcıyı getirir.
    -   `DELETE`: Belirli bir kullanıcıyı siler.
    -   `PUT`: Belirli bir kullanıcıyı günceller.
    -   `POST`: Yeni bir kullanıcı ekler.
-   `/v1/users`
    
    -   `GET`: Tüm kullanıcıları getirir.
-   `/v1/userSelection`
    
    -   `GET`: Belirli bir ölçüte göre kullanıcıları getirir.
-   `/v1/login`
    
    -   `GET`: Kullanıcı girişini doğrular.
-   `/v1/task`
    
    -   `GET`: Belirli bir görevi getirir.
    -   `POST`: Yeni bir görev ekler.
    -   `DELETE`: Belirli bir görevi siler.
    -   `PUT`: Belirli bir görevi günceller (yönetici yetkisi gerektirir).
-   `/v1/tasks`
    
    -   `GET`: Tüm görevleri getirir.
-   `/v1/taskSelection`
    -   `GET`: Belirli bir ölçüte göre görevleri getirir.

## Kullanım

Bu web uygulamasını kullanmak için aşağıdaki adımları izleyebilirsiniz:

1.  Projeyi klonlayın veya indirin.
2.  Gereksinimleri yüklemek için aşağıdaki komutu çalıştırın: `composer install`
3.  Veritabanı bağlantı ayarlarını `config/database.php` dosyasında yapılandırın.
4.  Projeyi bir web sunucusunda çalıştırın.

## Katkıda Bulunma

Eğer projeye katkıda bulunmak isterseniz, aşağıdaki adımları izleyebilirsiniz:

1.  Bu depoyu (`repository`) fork edin.
2.  Yeni bir özellik veya iyileştirme için bir `branch` oluşturun.
3.  Yaptığınız değişiklikleri `commit` edin.
4.  `branch`'inizi `forked repository`'e (`forked repository`) push edin.
5.  Bir `pull request` oluşturun.

Lütfen yapacağınız değişiklikler için açıklayıcı bir açıklama yapın ve kodunuzu test edin.

## Lisans

Bu proje [MIT lisansı](https://opensource.org/licenses/MIT) ile lisanslanmıştır. Detaylı bilgi için `LICENSE` dosyasına bakabilirsiniz.

## İletişim

Herhangi bir sorunuz veya öneriniz varsa, bana [email](mailto:info@batuhanaydn.com) adresinden ulaşabilirsiniz.

Bu README dosyasında projenin temel kullanımını ve katkıda bulunma yönergelerini bulabilirsiniz. Ayrıca lisans bilgilerini ve iletişim detaylarını da içermektedir.

Umarım bu bilgiler işinize yarar. Başka bir sorunuz varsa, yardımcı olmaktan mutluluk duyarım.