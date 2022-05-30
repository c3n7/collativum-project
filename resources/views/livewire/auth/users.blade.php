<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
  <div class="text-2xl">
    Users
  </div>

  <div class="mt-6">

    <!-- Name -->
    <div class="col-span-6 sm:col-span-4 mb-3">
      <x-jet-input type="search" class="mt-1 block w-fit"
        wire:model.debounce.250ms="search_term" placeholder="Search" />
      <x-jet-input-error for="search_term" class="mt-2" />
    </div>

    <table class="table-auto w-full">
      <thead>
        <tr>
          <th class="border px-4 py-2 bg-gray-100">ID</th>
          <th class="border px-4 py-2 bg-gray-100">Name</th>
          <th class="border px-4 py-2 bg-gray-100">Email</th>
          <th class="border px-4 py-2 bg-gray-100">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td class="border px-4 py-2">{{ $user->id }}</td>
            <td class="border px-4 py-2">{{ $user->name }}</td>
            <td class="border px-4 py-2">{{ $user->email }}</td>
            <td class="border px-4 py-2">Action</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="mt-4">{{ $users->links() }}</div>

</div>
