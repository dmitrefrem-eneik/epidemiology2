<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'База знаний'; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <nav class="bg-blue-800 p-4 shadow-lg">
        <div class="container mx-auto flex items-center justify-between flex-wrap">
            <div class="flex items-center flex-shrink-0 text-white mr-6">
                <i class="fas fa-graduation-cap mr-2 text-2xl"></i>
                <span class="font-bold text-xl tracking-tight">ОЦ ФБУН ЦНИИ Эпидемиологии</span>
            </div>
            <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                <div class="text-sm lg:flex-grow">
                    <a href="index.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-200 hover:text-white mr-4">
                        <i class="fas fa-home mr-1"></i> Дашборд
                    </a>
                    <a href="#" class="block mt-4 lg:inline-block lg:mt-0 text-blue-200 hover:text-white mr-4">
                        <i class="fas fa-file-alt mr-1"></i> Документы
                    </a>
                </div>
                <div>
                    <span class="text-white text-sm mr-4">Администратор</span>
                    <a href="#" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-blue-800 hover:bg-white mt-4 lg:mt-0">Выйти</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-8">
        <?php echo $content; ?>
    </div>

    <footer class="bg-white border-t border-gray-200 p-4 mt-8">
        <div class="container mx-auto text-center text-gray-600 text-sm">
            &copy; 2026 Образовательный центр ФБУН ЦНИИ Эпидемиологии. Все права защищены.
        </div>
    </footer>
</body>
</html>
