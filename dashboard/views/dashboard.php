<div class="mb-8 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-gray-800">Панель управления базой знаний</h1>
    <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
        <i class="fas fa-plus mr-2"></i> Добавить документ
    </button>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-500">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-blue-100 text-blue-500 mr-4">
                <i class="fas fa-copy text-2xl"></i>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 uppercase">Всего документов</p>
                <p class="text-2xl font-bold text-gray-800"><?php echo $stats['total']; ?></p>
            </div>
        </div>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-100 text-green-500 mr-4">
                <i class="fas fa-check-circle text-2xl"></i>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 uppercase">Актуальные</p>
                <p class="text-2xl font-bold text-gray-800"><?php echo $stats['active']; ?></p>
            </div>
        </div>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-500">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-yellow-100 text-yellow-500 mr-4">
                <i class="fas fa-archive text-2xl"></i>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 uppercase">Архив</p>
                <p class="text-2xl font-bold text-gray-800"><?php echo $stats['archive']; ?></p>
            </div>
        </div>
    </div>
</div>

<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <div class="p-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
        <h2 class="text-lg font-semibold text-gray-700">Последние обновления</h2>
        <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                <i class="fas fa-search"></i>
            </span>
            <input type="text" placeholder="Поиск по документам..." class="pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
    </div>
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Название документа
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Тип / Категория
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Версия
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Статус
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Действия
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($documents as $doc): ?>
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <div class="flex items-center">
                        <div class="ml-3">
                            <p class="text-gray-900 whitespace-no-wrap font-medium">
                                <?php echo htmlspecialchars($doc['title']); ?>
                            </p>
                            <p class="text-gray-600 whitespace-no-wrap text-xs">
                                Обновлено: <?php echo $doc['updated_at']; ?>
                            </p>
                        </div>
                    </div>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap"><?php echo htmlspecialchars($doc['type']); ?></p>
                    <p class="text-gray-600 whitespace-no-wrap text-xs"><?php echo htmlspecialchars($doc['category_name']); ?></p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <span class="px-2 py-1 bg-gray-200 text-gray-700 rounded-full text-xs">v<?php echo $doc['version']; ?></span>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                        <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                        <span class="relative text-xs"><?php echo $doc['status']; ?></span>
                    </span>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <button class="text-blue-600 hover:text-blue-900 mr-3">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="text-red-600 hover:text-red-900">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
