<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <div class="flex justify-end mb-4">
                <a href="{{ route('tickets.create') }}"
                class="bg-green-600 text-black px-4 py-2 rounded shadow">
                    + Crear Ticket
                </a>
            </div>
    
            <div class="max-w-4xl mx-auto mt-8">
                <h2 class="text-2xl font-semibold mb-4">Tickets</h2>
    
                @if ($tickets->isEmpty())
                    <p class="text-gray-600">No hay tickets para mostrar.</p>
                @else
                    <table class="w-full border-collapse bg-white shadow-sm">
                        <thead>
                            <tr class="bg-gray-100 border-b">
                                <th class="p-2 text-left">ID</th>
                                <th class="p-2 text-left">Nombre</th>
                                <th class="p-2 text-left">Producto</th>
                                <th class="p-2 text-left">Estado</th>
                                <th class="p-2 text-left">Creado</th>
                                <th class="p-2 text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr class="border-b">
                                    <td class="p-2 text-center">{{ $ticket->id }}</td>
                                    <td class="p-2 text-center">{{ $ticket->name }}</td>
                                    <td class="p-2 text-center">{{ $ticket->product }}</td>
                                    <td class="p-2 text-center">{{ $ticket->status }}</td>
                                    <td class="p-2 text-center">{{ $ticket->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-primary btn-sm">
                                            Ver detalle
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
