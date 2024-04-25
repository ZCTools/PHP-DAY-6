<?php
    // ---- Dosya Türü Kontrolü ----

    // Dosya Türleri
    $yüklenecek_Dosya_Türleri = ["jpg", "jpeg", "png", "gif"];

    // Dosya yolunu / uzantısını kontrol etme
    $dosya_Adları = $_FILES['uploadedFile']['name'];
    $dosyaPath = pathinfo($dosya_Adları, PATHINFO_FILENAME);

    if (!in_array(strtolower($dosyaPath), $yüklenecek_Dosya_Türleri)) {
        die("Hata: sadece belirtilen resim dosyaları yüklenebilir...");
    }

    // ---- MIME Türünü Kontrol Etme ----

    $dosya_MIME_Türü = mime_content_type($_FILES['uploadedFile']['tmp_name']);
    if (!in_array($dosya_MIME_Türü, ["image/jpeg", "image/png", "image/gif"])) {
        die("Hata: Dosya türü geçersiz...");
    }

    // Virüs Tehtidine Karşı Dosya Boyutunu Sınırlama
    $max_Dosya_Boyutu = 5 * 1024 * 1024; // 5 MB     
    if ($_FILES['uploadedFile']['size'] > $max_Dosya_Boyutu) {
        die("Hata: Dosya boyutu çok büyük. Lütfen daha küçük boyutlu dosya seçin");
    }

?>