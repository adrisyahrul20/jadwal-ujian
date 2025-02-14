@php
    use Carbon\Carbon;

    Carbon::setLocale('id');
@endphp
<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mt-3 items-center">
                        @if($kelasnow)
                        <div class="flex gap-4 mt-3 items-center">
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
                                        <x-dropdown-link :href="route('admin.dashboard.kelas') . '?kelas=' . $list->id">
                                            {{ $list->kdkls }}
                                        </x-dropdown-link>
                                    @endforeach
                                </x-slot>
                            </x-dropdown>
                        </div>
                        @endif
                        <a href="{{ route('export.pdf') }}{{ $objFilter?->filter ? '?filter=' . $objFilter->filter : '' }}{{ $objFilter?->value ? '&value=' . $objFilter->value : '' }}"
                            class="btn bg-green-500 text-white px-4 py-2 rounded-lg">
                            Export PDF
                        </a>


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
                                        Kelas
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Pengawas
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $list)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                        <td class="px-6 py-4">
                                            {{ Carbon::parse($list->hari_ujian)->translatedFormat('l') }} / {{ Carbon::parse($list->hari_ujian)->translatedFormat('d F Y') }}
                                        </td>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $list->idMapel->nmmapel }}
                                        </th>
                                        <td class="px-6 py-4">
                                            <span class="text-nowrap">{{ $list->waktu_mulai }} - {{ $list->waktu_selesai }}</span>
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $list->idKelas->kdkls }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('admin.dashboard.guru') }}?guru={{ $list->idguru }}"
                                                class="dark:text-white underline">{{ $list->idGuru->nama }}</a>
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
</x-app-layout>
