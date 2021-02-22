
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-grey-800 leading-tight">
            {{ __('Prodi') }}
        </h2>
    </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mb-10">
                    <a href="{{ route('prodi.create') }}" class="font-bold inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:shadow-outline-blue disabled:opacity-25 transition ease-in-out duration-150">
                        Tambah Prodi
                    </a>
                </div>
                <div class="bg-white">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="border px-6 py-4">ID</th>                           
                                <th class="border px-6 py-4">Nama</th>
                                <th class="border px-6 py-4">Kampus</th>
                                <th class="border px-6 py-4">Jenjang</th>
                                <th class="border px-6 py-4">Kategori</th>
                                <th class="border px-6 py-4">Biaya</th>
                                <th class="border px-6 py-4">Types</th>
                                <th class="border px-6 py-4">Action</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            @forelse ($prodi as $item)
                            <tr>
                                <td class="border px-6 px-4">{{ $item->id }}</td>                              
                                <td class="border px-6 px-4">{{ $item->nama }}</td>
                                <td class="border px-6 px-4">{{ $item->kampus }}</td>                               
                                <td class="border px-6 px-4">{{ $item->jenjang }}</td>
                                <td class="border px-6 px-4">{{ $item->kategori->name }}</td>
                                <td class="border px-6 px-4">{{ $item->biaya }}</td>
                                <td class="border px-6 px-4">{{ $item->types }}</td>
                                <td class="border px-6 px-4 text-center">
                                    <a href="{{ route('prodi.show', $item->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">
                                        View
                                    </a>
                                    <a href="{{ route('prodi.edit', $item->id) }}" class="mx-2 inline-block bg-green-500 px-4 py-2 border-transparent rounded-md text-white">Edit</a>
                                    <form action="{{ route('prodi.destroy', $item->id) }}" method="POST" class="inline-block">
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
                    {{ $prodi->links() }}
                </div>
            </div>
        </div>
    
</x-app-layout>
