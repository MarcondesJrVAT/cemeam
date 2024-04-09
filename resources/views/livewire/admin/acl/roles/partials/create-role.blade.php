<div>
    <div class="flex inline-flex space-x-2 justify-items-center ">
        <div>
            <button wire:click="toggleModal" class="flex space-x-2 bg-blue-500 hover:bg-blue-700 border border-blue-400 text-white font-bold py-2 px-4 rounded">
                <x-icons.plus-circle/>
                <label class="text-xl font-medium">Nova Função</label>
            </button>
        </div>
    </div>
    @if($showModal)
        <div class="fixed z-20 inset-0 bg-gray-800 bg-opacity-75">
            <div class="flex items-center justify-center px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div class="inline-block align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="dark:bg-gray-800 bg-gray-100 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="w-full mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Nova Função
                                    </h3>
                                    <button wire:click="toggleModal" type="button" class="inline-flex items-center justify-center w-10 h-10 text-red-400 dark:text-red-400 transition-colors duration-150 bg-white rounded-full focus:shadow-outline hover:bg-gray-100 hover:text-red-700 dark:hover:text-red-700 dark:bg-gray-800 dark:focus:bg-gray-700">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Fechar Modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form wire:submit.prevent="submit" class="p-4 md:p-5">
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-2">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome</label>
                                            <input type="text" wire:model="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Name" required>
                                            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="text-white inline-flex space-x-2 items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <x-icons.plus-circle class="w-4 h-4 mx-2" />
                                        <label class="text-xl font-medium">Finalizar</label>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
