<x-app-layout>
    <div class="max-w-xl mx-auto mt-8 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-semibold mb-4">Crear Ticket</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
                <ul class="list-disc ml-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="block font-medium">Nombre del Ticket</label>
                <input type="text" name="name" id="name"
                       class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="ticket_type" class="block font-medium">Tipo de Ticket</label>
                <select name="ticket_type" id="ticket_type" class="w-full border rounded p-2" required>
                    <option value="">Seleccione</option>
                    @foreach ($ticketTypes as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="transport_mode" class="block font-medium">Modo de Transporte</label>
                <select name="transport_mode" id="transport_mode" class="w-full border rounded p-2" required>
                    <option value="">Seleccione</option>
                    @foreach ($transportModes as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="product" class="block font-medium">Producto</label>
                <input type="text" name="product" id="product"
                       class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="country_from" class="block font-medium">País de Origen</label>
                <input type="text" name="country_from" id="country_from"
                       class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="country_to" class="block font-medium">País de Destino</label>
                <input type="text" name="country_to" id="country_to"
                       class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="document" class="block font-medium">Documento</label>
                <input type="file" name="document" id="document" class="w-full border rounded p-2" required>
            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded shadow">
                Crear Ticket
            </button>

            <a href="{{ route('dashboard') }}" class="ml-4 text-gray-600">Cancelar</a>
        </form>
    </div>
</x-app-layout>