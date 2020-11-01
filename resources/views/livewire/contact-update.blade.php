<div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <form class="flex flex-wrap w-full" wire:submit.prevent="update">
            <input type="hidden" wire:model="contactId">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Name
                </label>
                <input wire:model="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('name') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-first-name" type="text" placeholder="Jane">
                @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Phone
                </label>
                <input wire:model="phone" class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('phone') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="+628126498">
                @error('phone')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center ml-3 mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

