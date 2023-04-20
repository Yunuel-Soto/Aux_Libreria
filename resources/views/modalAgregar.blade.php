<!-- Modal -->
<div class="modal fade" id="modalAgregar{{ $idlibro, $matricula, $busqueda }}" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAgregar" aria-hidden="true">
    <div class="modal-dialog disple">
        <div class="modal-content mA-content">
            <form method="POST" action="{{ route('agregar.store', [$idlibro, $matricula, $busqueda]) }}">
                @csrf
                <div class="modal-header mA-content">
                    <img src="/img/warning.png" alt="">
                    <h4 class="modalA-titulo" id="staticBackdropLabel">¿Pedir libro y agregar a biblioteca personal?
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mA-body mA-content">
                    <h2 class="text-t text-modal">{{ $libro->titulo }}</h2>
                    <h3 class="text-s text-modal">{{ $libro->edicion }}</h3>
                    <div class="cont-fechaT"><label class="label-fechaT">Fecha de entrega: </label><input
                            class="input-fechaT" name="fecha_termino" type="date" placeholder="Fecha de entrega">
                    </div>
                </div>
                <div class="modal-footer mA-content m-f">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No agregar</button>
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Sí, agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
