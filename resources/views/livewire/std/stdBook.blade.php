<div>
    <x-slot name="title">{{ __('Book') }}</x-slot>
    <a
        class="flex items-center justify-between p-4 mb-8 mt-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <span>{{ __('Books ') }} {{ __($totalBook) }}</span>
        </div>        
    </a>
    @if (session()->has('success'))
        <div class="bg-green-400 p-5 rounded my-4">
            <b>{{ session('success') }}</b>
        </div>
    @endif
    @if ($showTable == true)
        {{-- category table --}}
        <div class="container">
            <div class="flex flex-grow-1">
                <input
                    class="w-75 py-3 px-2 my-4 text-sm text-gray-700 placeholder-gray-900 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-dark focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                    wire:model="search" type="text" placeholder="Search Here..." />
            </div>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs my-4">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Id</th>
                            <th class="px-4 py-3">Book Name</th>
                            <th class="px-4 py-3">Category</th>
                            <th class="px-4 py-3">Publisher</th>
                            <th class="px-4 py-3">Author</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Image</th>                            
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($books as $book)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div>
                                            <p class="font-semibold">{{ $book->id }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $book->book_name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $book->categories->category_name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $book->publishers->publisher_name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $book->authors->author_name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $book->book_status == 'Y' ? 'Available' : 'Not Available' }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    @php
                                        $images = App\Models\BookImages::WHERE('book_unique_id',
                                        $book->unique_id)->get();
                                    @endphp
                                    @foreach ($images as $item)
                                        <img src="{{asset('uploads/all')}}/{{$item->image}}"
                                        style="height: 100px; width: 100px;" alt="">
                                    @endforeach
                                </td>                                
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{ $books->links() }}
        </div>
    @endif    
</div>
