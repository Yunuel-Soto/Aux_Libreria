<!-- Modal -->
<div class="modal fade" id="modalEliminarLibros{{ $id, $busqueda }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="modalEliminarLibros" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('libro.destroy', [$libro->id_libro, $busqueda]) }}">
                @csrf
                @method('delete')
                <div class="modal-header modal-h">
                    <img src="/img/warning.png" alt="">
                    <h4 class="modal-title" id="staticBackdropLabel">Eliminar</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 class="text-t text-modal">{{ $libro->titulo }}</h2>
                    <h3 class="text-s text-modal">{{ $libro->edicion }}</h3>
                </div>
                <div class="modal-footer modal-f">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
