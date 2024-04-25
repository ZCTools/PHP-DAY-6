<?php

// SIEM Uygulaması(Basit Saldırı Tespit Aracı)

// Basit bir log kaydı fonksiyonu
function logEvent($event) {
    $file = 'events.log';
    $current = file_get_contents($file);
    $current .= "$event\n";
    file_put_contents($file, $current);
}

// Basit bir saldırı tespit fonksiyonu
function detectAttack($requestData) {
    $suspiciousPatterns = ['/admin', 'DROP TABLE', 'SELECT * FROM'];
    foreach ($suspiciousPatterns as $pattern) {
        if (strpos($requestData, $pattern) !== false) {
            return true;
        }
    }
    return false;
}

// Örnek bir olay yönetimi
$requestData = $_SERVER['REQUEST_URI'];
if (detectAttack($requestData)) {
    logEvent("Saldırı Tespit Edildi: " . $requestData);
    // Burada saldırıyı durdurmak için ek önlemler alınabilir
    die('Saldırı tespit edildi, erişim engellendi!');
}

// Normal iş akışı
echo "Normal sayfa içeriği burada yer alır.";



?>