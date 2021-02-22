
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-grey-800 leading-tight">
            {{ __('Transaksi') }}
        </h2>
    </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
               
                <div class="bg-white">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="border px-6 py-4">ID</th>
                                <th class="border px-6 py-4">Prodi</th>
                                <th class="border px-6 py-4">Kampus</th>
                                <th class="border px-6 py-4">User</th>
                                <th class="border px-6 py-4">Status</th>
                                <th class="border px-6 py-4">Action</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            @forelse ($transaksi as $item)
                            <tr>
                                <td class="border px-6 px-4">{{ $item->id }}</td>
                                <td class="border px-6 px-4">{{ $item->prodi->nama }}</td>
                                <td class="border px-6 px-4">{{ $item->prodi->kampus }}</td>
                                <td class="border px-6 px-4">{{ $item->user->name }}</td>
                                <td class="border px-6 px-4">{{ $item->status }}</td>
                                <td class="border px-6 px-4 text-center">
                                    <a href="{{ route('transaksi.show', $item->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">
                                        View
                                    </a>
                                    <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST" class="inline-block">
                                        {!!  method_field('delete') . csrf_field() !!}
                                        <button type="submit" class="mx-2 inline-block bg-red-500 hover:bg-red-700 text-white font-bold px-4 py-2 rounded-md">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="border text-center">
                                Data Tidak Ditemukan    
                                </td>    
                            </tr>    
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-5">
                    {{ $transaksi->links() }}
                </div>
            </div>
        </div>
    
</x-app-layout>
