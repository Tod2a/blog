<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Utilisateurs') }}
      </h2>
    </x-slot>
  
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="flex justify-between mt-8">
              <div class="text-2xl">Liste des utilisateurs</div>
  
              <div class="flex items-center justify-center space-x-8"></div>
            </div>
  
            <div class="mt-6 text-gray-500">
              <table class="table-auto w-full">
                <thead>
                  <tr class="uppercase text-left">
                    <th class="px-4 py-2 border">Nom</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Rôle</th>
                    <th class="px-4 py-2 border">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                  <tr
                    class="hover:bg-gray-50 odd:bg-gray-100 hover:odd:bg-gray-200 transition"
                  >
                    <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">{{ $user->role->name }}</td>
                    <td class="border px-4 py-2 space-x-4">
                      <div class="flex space-x-4">
                        <a
                          href="{{ route('users.edit', $user) }}"
                          class="text-blue-400"
                        >
                          <x-heroicon-o-pencil class="w-5 h-5" />
                        </a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
  
              <div class="mt-4">{{ $users->links() }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-app-layout>