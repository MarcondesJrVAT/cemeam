<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border rounded-lg divide-y divide-gray-200 border dark:border-gray-500">
                    <div class="flex items">
                        <div class="py-3 px-4 w-1/2 text-start">
                            <div class="relative max-w-xs sr-only">
                                Pesquisa
                            </div>
                        </div>
                        <div class="py-3 px-4 w-1/2 text-end">
                            <div class="relative max-w">
                                @livewire('admin.acl.permissions.partials.create-permission')
                            </div>
                        </div>
                    </div>
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-500">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col" class="py-3 px-4 pe-0">
                                    <div class="flex items-center h-5">
                                        <input id="hs-table-pagination-checkbox-all" type="checkbox" class="border-gray-200 dark:border-gray-500 rounded text-blue-600 focus:ring-blue-500">
                                        <label for="hs-table-pagination-checkbox-all" class="sr-only">Checkbox</label>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-200 uppercase">#</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-200 uppercase">Nome</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-200 uppercase">Slug</th>
                                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 dark:text-gray-200 uppercase">Ações</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                            @foreach($permissions as $permission)
                                <tr class="dark:hover:bg-gray-600 hover:bg-gray-300">
                                    <td class="py-3 ps-4">
                                        <div class="flex items-center h-5">
                                            <input id="hs-table-pagination-checkbox-1" type="checkbox" class="border-gray-200 dark:border-gray-500 rounded text-blue-600 focus:ring-blue-500">
                                            <label for="hs-table-pagination-checkbox-1" class="sr-only">Checkbox</label>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-normal text-sm font-medium text-gray-800 dark:text-gray-200">{{ $permission->id }}</td>
                                    <td class="px-6 py-4 whitespace-normal text-sm font-medium text-gray-800 dark:text-gray-200">{{ $permission->name }}</td>
                                    <td class="px-6 py-4 whitespace-normal text-sm font-medium text-gray-800 dark:text-gray-200">{{ $permission->slug }}</td>
                                    <td class="px-6 py-4 whitespace-normal text-end text-sm font-medium">
                                        <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">D</button>
                                        <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">E</button>
                                        <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">X</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="relative px-4 py-1 mt-4">
                        <nav class="flex space-x-1 place-content-center">
                            {{ $permissions->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
