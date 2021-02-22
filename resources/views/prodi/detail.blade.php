<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-grey-800 leading-tight">
            Detail Prodi
        </h2>
    </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="w-full rounded overflow-hidden shadow-lg px-6 py-6 bg-white">
                    <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                        <div class="w-full md:w-1/6 px-4 mb-4 md:mb-0">
                            <img src="{{ $item->gambar }}" alt="" class="w-full rounded">
                        </div>
                        <div class="w-full md:w-5/6 px-4 mb-4 md:mb-0">
                            <div class="flex flex-wrap mb-3">
                                <div class="w-2/6">
                                    <div class="text-sm">Prodi</div>
                                    <div class="text-xl font-bold">{{ $item->nama }}</div>
                                </div>
                                <div class="w-1/6">
                                    <div class="text-sm">Kategori</div>
                                    <div class="text-xl font-bold">{{ $item->kategori->name }}</div>
                                </div>
                                <div class="w-2/6">
                                    <div class="text-sm">Biaya</div>
                                    <div class="text-xl font-bold">{{ number_format($item->biaya) }}</div>
                                </div>
                                <div class="w-1/6">
                                    <div class="text-sm">Type</div>
                                    <div class="text-xl font-bold">{{ $item->types }}</div>
                                </div>
                            </div>
                            <div class="flex flex-wrap mb-3">
                                <div class="w-2/6">
                                    <div class="text-sm">Kampus</div>
                                    <div class="text-xl font-bold">{{ $item->kampus }}</div>
                                </div>
                                <div class="w-3/6">
                                    <div class="text-sm">Rate</div>
                                    <div class="text-xl font-bold">{{ $item->rate }}</div>
                                </div>
                                {{-- <div class="w-1/6">
                                    <div class="text-sm">Sistem Belajar</div>
                                    <div class="text-xl font-bold"></div>
                                </div> --}}
                            </div>
                            <div class="flex flex-wrap mb-3">
                                <div class="w-2/6">
                                    <div class="text-sm">Jenjang</div>
                                    <div class="text-xl font-bold">{{ $item->jenjang }}</div>
                                </div>
                                {{-- <div class="w-1/6">
                                    <div class="text-sm">Type</div>
                                    <div class="text-xl font-bold"></div>
                                </div> --}}
                                {{-- <div class="w-1/6">
                                    <div class="text-sm">Phone</div>
                                    <div class="text-xl font-bold"></div>
                                </div> --}}
                            </div>
                            <div class="flex flex-wrap mb-3">
                                <div class="w-5/6">
                                    <div class="text-sm">Sistem Belajar</div>
                                    <div class="text-lg">
                                        <div class="text-xl font-bold">{{ $item->sibel }}</div>
                                    </div>
                                </div>
                                {{-- <div class="w-1/6">
                                    <div class="text-sm mb-1">Change Status</div>
                                    <a href="{{ route('transaksi.changeStatus', ['id' => $item->id, 'status' => 'PENDING']) }}"
                                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-2 rounded block text-center w-full mb-1">
                                        Pending
                                    </a>
                                    <a href="{{ route('transaksi.changeStatus', ['id' => $item->id, 'status' => 'SELESAI']) }}"
                                       class="bg-green-500 hover:bg-green-700 text-white font-bold px-2 rounded block text-center w-full mb-1">
                                        Selesai
                                    </a>
                                    <a href="{{ route('transaksi.changeStatus', ['id' => $item->id, 'status' => 'CANCEL']) }}"
                                       class="bg-red-500 hover:bg-red-700 text-white font-bold px-2 rounded block text-center w-full mb-1">
                                        Cancelled
                                    </a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</x-app-layout>
