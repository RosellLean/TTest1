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

        <h3>Documentos subidos por el usuario</h3>
        <div class="card mb-3">
            <div class="card-body">
                @if ($documents->isEmpty())
                    <p>No hay documentos subidos.</p>
                @else
                    <ul>
                        @foreach ($documents as $doc)
                            <li>
                                <a href="{{ asset('storage/' . $doc->path) }}" target="_blank">
                                    {{ $doc->description ?? 'Documento' }}
                                </a>
                                <small class="text-muted"> (subido por: {{ $doc->uploaded_by }})</small>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

    </div>
</x-app-layout>