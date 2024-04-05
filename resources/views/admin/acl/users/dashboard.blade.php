<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="border rounded-lg divide-y divide-gray-200 border dark:border-gray-500">
                        <div class="flex items">
                            <div class="py-3 px-4 w-1/2 text-start">
                                <div class="relative max-w-xs">
                                    <label class="sr-only">Search</label>
                                    <input type="text" wire:model="search" placeholder="Pesquisar usuários..." class="py-2 px-3 ps-9 block w-full dark:bg-gray-800 border-gray-200 dark:border-gray-500 shadow-sm rounded-lg dark:text-gray-200 focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Search for items">
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
                                    @livewire('create-user')
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
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-200 uppercase">Name</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-200 uppercase">Email</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-200 uppercase">About</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-200 uppercase">Roles</th>
                                    <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 dark:text-gray-200 uppercase">Action</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                @foreach($users as $user)
                                    <tr class="dark:hover:bg-gray-600 hover:bg-gray-300">
                                        <td class="py-3 ps-4">
                                            <div class="flex items-center h-5">
                                                <input id="hs-table-pagination-checkbox-1" type="checkbox" class="border-gray-200 dark:border-gray-500 rounded text-blue-600 focus:ring-blue-500">
                                                <label for="hs-table-pagination-checkbox-1" class="sr-only">Checkbox</label>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $user->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $user->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">sobre</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            @foreach($user->roles as $role)
                                                <span class="inline-block bg-blue-100 text-blue-900 text-sm font-medium mb-1 me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-100">
                                                    {{ $role->display_name }}
                                                </span>

                                            @endforeach
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
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
                                {{ $users->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
