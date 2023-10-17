<?php
// Kullanıcının tercih ettiği dili veya varsayılan dili belirleyin
$preferredLanguage = isset($_GET['lang']) ? $_GET['lang'] : 'tr_TR';

// Dil dosyasını dahil etmek için dosya yolu
$langFilePath = 'lang/' . $preferredLanguage . '.php';

// Eğer dil dosyası mevcutsa, dahil et
if (file_exists($langFilePath)) {
    $lang = include($langFilePath);
} else {
    // Dili bulamazsanız varsayılan bir dil dosyasını dahil edebilirsiniz
    $lang = include('lang/en_US.php');
}

// Şimdi, metinleri çevirmek için bir işlev oluşturun
function __($key) {
    global $lang;

    if (isset($lang[$key])) {
        return $lang[$key];
    }

    return $key;
}
?>

<!DOCTYPE html>
<html lang="<?= $preferredLanguage ?>">
<head>
    <meta charset="UTF-8">
    <title><?= __('welcome') ?></title>
</head>
<body>
    <header>
        <h1><?= __('welcome') ?></h1>
        <nav>
            <ul>
                <li><a href="?lang=tr_TR"><?= __('Turkish') ?></a></li>
                <li><a href="?lang=en_US"><?= __('English') ?></a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <section>
            <h2><?= __('about') ?></h2>
            <p><?= __('about_text') ?></p>
        </section>

        <section>
            <h2><?= __('contact') ?></h2>
            <p><?= __('contact_text') ?></p>
        </section>
    </main>
</body>
</html>
