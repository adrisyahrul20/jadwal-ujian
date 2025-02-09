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
                        <div class="flex gap-4 mt-3 items-center">
                            <p class="dark:text-white">Lihat berdasarkan kelas: </p>
                            @foreach ($kelas as $list)
                                <a href="{{ route('admin.dashboard.kelas') }}?kelas={{ $list->id }}"
                                    class="btn btn-success bg-yellow-500 text-black rounded-lg px-4 py-2">{{ $list->kdkls }}</a>
                            @endforeach
                            @if ($semua)
                                <a href="{{ route('admin.dashboard.index') }}"
                                    class="btn btn-success bg-yellow-500 text-black rounded-lg px-4 py-2">Lihat
                                    Semua</a>
                            @endif
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
                                        Mata Pelajaran
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Hari Ujian
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal Ujian
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jam Mulai
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jam Selesai
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
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $list->idMapel->nmmapel }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ Carbon::parse($list->hari_ujian)->translatedFormat('l') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ Carbon::parse($list->hari_ujian)->translatedFormat('d F Y') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $list->waktu_mulai }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $list->waktu_selesai }}
                                        </td>
                                        <td class="px-6 py-4">
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
