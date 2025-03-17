# :lock: PHP Hash (MD5/SHA1/CRC32) Collision Scanner 

## :rocket: PHP Security 101: What is the PHP Type Juggling Attack? 🇬🇧
PHP is a loosely typed language, which means it tries to predict the programmer's intent and automatically converts variables to different types whenever it seems necessary. For example, a string containing only numbers can be treated as an integer or a float. However, this automatic conversion (or type juggling) can lead to unexpected results, especially when comparing variables using the '==' operator, which only checks for value equality (loose comparison), not type and value equality (strict comparison).

![table_representing_behavior_of_PHP_with_loose_type_comparisons](https://github.com/user-attachments/assets/aacfd188-5a7c-43ff-9026-26be1a787c91)

PHP type juggling vulnerabilities arise when loose comparison (== or !=) is employed instead of strict comparison (=== or !==) in an area where the attacker can control one of the variables being compared. This vulnerability can result in the application returning an unintended answer to the true or false statement, and can lead to severe authorization and/or authentication bugs.

```
<?php
var_dump('0010e2' == '1e3'); // bool(true);
var_dump(md5('240610708') == md5('QNKCDZO')); // bool(true);
var_dump(md5('aabg7XSs')  == md5('aabC9RqS')); // bool(true);
var_dump(sha1('aaroZmOk') == sha1('aaK1STfY')); // bool(true);
var_dump(sha1('aaO8zKZF') == sha1('aa3OFF9m')); // bool(true);
?>
```
- **Loose** comparison: using `== or !=` : both variables have "the same value".

```
<?php
var_dump('0010e2' === '1e3'); // bool(false);
var_dump('0010e2' === '1e3'); // bool(false);
var_dump(md5('240610708') === md5('QNKCDZO')); // bool(false);
var_dump(md5('aabg7XSs')  === md5('aabC9RqS')); // bool(false);
var_dump(sha1('aaroZmOk') === sha1('aaK1STfY')); // bool(false);
var_dump(sha1('aaO8zKZF') === sha1('aa3OFF9m')); // bool(false);
?>
```

- **Strict** comparison: using `=== or !==` : both variables have "the same type and the same value".

## :rocket: PHP Güvenliği 101: PHP Tip Hokkabazlığı Saldırısı Nedir? (🇹🇷)
PHP gevşek tipli bir dildir, yani programcının amacını tahmin etmeye çalışır ve gerekli gördüğü durumlarda değişkenleri otomatik olarak farklı tiplere dönüştürür. Örneğin, yalnızca sayı içeren bir dize bir tamsayı veya bir float olarak ele alınabilir. Ancak, bu otomatik dönüştürme (veya tür hokkabazlığı), özellikle tür ve değer eşitliğini (katı karşılaştırma) değil, yalnızca değer eşitliğini (gevşek karşılaştırma) kontrol eden '==' operatörünü kullanarak değişkenleri karşılaştırırken beklenmedik sonuçlara yol açabilir.

![table_representing_behavior_of_PHP_with_loose_type_comparisons](https://github.com/user-attachments/assets/aacfd188-5a7c-43ff-9026-26be1a787c91)

PHP tip hokkabazlığı güvenlik açıkları, saldırganın karşılaştırılan değişkenlerden birini kontrol edebildiği bir alanda katı karşılaştırma (=== veya !==) yerine gevşek karşılaştırma (== veya !=) kullanıldığında ortaya çıkar. Bu güvenlik açığı, uygulamanın doğru veya yanlış ifadesine istenmeyen bir yanıt döndürmesine neden olabilir ve ciddi yetkilendirme ve/veya kimlik doğrulama hatalarına yol açabilir.

```
<?php
var_dump('0010e2' == '1e3'); // bool(true);
var_dump(md5('240610708') == md5('QNKCDZO')); // bool(true);
var_dump(md5('aabg7XSs')  == md5('aabC9RqS')); // bool(true);
var_dump(sha1('aaroZmOk') == sha1('aaK1STfY')); // bool(true);
var_dump(sha1('aaO8zKZF') == sha1('aa3OFF9m')); // bool(true);
?>
```
- **Gevşek** karşılaştırma: `== veya !=` kullanarak: her iki değişken de "aynı değere" sahiptir.
```
<?php
var_dump('0010e2' === '1e3'); // bool(false);
var_dump('0010e2' === '1e3'); // bool(false);
var_dump(md5('240610708') === md5('QNKCDZO')); // bool(false);
var_dump(md5('aabg7XSs')  === md5('aabC9RqS')); // bool(false);
var_dump(sha1('aaroZmOk') === sha1('aaK1STfY')); // bool(false);
var_dump(sha1('aaO8zKZF') === sha1('aa3OFF9m')); // bool(false);
?>
```
- **Sıkı** karşılaştırma: `=== veya !==` kullanarak: her iki değişken de "aynı tür ve aynı değere" sahiptir.

## :runner: Tool Usage 🇬🇧
 - You have to edit "index.php" file (Hash type, hash code and length).
 - After that, install PHP with the command “apt install php”
 - Once PHP is installed, run the file via Terminal/SSH with the command “php index.php”

## :runner: Araç Kullanımı 🇹🇷
 - Öncelikle index.php içerisindeki hash çeşidi, hash kodu ve uzunluğu değerlerini düzenlemeniz gerekli.
 - Bu işlemin ardından "apt install php" komutuyla PHP yazılımını yükleyin.
 - PHP yüklendikten sonra "php index.php" komutuyla dosyayı terminal/SSH üzerinden çalıştırın

## :camera: Pics
![resim](https://github.com/user-attachments/assets/3fb8928c-1532-469a-bbea-c72342345183)


## Attack Prevention 🇬🇧
![resim](https://github.com/user-attachments/assets/703b26cd-821a-4fcf-ae05-dff410a2b09c)

Instead of the loose “==” operator, we should use the stricter “===” operator. This way the IDE will control if loops with stricter policies.

## Korunma Yöntemleri 🇹🇷
![resim](https://github.com/user-attachments/assets/703b26cd-821a-4fcf-ae05-dff410a2b09c)

Gevşek olan “==” operatörü yerine kontrolleri daha katı olan “===” operatörü ile yapmalıyız. Bu şekilde IDE daha katı politikalarla if döngülerini kontrol edecektir.

## References / Referanslar
- https://github.com/swisskyrepo/PayloadsAllTheThings/blob/master/Type%20Juggling/README.md
- https://okankurtulus.com.tr/2022/06/07/php-type-juggling-zafiyeti/
