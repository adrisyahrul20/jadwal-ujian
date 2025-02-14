<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jadwal Ujian SMP N 2 Pulau Punjung</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif

    @php
        use Carbon\Carbon;

        Carbon::setLocale('id');
    @endphp
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 dark:text-white/50">
    @include('layouts.guestnav')

    <div class="max-w-7xl mx-auto text-black/80 py-4 px-4 sm:px-6 lg:px-8">
        <h1 class="text-center dark:text-white text-xl lg:text-3xl font-bold mt-6">Jadwal Ujian SMP N 2 Pulau Punjung
        </h1>

        <div class="flex justify-between mt-3 items-center">
            <div class="flex gap-4 items-center">
                <p class="dark:text-white">Lihat berdasarkan kelas: </p>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ $kelasnow }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('admin.dashboard.index')">
                            Semua
                        </x-dropdown-link>
                        @foreach ($kelas as $list)
                            <x-dropdown-link :href="route('filter-kelas') . '?kelas=' . $list->id">
                                {{ $list->kdkls }}
                            </x-dropdown-link>
                        @endforeach
                    </x-slot>
                </x-dropdown>
            </div>
            @if ($semua)
                <a href="{{ route('export.pdf') }}?filter={{ $objFilter->filter }}&value={{ $objFilter->value }}"
                    class="btn bg-green-500 text-white px-4 py-2 rounded-lg">
                    Export PDF
                </a>
            @endif
        </div>
        <div class="relative overflow-x-auto mt-4">
            <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                <thead
                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        
                        <th scope="col" class="px-6 py-3">
                            Hari/TGL
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Mata Pelajaran
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Waktu
                        </th>
                        <th scope="col" class="px-6 py-3">
                            9A
                        </th>
                        <th scope="col" class="px-6 py-3">
                            9B
                        </th>
                        <th scope="col" class="px-6 py-3">
                            9C
                        </th>
                        <th scope="col" class="px-6 py-3">
                            9D
                        </th>
                        <th scope="col" class="px-6 py-3">
                            9E
                        </th>
                        <th scope="col" class="px-6 py-3">
                            8A
                        </th>
                        <th scope="col" class="px-6 py-3">
                            8B
                        </th>
                        <th scope="col" class="px-6 py-3">
                            8C
                        </th>
                        <th scope="col" class="px-6 py-3">
                            8D
                        </th>
                        <th scope="col" class="px-6 py-3">
                            8E
                        </th>
                        <th scope="col" class="px-6 py-3">
                            7A
                        </th>
                        <th scope="col" class="px-6 py-3">
                            7B
                        </th>
                        <th scope="col" class="px-6 py-3">
                            7C
                        </th>
                        <th scope="col" class="px-6 py-3">
                            7D
                        </th>
                        <th scope="col" class="px-6 py-3">
                            7E
                        </th>
                        <th scope="col" class="px-6 py-3">
                            7F
                        </th>
                        <th scope="col" class="px-6 py-3">
                            LAB
                        </th>
                        <th scope="col" class="px-6 py-3">
                            CAD
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal as $list)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <td class="px-6 py-4">
                                <span class="block !w-20">
                                    {{ Carbon::parse($list->hari_ujian)->translatedFormat('l') }} / {{ Carbon::parse($list->hari_ujian)->translatedFormat('d F Y') }}
                                </span>
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $list->idMapel->nmmapel }}
                            </th>
                            <td class="px-6 py-4">
                                <span class="text-nowrap">{{ $list->waktu_mulai }} - {{ $list->waktu_selesai }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('filter-guru') }}?guru={{ $list->kelas_12 }}"
                                    class="dark:text-white underline">{{ $list->kelas_12 }}</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('filter-guru') }}?guru={{ $list->kelas_13 }}"
                                    class="dark:text-white underline">{{ $list->kelas_13 }}</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('filter-guru') }}?guru={{ $list->kelas_14 }}"
                                    class="dark:text-white underline">{{ $list->kelas_14 }}</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('filter-guru') }}?guru={{ $list->kelas_15 }}"
                                    class="dark:text-white underline">{{ $list->kelas_15 }}</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('filter-guru') }}?guru={{ $list->kelas_16 }}"
                                    class="dark:text-white underline">{{ $list->kelas_16 }}</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('filter-guru') }}?guru={{ $list->kelas_7 }}"
                                    class="dark:text-white underline">{{ $list->kelas_7 }}</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('filter-guru') }}?guru={{ $list->kelas_8 }}"
                                    class="dark:text-white underline">{{ $list->kelas_8 }}</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('filter-guru') }}?guru={{ $list->kelas_9 }}"
                                    class="dark:text-white underline">{{ $list->kelas_9 }}</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('filter-guru') }}?guru={{ $list->kelas_10 }}"
                                    class="dark:text-white underline">{{ $list->kelas_10 }}</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('filter-guru') }}?guru={{ $list->kelas_11 }}"
                                    class="dark:text-white underline">{{ $list->kelas_11 }}</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('filter-guru') }}?guru={{ $list->kelas_1 }}"
                                    class="dark:text-white underline">{{ $list->kelas_1 }}</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('filter-guru') }}?guru={{ $list->kelas_2 }}"
                                    class="dark:text-white underline">{{ $list->kelas_2 }}</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('filter-guru') }}?guru={{ $list->kelas_3 }}"
                                    class="dark:text-white underline">{{ $list->kelas_3 }}</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('filter-guru') }}?guru={{ $list->kelas_4 }}"
                                    class="dark:text-white underline">{{ $list->kelas_4 }}</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('filter-guru') }}?guru={{ $list->kelas_5 }}"
                                    class="dark:text-white underline">{{ $list->kelas_5 }}</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('filter-guru') }}?guru={{ $list->kelas_6 }}"
                                    class="dark:text-white underline">{{ $list->kelas_6 }}</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('filter-guru') }}?guru={{ $list->kelas_17 }}"
                                    class="dark:text-white underline">{{ $list->kelas_17 }}</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('filter-guru') }}?guru={{ $list->kelas_18 }}"
                                    class="dark:text-white underline">{{ $list->kelas_18 }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
