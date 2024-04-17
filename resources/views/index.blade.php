<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sports Player Search</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
            </div>
            <br>
            <div class="">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h2 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Sports
                            Players Search</h2>
                    </div>

                    <div class=" mt-10">
                        <form action="{{ url('/') }}" method="GET" class="grid grid-cols-6 gap-4">
                            <input type="text" name="name" placeholder="Search by name" class="col-span-2 p-2 border rounded" value="{{ request('name') }}">
                            <select name="nationality" class="col-span-2 p-2 border rounded">
                                <option value="" selected>Select nationality</option>
                                @foreach ($nationalities as $nationality)
                                <option value="{{ $nationality->nationality_id }}" {{ request('nationality') == $nationality->nationality_id ? 'selected' : null }}>
                                    {{ $nationality->nationality_name }}
                                </option>
                                @endforeach
                            </select>

                            <button type="submit" class="col-span-1 bg-blue-500 text-white p-2 rounded hover:bg-blue-700">
                                Search
                            </button>
                            <a href="/" class="col-span-1 p-2 rounded ">
                                Clear
                                </button>
                        </form>
                    </div>
                </div>
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                Name</th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                Nationality</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach ($players as $player)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                <a href="/player/{{$player->id}}">
                                                    {{ $player->name }} </a>
                                            </td>
                                            <td class=" whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $player->nationality_name }}
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6" aria-label="Pagination">
                <div class="hidden sm:block">
                    <p class="text-sm text-gray-700">
                        Showing
                        <span class="font-medium">{{ $players->firstItem() }}</span>
                        to
                        <span class="font-medium">{{ $players->lastItem() }}</span>
                        of
                        <span class="font-medium">{{ $players->total() }}</span>
                        results
                    </p>
                </div>
                <div class="flex flex-1 justify-between sm:justify-end">
                    @if (!$players->onFirstPage())
                    <a href="{{ $players->previousPageUrl() }}" class="relative inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:outline-offset-0">Previous</a>
                    @endif

                    @if ($players->hasMorePages())
                    <a href="{{ $players->nextPageUrl() }}" class="relative ml-3 inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:outline-offset-0">Next</a>
                    @else
                    <span class="relative ml-3 inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300">Next</span>
                    @endif
                </div>
            </nav>
        </div>
    </div>
</body>

</html>