<x-app-layout>
    <div class="container">

        <h1>Ticket #{{ $ticket->id }}</h1>

        <div class="card mb-4">
            <div class="card-body">
                <p><strong>Nombre:</strong> {{ $ticket->name }}</p>
                <p><strong>Tipo:</strong> {{ $ticket->ticket_type }}</p>
                <p><strong>Transporte:</strong> {{ $ticket->transport_mode }}</p>
                <p><strong>Producto:</strong> {{ $ticket->product }}</p>
                <p><strong>Origen:</strong> {{ $ticket->country_from }}</p>
                <p><strong>Destino:</strong> {{ $ticket->country_to }}</p>
                <p><strong>Estado:</strong> {{ $ticket->status }}</p>
            </div>
        </div>

    </div>
</x-app-layout>