
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-grey-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mb-10">
                    <a href="{{ route('users.create') }}" class="font-bold inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:shadow-outline-blue disabled:opacity-25 transition ease-in-out duration-150">
                        Tambah User
                    </a>
                </div>
                <div class="bg-white">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="border px-6 py-4">ID</th>
                                <th class="border px-6 py-4">Nama</th>
                                <th class="border px-6 py-4">Email</th>
                                <th class="border px-6 py-4">Roles</th>
                                <th class="border px-6 py-4">Action</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            @forelse ($user as $item)
                            <tr>
                                <td class="border px-6 px-4">{{ $item->id }}</td>
                                <td class="border px-6 px-4">{{ $item->name }}</td>
                                <td class="border px-6 px-4">{{ $item->hp }}</td>
                                <td class="border px-6 px-4">{{ $item->roles }}</td>
                                <td class="border px-6 px-4 text-center">
                                    <a href="{{ route('users.edit', $item->id) }}" class="mx-2 inline-block bg-green-500 px-4 py-2 border-transparent rounded-md text-white">Edit</a>
                                    <form action="{{ route('users.destroy', $item->id) }}" method="POST" class="inline-block">
                                        {!!  method_field('delete') . csrf_field() !!}
                                        <button type="submit" class="mx-2 inline-block bg-red-500 hover:bg-red-700 text-white font-bold px-4 py-2 rounded-md">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="border text-center">
                                Data Tidak Ditemukan    
                                </td>    
                            </tr>    
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-5">
                    {{ $user->links() }}
                </div>
            </div>
        </div>
    
</x-app-layout>
