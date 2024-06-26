<div>
    <div class="w-full">
        @if (session()->has('success'))
            <div id="alert" class="place-content-center bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative flex transition-opacity duration-500 ease-in-out" role="alert">
                <div>
                    <strong class="font-bold">Cadastrado!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="relative right-0 ease-in-out">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"></path></svg>
                </button>
            </div>
        @endif
    </div>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="border rounded-lg divide-y divide-gray-200 border dark:border-gray-500">
                        <div class="flex items">
                            <div class="py-3 px-4 w-1/2 text-start">
                                <div class="relative max-w-xs sr-only">
                                    <label class="sr-only">Search</label>
                                    <input type="text" wire:model="search" placeholder="Pesquisar Funções..." class="py-2 px-3 ps-9 block w-full dark:bg-gray-800 border-gray-200 dark:border-gray-500 shadow-sm rounded-lg dark:text-gray-200 focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Search for items">
                                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                                        <svg class="size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <path d="m21 21-4.3-4.3"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="py-3 px-4 w-1/2 text-end">
                                <div class="relative max-w">
                                    @livewire('admin.acl.roles.partials.create-role')
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
                                @foreach($roles as $role)
                                    <tr class="dark:hover:bg-gray-600 hover:bg-gray-300">
                                        <td class="py-3 ps-4">
                                            <div class="flex items-center h-5">
                                                <input id="hs-table-pagination-checkbox-1" type="checkbox" class="border-gray-200 dark:border-gray-500 rounded text-blue-600 focus:ring-blue-500">
                                                <label for="hs-table-pagination-checkbox-1" class="sr-only">Checkbox</label>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-normal text-sm font-medium text-gray-800 dark:text-gray-200">{{ $role->id }}</td>
                                        <td class="px-6 py-4 whitespace-normal text-sm font-medium text-gray-800 dark:text-gray-200">{{ $role->name }}</td>
                                        <td class="px-6 py-4 whitespace-normal text-sm text-gray-800 dark:text-gray-200">{{ $role->slug }}</td>
                                        <td class="flex justify-end px-6 py-4 space-x-1 whitespace-normal text-sm font-medium">
                                            <a href="#" type="button" class="text-blue-500" title="Detalhes de {{ $role->name }}">
                                                <x-icons.eye aria-hidden="true" />
                                            </a>
                                            <a href="#" type="button" class="text-blue-500" title="Editar {{ $role->name }}">
                                                <x-icons.pencil-square aria-hidden="true" />
                                            </a>
                                            <button type="button" class="text-blue-500" title="Remover {{ $role->name }}" wire:click="confirmUserRemoval({{ $role->id }})">
                                                <x-icons.x-circle aria-hidden="true" />
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="relative px-4 py-1 mt-4">
                            <nav class="flex space-x-1 place-content-center">
                                {{ $roles->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const alert = document.getElementById('alert');
            if (alert) {
                setTimeout(() => {
                    alert.style.opacity = 0;
                    setTimeout(() => alert.remove(), 500);
                }, 3000);
            }
        });
    </script>
@endpush
